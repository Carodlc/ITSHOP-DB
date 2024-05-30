<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roles'])) {
    $rolesToDelete = json_decode($_POST['roles']);

    try {
        // Preparar la consulta de eliminación
        $placeholders = implode(',', array_fill(0, count($rolesToDelete), '?'));
        $query = "DELETE FROM rol WHERE nombrerol IN ($placeholders)";
        $stmt = $dbh->prepare($query);
        
        // Ejecutar la consulta para eliminar los roles seleccionados
        $stmt->execute($rolesToDelete);

        // Obtener y devolver la tabla actualizada
        $roles = getRoles($dbh);
        foreach ($roles as $rol) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='roles[]' value='$rol'></td>";
            echo "<td>$rol</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al borrar los roles: " . $e->getMessage();
    }
}
?>

