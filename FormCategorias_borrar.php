<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categorias'])) {
    $categoriasToDelete = json_decode($_POST['categorias']);

    try {
        // Preparar la consulta de eliminación
        $placeholders = implode(',', array_fill(0, count($categoriasToDelete), '?'));
        $query = "DELETE FROM categorias WHERE nombre_categoria IN ($placeholders)"; // Cambiado a minúsculas
        $stmt = $dbh->prepare($query);
        
        // Ejecutar la consulta para eliminar los roles seleccionados
        $stmt->execute($categoriasToDelete);

        // Obtener y devolver la tabla actualizada
        $categorias = getCategorias($dbh);
        foreach ($categorias as $categoria) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='roles[]' value='$categoria'></td>";
            echo "<td>$categoria</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al borrar las categorías: " . $e->getMessage();
    }
}
?>
