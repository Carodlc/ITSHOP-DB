<?php
include 'conexion.php';

if (isset($_GET['idUsuario'])) {
    $idUsuario = $_GET['idUsuario'];

    try {
        // Inicia una transacción
        $dbh->beginTransaction();

        // Elimina registros de las tablas relacionadas
        $queries = [
            // Eliminar registros del carrito relacionados con los productos del usuario
            "DELETE FROM carrito WHERE id_producto IN (SELECT idproducto FROM datos_producto WHERE datos_usuario_idusuario = :idUsuario)",
            // Eliminar registros del detalle del pedido relacionados con los pedidos del usuario
            "DELETE FROM detalle_pedido WHERE pedido_idpedido IN (SELECT idpedido FROM pedido WHERE idusuariovendedor = :idUsuario OR idusuariocliente = :idUsuario)",
            // Eliminar pedidos del usuario
            "DELETE FROM pedido WHERE idusuariovendedor = :idUsuario OR idusuariocliente = :idUsuario",
            // Eliminar imágenes de productos del usuario
            "DELETE FROM products_img WHERE id IN (SELECT idproducto FROM datos_producto WHERE datos_usuario_idusuario = :idUsuario)",
            // Eliminar registros de productos en surtido relacionados con el usuario
            "DELETE FROM datos_producto_has_surtido WHERE surtido_idsurtido IN (SELECT idsurtido FROM surtido WHERE datos_usuario_idusuario = :idUsuario)",
            // Eliminar surtido del usuario
            "DELETE FROM surtido WHERE datos_usuario_idusuario = :idUsuario",
            // Eliminar imágenes del usuario
            "DELETE FROM usuarios_img WHERE id = :idUsuario",
            // Eliminar productos del usuario
            "DELETE FROM datos_producto WHERE datos_usuario_idusuario = :idUsuario",
            // Eliminar comentarios del usuario
            "DELETE FROM comentario WHERE idusuario = :idUsuario",
            // Eliminar el usuario
            "DELETE FROM datos_usuario WHERE idusuario = :idUsuario"
        ];

        foreach ($queries as $query) {
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
        }

        // Confirma la transacción
        $dbh->commit();

        // Redirige al usuario a index.php
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        // Si hay un error, revierte la transacción
        $dbh->rollBack();
        echo "Error al eliminar la cuenta: " . $e->getMessage();
    }
} else {
    echo "No se ha especificado un ID de usuario.";
}
?>
