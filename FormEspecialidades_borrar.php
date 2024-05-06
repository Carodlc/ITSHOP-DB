<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['especialidades'])) {
    $rolesToDelete = json_decode($_POST['especialidades']);

    try {
        // Preparar la consulta de eliminación
        $placeholders = implode(',', array_fill(0, count($rolesToDelete), '?'));
        $query = "DELETE FROM ESPECIALIDADES WHERE NOMBREESPECIALIDAD IN ($placeholders)";
        $stmt = $dbh->prepare($query);
        
        // Ejecutar la consulta para eliminar los roles seleccionados
        $stmt->execute($rolesToDelete);

        // Obtener y devolver la tabla actualizada
        $especialidades = getEspecialidades($dbh);
        foreach ($especialidades as $especialidad) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='roles[]' value='$especialidad'></td>";
            echo "<td>$especialidad</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al borrar los roles: " . $e->getMessage();
    }
}
?>
