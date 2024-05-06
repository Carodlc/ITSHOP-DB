<?php
// Incluir el autoload de Google Cloud Storage
require 'vendor/autoload.php';

// Crear una instancia del cliente de Google Cloud Storage
$storage = new Google\Cloud\Storage\StorageClient([
    'projectId' => 'moonlit-nature-421605',
]);

// Obtener el bucket donde quieres guardar las imágenes
$bucket = $storage->bucket('imagenes_its');

// Verificar si se ha enviado un archivo
if(isset($_FILES['imagen'])) {
    $archivo_nombre = $_FILES['imagen']['name'];
    $archivo_temporal = $_FILES['imagen']['tmp_name'];

    // Subir el archivo al bucket en Google Cloud Storage
    $object = $bucket->upload(fopen($archivo_temporal, 'r'), [
        'name' => $archivo_nombre
    ]);

    // Obtener la URL de la imagen en Google Cloud Storage
    $imagen_url = $object->signedUrl(new \DateTime('tomorrow'));

    // Mostrar la URL de la imagen subida
    echo "La imagen se ha subido correctamente a Google Cloud Storage. URL: <a href='$imagen_url'>$imagen_url</a>";
} else {
    echo "No se ha seleccionado ningún archivo para subir.";
}
?>
