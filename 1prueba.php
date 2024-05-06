<?php
// Incluye el archivo de conexión
require_once 'conexion.php';

// Verifica si se ha proporcionado un ID de imagen en la URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Muestra la imagen correspondiente al ID proporcionado
    displayImage($dbh, $id);
} else {
    // Si no se proporciona un ID, muestra un mensaje de error
    echo "ID de imagen no proporcionado.";
}
?>
