<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['especialidad'])) {
    $especialidad = $_POST['especialidad'];

    try {
        // Obtener el último idespecialidad
        $query_last_id = "SELECT MAX(idespecialidad) AS last_id FROM especialidades";
        $stmt_last_id = $dbh->prepare($query_last_id);
        $stmt_last_id->execute();
        $last_id = $stmt_last_id->fetch(PDO::FETCH_ASSOC)['last_id'];

        // Generar el nuevo ID incrementando el último ID
        $new_id = $last_id + 1;

        // Insertar la nueva especialidad en la base de datos
        $query_insert = "INSERT INTO especialidades (idespecialidad, nombreespecialidad) VALUES (?, ?)";
        $stmt_insert = $dbh->prepare($query_insert);
        $stmt_insert->execute([$new_id, $especialidad]);

        // Obtener y devolver la tabla actualizada
        $especialidades = getEspecialidades($dbh);
        foreach ($especialidades as $especialidad) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='roles[]' value='$especialidad'></td>";
            echo "<td>$especialidad</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al insertar la especialidad: " . $e->getMessage();
    }
}
?>
