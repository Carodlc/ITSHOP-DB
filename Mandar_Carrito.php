<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $cantidad = $_POST["cantidad"] ?? '';
        $IDPRODUCTO = $_POST['idProducto'] ?? '';
        $IDUSUARIO = $_POST['idUsuario'] ?? '';

        // Obtener el ID del vendedor del nuevo producto
        $stmtVendedor = $dbh->prepare("SELECT DATOS_USUARIO_IDUSUARIO FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
        $stmtVendedor->execute([$IDPRODUCTO]);
        $vendedorProducto = $stmtVendedor->fetchColumn();

        // Verificar si ya existe un producto en el carrito del usuario
        $stmtCarrito = $dbh->prepare("SELECT * FROM CARRITO WHERE ID_USUARIO = ?");
        $stmtCarrito->execute([$IDUSUARIO]);
        $existingProduct = $stmtCarrito->fetch();

        if ($existingProduct) {

            $IDPRODUCTO_CARRITO= $existingProduct['ID_PRODUCTO'];
            $stmtVendedor = $dbh->prepare("SELECT DATOS_USUARIO_IDUSUARIO FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
            $stmtVendedor->execute([$IDPRODUCTO_CARRITO]);
            $IDUSUARIO_CARRITO = $stmtVendedor->fetchColumn();

            echo "IDUSUARIO CARRITO".$IDUSUARIO_CARRITO;


            // Si hay productos en el carrito, verificar si pertenecen al mismo vendedor
            $vendedorCarrito = $IDUSUARIO_CARRITO;
            if ($vendedorProducto != $vendedorCarrito) {
                // Si los productos son de diferentes vendedores, mostrar un mensaje de error
                echo "<script>alert('No puedes agregar productos de diferentes vendedores al carrito.'); window.location.href = 'Comentarios.php?idUsuario=$IDUSUARIO&idProducto=$IDPRODUCTO';</script>";
                exit(); // Detener la ejecución del script
            }
        }

        // Si la cantidad es mayor o igual a 1
        if ($cantidad >= 1) {
            // Verificar si ya existe el producto en el carrito del usuario
            $stmtProductoCarrito = $dbh->prepare("SELECT * FROM CARRITO WHERE ID_PRODUCTO = ? AND ID_USUARIO = ?");
            $stmtProductoCarrito->execute([$IDPRODUCTO, $IDUSUARIO]);
            $existingProductInCart = $stmtProductoCarrito->fetch();

            if ($existingProductInCart) {
                // Si ya existe el producto en el carrito, mostrar una alerta
                echo "<script>alert('El producto ya está en tu carrito.'); window.location.href = 'Comentarios.php?idUsuario=$IDUSUARIO&idProducto=$IDPRODUCTO';</script>";
            } else {
                // Si no existe, insertar un nuevo registro
                $rowCount = insertData($dbh, 'CARRITO', ['ID_PRODUCTO', 'ID_USUARIO', 'CANTIDAD',], [$IDPRODUCTO, $IDUSUARIO, $cantidad,]);
                if ($rowCount > 0) {
                    echo "<script>alert('Se agregó el producto a tu carrito'); window.location.href = 'Carrito.php?idUsuario=$IDUSUARIO';</script>";
                } else {
                    echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='Comentarios.php?idUsuario=$IDUSUARIO&idProducto=$IDPRODUCTO';</script>";
                }
            }
        } else {
            // Si la cantidad es menor que 1, mostrar un mensaje de error
            echo "<script>alert('La cantidad no puede ser menor a 1.'); window.location.href = 'Comentarios.php?idUsuario=$IDUSUARIO&idProducto=$IDPRODUCTO';</script>";
        }
    } else {
        // Si no se pasó el parámetro 'idUsuario' en el formulario
        echo "<script>alert('No has iniciado sesión.'); history.back();</script>";
    }
}
?>
