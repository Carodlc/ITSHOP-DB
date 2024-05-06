<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    try {
        // Obtener el último IDROL
        $query_last_id = "SELECT MAX(IDCATEGORIAS) AS LAST_ID FROM CATEGORIAS";
        $stmt_last_id = $dbh->prepare($query_last_id);
        $stmt_last_id->execute();
        $last_id = $stmt_last_id->fetch(PDO::FETCH_ASSOC)['LAST_ID'];

        // Generar el nuevo ID incrementando el último ID
        $new_id = $last_id + 1;

        // Insertar el nuevo rol en la base de datos
        $query_insert = "INSERT INTO CATEGORIAS (IDCATEGORIAS, NOMBRE_CATEGORIA) VALUES (?, ?)";
        $stmt_insert = $dbh->prepare($query_insert);
        $stmt_insert->execute([$new_id, $categoria]);

        // Obtener y devolver la tabla actualizada
        $categorias = getCategorias($dbh);
        foreach ($categorias as $categoria) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='roles[]' value='$categoria'></td>";
            echo "<td>$categoria</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al insertar el rol: " . $e->getMessage();
    }
}
?>
