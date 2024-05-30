<?php
include 'conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (isset($_GET['idPedido']) && isset($_GET['idUsuario'])) {
    $idPedido = $_GET['idPedido'];
    $idUsuario = $_GET['idUsuario'];

    try {
        // Establecer conexión a la base de datos
        $stmt = $dbh->prepare("SELECT datos_producto_idproducto FROM detalle_pedido WHERE pedido_idpedido = ?");
        $stmt->execute([$idPedido]);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Crear un array de productos con la información necesaria
        $productosArray = [];
        foreach ($productos as $producto) {
            $idproducto = $producto['datos_producto_idproducto'];
            $stmt_1 = $dbh->prepare("SELECT nombre FROM datos_producto WHERE idproducto = ?");
            $stmt_1->execute([$idproducto]);
            $detalle = $stmt_1->fetch(PDO::FETCH_ASSOC);

            $productosArray[] = [
                'id' => $producto['datos_producto_idproducto'],
                'nombre' => $detalle['nombre']
            ];
        }

        // Devolver los productos como JSON
        header('Content-Type: application/json');
        echo json_encode(['productos' => $productosArray]);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'No se han especificado los parámetros necesarios.']);
}
?>
