<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['especialidad'])) {
    $especialidad = $_POST['especialidad'];

    try {
        // Obtener el último IDROL
        $query_last_id = "SELECT MAX(IDESPECIALIDAD) AS LAST_ID FROM ESPECIALIDADES";
        $stmt_last_id = $dbh->prepare($query_last_id);
        $stmt_last_id->execute();
        $last_id = $stmt_last_id->fetch(PDO::FETCH_ASSOC)['LAST_ID'];

        // Generar el nuevo ID incrementando el último ID
        $new_id = $last_id + 1;

        // Insertar el nuevo rol en la base de datos
        $query_insert = "INSERT INTO ESPECIALIDADES (IDESPECIALIDAD, NOMBREESPECIALIDAD) VALUES (?, ?)";
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
        echo "Error al insertar el rol: " . $e->getMessage();
    }
}
?>
