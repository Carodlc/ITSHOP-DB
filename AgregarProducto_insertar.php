<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"] ?? '';
    $precio = $_POST["precio"] ?? '';
    $stock = 0;
    $CATEGORIA_NOMBRE = $_POST["categoria"] ?? '';
    $descripcion = $_POST["descripcion"] ?? '';
    $publicado = ($_POST["switchDisplay"] == "on") ? 1 : 0;
    $ID_USUARIO = $_POST['idUsuario'] ?? '';

    echo "Nombre: " . $nombre . "<br>";
    echo "Precio: " . $precio . "<br>";
    echo "Stock: " . $stock . "<br>";
    echo "Categoría: " . $categoria . "<br>";
    echo "Descripción: " . $descripcion . "<br>";
    echo "Publicado: " . $publicado . "<br>";
    echo "IDUSUARIO: " . $ID_USUARIO. "<br>";


    
}
