<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $cantidad = $_POST["cantidad"] ?? '';
        $idProducto = $_POST['idProducto'] ?? '';
        $idUsuario = $_POST['idUsuario'] ?? '';

        // Obtener el ID del vendedor del nuevo producto
        $stmtVendedor = $dbh->prepare("SELECT datos_usuario_idusuario, stock FROM datos_producto WHERE idproducto = ?");
        $stmtVendedor->execute([$idProducto]);
        $productoData = $stmtVendedor->fetch(PDO::FETCH_ASSOC);
        $vendedorProducto = $productoData['datos_usuario_idusuario'];
        $stockDisponible = $productoData['stock'];

        // Verificar si hay suficiente stock
        if ($cantidad > $stockDisponible) {
            echo "<script>alert('No hay suficiente stock disponible.'); window.location.href = 'Comentarios.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
            exit(); // Detener la ejecución del script
        }

        // Verificar si ya existe un producto en el carrito del usuario
        $stmtCarrito = $dbh->prepare("SELECT * FROM carrito WHERE id_usuario = ?");
        $stmtCarrito->execute([$idUsuario]);
        $existingProduct = $stmtCarrito->fetch();

        if ($existingProduct) {
            $idProductoCarrito= $existingProduct['id_producto'];
            $stmtVendedor = $dbh->prepare("SELECT datos_usuario_idusuario FROM datos_producto WHERE idproducto = ?");
            $stmtVendedor->execute([$idProductoCarrito]);
            $idUsuarioCarrito = $stmtVendedor->fetchColumn();

            // Si hay productos en el carrito, verificar si pertenecen al mismo vendedor
            $vendedorCarrito = $idUsuarioCarrito;
            if ($vendedorProducto != $vendedorCarrito) {
                // Si los productos son de diferentes vendedores, mostrar un mensaje de error
                echo "<script>alert('No puedes agregar productos de diferentes vendedores al carrito.'); window.location.href = 'Comentarios.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
                exit(); // Detener la ejecución del script
            }
        }

        // Si la cantidad es mayor o igual a 1
        if ($cantidad >= 1) {
            // Verificar si ya existe el producto en el carrito del usuario
            $stmtProductoCarrito = $dbh->prepare("SELECT * FROM carrito WHERE id_producto = ? AND id_usuario = ?");
            $stmtProductoCarrito->execute([$idProducto, $idUsuario]);
            $existingProductInCart = $stmtProductoCarrito->fetch();

            if ($existingProductInCart) {
                // Si ya existe el producto en el carrito, mostrar una alerta
                echo "<script>alert('El producto ya está en tu carrito.'); window.location.href = 'Comentarios.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
            } else {
                // Si no existe, insertar un nuevo registro
                $rowCount = insertData($dbh, 'carrito', ['id_producto', 'id_usuario', 'cantidad'], [$idProducto, $idUsuario, $cantidad]);
                if ($rowCount > 0) {
                    echo "<script>alert('Se agregó el producto a tu carrito'); window.location.href = 'Carrito.php?idUsuario=$idUsuario';</script>";
                } else {
                    echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='Comentarios.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
                }
            }
        } else {
            // Si la cantidad es menor que 1, mostrar un mensaje de error
            echo "<script>alert('La cantidad no puede ser menor a 1.'); window.location.href = 'Comentarios.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
        }
    } else {
        // Si no se pasó el parámetro 'idUsuario' en el formulario
        echo "<script>alert('No has iniciado sesión.'); history.back();</script>";
    }
}
?>

