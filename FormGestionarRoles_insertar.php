<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['role'])) {
    $rol = $_POST['role'];

    try {
        // Obtener el último idrol
        $query_last_id = "SELECT MAX(idrol) AS last_id FROM rol";
        $stmt_last_id = $dbh->prepare($query_last_id);
        $stmt_last_id->execute();
        $last_id = $stmt_last_id->fetch(PDO::FETCH_ASSOC)['last_id'];

        // Generar el nuevo ID incrementando el último ID
        $new_id = $last_id + 1;

        // Insertar el nuevo rol en la base de datos
        $query_insert = "INSERT INTO rol (idrol, nombrerol, estado) VALUES (?, ?, 1)";
        $stmt_insert = $dbh->prepare($query_insert);
        $stmt_insert->execute([$new_id, $rol]);

        // Obtener y devolver la tabla actualizada
        $roles = getRoles($dbh);
        foreach ($roles as $rol) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='roles[]' value='$rol'></td>";
            echo "<td>$rol</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error al insertar el rol: " . $e->getMessage();
    }
}
?>
