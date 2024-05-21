<?php
include 'conexion.php';

// Establecer el tipo de contenido de la respuesta como JSON
header('Content-Type: application/json');

// Obtener los datos de la solicitud POST
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['idProducto'], $data['idUsuario'], $data['comentario'], $data['rating'])) {
    $idProducto = $data['idProducto'];
    $idUsuario = $data['idUsuario'];
    $comentario = $data['comentario'];
    $rating = $data['rating'];

    // Obtener el último ID de usuario de la base de datos
    $query = "SELECT MAX(IDCOMENTARIO) FROM COMENTARIO";
    $stmt = $dbh->query($query);
    $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastID = $maxRow['MAX(IDCOMENTARIO)'] ?? 0;

    // Generar el nuevo ID sumando 1 al último ID
    $newID = $lastID + 1;

    // Verificar si el nuevo ID ya existe en la base de datos
    $query_check = "SELECT COUNT(IDCOMENTARIO) FROM COMENTARIO WHERE IDCOMENTARIO = ?";
    $stmt_check = $dbh->prepare($query_check);
    $stmt_check->execute([$newID]);
    $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
    $count = $countRow['COUNT(IDCOMENTARIO)'] ?? 0;

    // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
    while ($count > 0) {
        $newID++;
        $stmt_check->execute([$newID]);
        $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $countRow['count'] ?? 0;
    }

    $DATA = $dbh->query("SELECT SYSDATE FROM DUAL");

    // Obtener la fecha actual
    $fecha_actual = $DATA->fetchColumn();

    // El nuevo ID es único y seguro para usar
    $IDCOMENTARIO = $newID;
    try {
        // Insertar comentario en la base de datos
        $rowCount = insertData($dbh, 'COMENTARIO', ['IDCOMENTARIO', 'IDPRODUCTO', 'IDUSUARIO', 'COMENTARIO', 'VALORACION', 'FECHA',], [$IDCOMENTARIO, $idProducto, $idUsuario, $comentario, $rating, $fecha_actual]);


        echo json_encode(['status' => 'success']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Datos incompletos']);
}
