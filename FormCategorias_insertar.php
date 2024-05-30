<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];

    try {
        // Obtener el último idcategorias
        $query_last_id = "SELECT MAX(idcategorias) AS last_id FROM categorias"; // Cambiado a minúsculas
        $stmt_last_id = $dbh->prepare($query_last_id);
        $stmt_last_id->execute();
        $last_id = $stmt_last_id->fetch(PDO::FETCH_ASSOC)['last_id'];

        // Generar el nuevo id incrementando el último id
        $new_id = $last_id + 1;

        // Insertar la nueva categoría en la base de datos
        $query_insert = "INSERT INTO categorias (idcategorias, nombre_categoria) VALUES (?, ?)"; // Cambiado a minúsculas
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
        echo "Error al insertar la categoría: " . $e->getMessage();
    }
}
?>
