<?php
include 'conexion.php';

if (isset($_POST['idUsuario']) && isset($_POST['idProducto'])) {
    $idUsuario = $_POST['idUsuario'];
    $idProducto = $_POST['idProducto'];

    try {
        // Establecer conexión a la base de datos y eliminar el producto del carrito
        $query = "DELETE FROM carrito WHERE id_usuario = :idUsuario AND id_producto = :idProducto";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $stmt->execute();

        echo "Producto eliminado correctamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se ha especificado un ID de usuario o producto.";
}
?>
