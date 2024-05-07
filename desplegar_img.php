<?php
require_once 'conexion.php';

// Función para obtener la imagen de la base de datos
function getImage($dbh, $productId) {
    try {
        // Preparar la consulta para obtener la imagen
        $query = "SELECT FOTO FROM USUARIOS_IMG WHERE ID = :productId";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Obtener la imagen como un flujo de bytes
        $imageData = $stmt->fetchColumn();
        
        // Retornar los datos de la imagen
        return $imageData;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}

// ID del producto del que quieres mostrar la imagen (debes cambiarlo según tus necesidades)
$productId = 10;

// Obtener los datos de la imagen de la base de datos
$imageData = getImage($dbh, $productId);

// Si se obtiene la imagen, mostrarla
if ($imageData) {
    // Establecer el tipo MIME adecuado para la imagen
    header("Content-Type: image/jpeg"); // Cambia el tipo MIME según el tipo de imagen que estás almacenando
    
    // Mostrar la imagen
    echo $imageData;
} else {
    // Si no se puede obtener la imagen, mostrar una imagen predeterminada o un mensaje de error
    echo "No se pudo obtener la imagen.";
}
?>
