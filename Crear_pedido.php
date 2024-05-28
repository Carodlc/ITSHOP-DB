<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $IDUSUARIO = $_POST['idUsuario'] ?? '';

        $query = "SELECT ID_PRODUCTO, CANTIDAD FROM CARRITO WHERE ID_USUARIO = " . $IDUSUARIO . " ORDER BY ID_PRODUCTO DESC";
        $stmt = $dbh->query($query);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $IDPROD = $productos[0]['ID_PRODUCTO'];
        echo "id PRODUCTO" . $IDPROD;
        $stmtVendedor = $dbh->prepare("SELECT DATOS_USUARIO_IDUSUARIO FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
        $stmtVendedor->execute([$IDPROD]);
        $IDUSUARIOVENDEDOR = $stmtVendedor->fetchColumn();
        $ESTADO = 0;
        $contador = 0;

        $DATA = $dbh->query("SELECT SYSDATE FROM DUAL");

        // Obtener la fecha actual
        $fecha_actual = $DATA->fetchColumn();

        $query = "SELECT MAX(IDPEDIDO) FROM PEDIDO";
        $stmt = $dbh->query($query);
        $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastID = $maxRow['MAX(IDPEDIDO)'] ?? 0;

        // Generar el nuevo ID sumando 1 al último ID
        $newID = $lastID + 1;

        // Verificar si el nuevo ID ya existe en la base de datos
        $query_check = "SELECT COUNT(IDPEDIDO) FROM PEDIDO WHERE IDPEDIDO = ?";
        $stmt_check = $dbh->prepare($query_check);
        $stmt_check->execute([$newID]);
        $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $countRow['COUNT(IDPEDIDO)'] ?? 0;

        // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
        while ($count > 0) {
            $newID++;
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['count'] ?? 0;
        }

        // El nuevo ID es único y seguro para usar
        $IDPEDIDO = $newID;

        $rowCount = insertData($dbh, 'PEDIDO', ['IDPEDIDO', 'IDUSUARIOVENDEDOR', 'IDUSUARIOCLIENTE', 'FECHA', 'ESTADO'], [$IDPEDIDO, $IDUSUARIOVENDEDOR, $IDUSUARIO, $fecha_actual, $ESTADO]);
        if ($rowCount > 0) {
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    $idProducto = $producto['ID_PRODUCTO'];
                    $stmtVendedor = $dbh->prepare("SELECT PRECIO, STOCK FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
                    $stmtVendedor->execute([$idProducto]);
                    $productoData = $stmtVendedor->fetch(PDO::FETCH_ASSOC);
                    $precio = $productoData['PRECIO'];
                    $stockActual = $productoData['STOCK'];

                    $cantidad = $_POST["cantidad" . $idProducto] ?? '';
                    $IMPORTE = $precio * $cantidad;

                    // Verificar si hay suficiente stock antes de registrar el detalle del pedido
                    if ($cantidad > $stockActual) {
                        echo "<script>alert('No hay suficiente stock para el producto " . $idProducto . ".'); window.location.href = 'Carrito.php?idUsuario=$IDUSUARIO';</script>";
                        exit();
                    }

                    $detalle_pedido = insertData($dbh, 'DETALLE_PEDIDO', ['PEDIDO_IDPEDIDO', 'DATOS_PRODUCTO_IDPRODUCTO', 'CANTIDAD', 'IMPORTE'], [$IDPEDIDO, $idProducto, $cantidad, $IMPORTE]);
                    if ($detalle_pedido > 0) {
                        // Actualizar stock del producto
                        $nuevoStock = $stockActual - $cantidad;
                        $query_update_stock = "UPDATE DATOS_PRODUCTO SET STOCK = ? WHERE IDPRODUCTO = ?";
                        $stmt_update_stock = $dbh->prepare($query_update_stock);
                        $stmt_update_stock->execute([$nuevoStock, $idProducto]);

                        $query = "SELECT CANTIDAD, IMPORTE FROM DETALLE_PEDIDO WHERE PEDIDO_IDPEDIDO = " . $IDPEDIDO;
                        $stmt = $dbh->query($query);
                        $TOTALES = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $TOTAL_PRECIO = 0;
                        $TOTAL_CANTIDAD = 0;
                        if (!empty($TOTALES)) {
                            foreach ($TOTALES as $TOTAL) {
                                $CANTIDAD_DETALLE = $TOTAL['CANTIDAD'];
                                $IMPORTE_DETALLE = $TOTAL['IMPORTE'];

                                $TOTAL_PRECIO += $IMPORTE_DETALLE;
                                $TOTAL_CANTIDAD += $CANTIDAD_DETALLE;
                            }
                        }
                    }

                    $query_update = "UPDATE PEDIDO SET TOTALPRECIO = ?, TOTALPRODUCTOS = ? WHERE IDPEDIDO = ?";
                    $stmt_update = $dbh->prepare($query_update);

                    // Ejecutar la consulta SQL con los valores proporcionados
                    $stmt_update->execute([$TOTAL_PRECIO, $TOTAL_CANTIDAD, $IDPEDIDO]);

                    // Verificar si la actualización fue exitosa
                    if ($stmt_update->rowCount() > 0) {
                        $query_delete = "DELETE FROM CARRITO WHERE ID_USUARIO = ?";
                        $stmt_delete = $dbh->prepare($query_delete);
                        $stmt_delete->execute([$IDUSUARIO]);

                        // Verificar si la eliminación fue exitosa
                        if ($stmt_delete->rowCount() > 0) {
                            echo "<script>alert('Tu pedido se ha registrado.'); window.location.href = 'FormComprar.php?idUsuario=$IDUSUARIO&idVendedor=$IDUSUARIOVENDEDOR';</script>";
                        } else {
                            echo "Hubo un problema al eliminar los productos del carrito.";
                        }
                    } else {
                        echo "Hubo un problema al actualizar el pedido.";
                    }

                    echo "precio" . $precio;
                    echo "cantidad" . $cantidad;
                    echo "id PRODUCTO" . $idProducto;
                    echo "total" . $IMPORTE;
                }
            }
        } else {
            echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='Comentarios.php?idUsuario=$IDUSUARIO&idProducto=$IDPROD';</script>";
        }
    }
}
?>
