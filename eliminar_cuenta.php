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
            "DELETE FROM CARRITO WHERE ID_PRODUCTO IN (SELECT IDPRODUCTO FROM DATOS_PRODUCTO WHERE DATOS_USUARIO_IDUSUARIO = :idUsuario)",
            // Eliminar registros del detalle del pedido relacionados con los pedidos del usuario
            "DELETE FROM DETALLE_PEDIDO WHERE PEDIDO_IDPEDIDO IN (SELECT IDPEDIDO FROM PEDIDO WHERE IDUSUARIOVENDEDOR = :idUsuario OR IDUSUARIOCLIENTE = :idUsuario)",
            // Eliminar pedidos del usuario
            "DELETE FROM PEDIDO WHERE IDUSUARIOVENDEDOR = :idUsuario OR IDUSUARIOCLIENTE = :idUsuario",
            // Eliminar imágenes de productos del usuario
            "DELETE FROM PRODUCTS_IMG WHERE ID IN (SELECT IDPRODUCTO FROM DATOS_PRODUCTO WHERE DATOS_USUARIO_IDUSUARIO = :idUsuario)",
            // Eliminar registros de productos en surtido relacionados con el usuario
            "DELETE FROM DATOS_PRODUCTO_HAS_SURTIDO WHERE SURTIDO_IDSURTIDO IN (SELECT IDSURTIDO FROM SURTIDO WHERE DATOS_USUARIO_IDUSUARIO = :idUsuario)",
            // Eliminar surtido del usuario
            "DELETE FROM SURTIDO WHERE DATOS_USUARIO_IDUSUARIO = :idUsuario",
            // Eliminar imágenes del usuario
            "DELETE FROM USUARIOS_IMG WHERE ID = :idUsuario",
            // Eliminar productos del usuario
            "DELETE FROM DATOS_PRODUCTO WHERE DATOS_USUARIO_IDUSUARIO = :idUsuario",
            // Eliminar comentarios del usuario
            "DELETE FROM COMENTARIO WHERE IDUSUARIO = :idUsuario",
            // Eliminar el usuario
            "DELETE FROM DATOS_USUARIO WHERE IDUSUARIO = :idUsuario"
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
