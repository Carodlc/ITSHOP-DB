<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $IDUSUARIO = $_POST['idUsuario'] ?? '';

        $query = "SELECT id_producto, CANTIDAD FROM CARRITO WHERE ID_USUARIO = " . $IDUSUARIO . " ORDER BY id_producto DESC";
        $stmt = $dbh->query($query);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $IDPROD = $productos[0]['id_producto'];
        $stmtVendedor = $dbh->prepare("SELECT DATOS_USUARIO_IDUSUARIO FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
        $stmtVendedor->execute([$IDPROD]);
        $IDUSUARIOVENDEDOR = $stmtVendedor->fetchColumn();
        $ESTADO = 0;
        $contador = 0;

        $DATA = $dbh->query("SELECT CURDATE()");

        // Obtener la fecha actual
        $fecha_actual = $DATA->fetchColumn();

        $query = "SELECT MAX(idpedido) FROM pedido";
        $stmt = $dbh->query($query);
        $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastID = $maxRow['MAX(idpedido)'] ?? 0;

        // Generar el nuevo ID sumando 1 al último ID
        $newID = $lastID + 1;

        // Verificar si el nuevo ID ya existe en la base de datos
        $query_check = "SELECT COUNT(idpedido) FROM pedido WHERE idpedido = ?";
        $stmt_check = $dbh->prepare($query_check);
        $stmt_check->execute([$newID]);
        $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $countRow['COUNT(idpedido)'] ?? 0;

        // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
        while ($count > 0) {
            $newID++;
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['count'] ?? 0;
        }

        // El nuevo ID es único y seguro para usar
        $idpedido = $newID;

        $rowCount = insertData($dbh, 'pedido', ['idpedido', 'IDUSUARIOVENDEDOR', 'IDUSUARIOCLIENTE', 'FECHA', 'ESTADO'], [$idpedido, $IDUSUARIOVENDEDOR, $IDUSUARIO, $fecha_actual, $ESTADO]);
        if ($rowCount > 0) {
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    $idProducto = $producto['id_producto'];
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

                    $detalle_pedido = insertData($dbh, 'DETALLE_pedido', ['pedido_idpedido', 'DATOS_PRODUCTO_IDPRODUCTO', 'CANTIDAD', 'IMPORTE'], [$idpedido, $idProducto, $cantidad, $IMPORTE]);
                    if ($detalle_pedido > 0) {
                        // Actualizar stock del producto
                        $nuevoStock = $stockActual - $cantidad;
                        $query_update_stock = "UPDATE DATOS_PRODUCTO SET STOCK = ? WHERE IDPRODUCTO = ?";
                        $stmt_update_stock = $dbh->prepare($query_update_stock);
                        $stmt_update_stock->execute([$nuevoStock, $idProducto]);

                        $query = "SELECT CANTIDAD, IMPORTE FROM DETALLE_pedido WHERE pedido_idpedido = " . $idpedido;
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

                    $query_update = "UPDATE pedido SET TOTALPRECIO = ?, TOTALPRODUCTOS = ? WHERE idpedido = ?";
                    $stmt_update = $dbh->prepare($query_update);

                    // Ejecutar la consulta SQL con los valores proporcionados
                    $stmt_update->execute([$TOTAL_PRECIO, $TOTAL_CANTIDAD, $idpedido]);

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

                }
            }
        } else {
            echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='Comentarios.php?idUsuario=$IDUSUARIO&idProducto=$IDPROD';</script>";
        }
    }
}
?>
