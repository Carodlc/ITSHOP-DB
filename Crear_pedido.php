<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $idusuario = $_POST['idUsuario'] ?? '';

        $query = "SELECT id_producto, cantidad FROM carrito WHERE id_usuario = " . $idusuario . " ORDER BY id_producto DESC";
        $stmt = $dbh->query($query);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $idprod = $productos[0]['id_producto'];
        echo "id PRODUCTO" . $idprod;
        $stmtvendedor = $dbh->prepare("SELECT datos_usuario_idusuario FROM datos_producto WHERE idproducto = ?");
        $stmtvendedor->execute([$idprod]);
        $idusuariovendedor = $stmtvendedor->fetchColumn();
        $estado = 0;
        $contador = 0;

        $data = $dbh->query("SELECT SYSDATE FROM dual");

        // Obtener la fecha actual
        $fecha_actual = $data->fetchColumn();

        $query = "SELECT MAX(idpedido) FROM pedido";
        $stmt = $dbh->query($query);
        $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastID = $maxRow['MAX(IDPEDIDO)'] ?? 0;

        // Generar el nuevo ID sumando 1 al último ID
        $newID = $lastID + 1;

        // Verificar si el nuevo ID ya existe en la base de datos
        $query_check = "SELECT COUNT(idpedido) FROM pedido WHERE idpedido = ?";
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
        $idpedido = $newID;

        $rowCount = insertData($dbh, 'pedido', ['idpedido', 'idusuariovendedor', 'idusuariocliente', 'fecha', 'estado'], [$idpedido, $idusuariovendedor, $idusuario, $fecha_actual, $estado]);
        if ($rowCount > 0) {
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    $idproducto = $producto['id_producto'];
                    $stmtvendedor = $dbh->prepare("SELECT precio, stock FROM datos_producto WHERE idproducto = ?");
                    $stmtvendedor->execute([$idproducto]);
                    $productoData = $stmtvendedor->fetch(PDO::FETCH_ASSOC);
                    $precio = $productoData['precio'];
                    $stockActual = $productoData['stock'];

                    $cantidad = $_POST["cantidad" . $idproducto] ?? '';
                    $importe = $precio * $cantidad;

                    // Verificar si hay suficiente stock antes de registrar el detalle del pedido
                    if ($cantidad > $stockActual) {
                        echo "<script>alert('No hay suficiente stock para el producto " . $idproducto . ".'); window.location.href = 'Carrito.php?idUsuario=$idusuario';</script>";
                        exit();
                    }

                    $detalle_pedido = insertData($dbh, 'detalle_pedido', ['pedido_idpedido', 'datos_producto_idproducto', 'cantidad', 'importe'], [$idpedido, $idproducto, $cantidad, $importe]);
                    if ($detalle_pedido > 0) {
                        // Actualizar stock del producto
                        $nuevoStock = $stockActual - $cantidad;
                        $query_update_stock = "UPDATE datos_producto SET stock = ? WHERE idproducto = ?";
                        $stmt_update_stock = $dbh->prepare($query_update_stock);
                        $stmt_update_stock->execute([$nuevoStock, $idproducto]);

                        $query = "SELECT cantidad, importe FROM detalle_pedido WHERE pedido_idpedido = " . $idpedido;
                        $stmt = $dbh->query($query);
                        $totales = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $totalprecio = 0;
                        $totalcantidad = 0;
                        if (!empty($totales)) {
                            foreach ($totales as $total) {
                                $cantidad_detalle = $total['cantidad'];
                                $importe_detalle = $total['importe'];

                                $totalprecio += $importe_detalle;
                                $totalcantidad += $cantidad_detalle;
                            }
                        }
                    }

                    $query_update = "UPDATE pedido SET totalprecio = ?, totalproductos = ? WHERE idpedido = ?";
                    $stmt_update = $dbh->prepare($query_update);

                    // Ejecutar la consulta SQL con los valores proporcionados
                    $stmt_update->execute([$totalprecio, $totalcantidad, $idpedido]);

                    // Verificar si la actualización fue exitosa
                    if ($stmt_update->rowCount() > 0) {
                        $query_delete = "DELETE FROM carrito WHERE id_usuario = ?";
                        $stmt_delete = $dbh->prepare($query_delete);
                        $stmt_delete->execute([$idusuario]);

                        // Verificar si la eliminación fue exitosa
                        if ($stmt_delete->rowCount() > 0) {
                            echo "<script>alert('Tu pedido se ha registrado.'); window.location.href = 'FormComprar.php?idUsuario=$idusuario&idVendedor=$idusuariovendedor';</script>";
                        } else {
                            echo "Hubo un problema al eliminar los productos del carrito.";
                        }
                    } else {
                        echo "Hubo un problema al actualizar el pedido.";
                    }

                    echo "precio" . $precio;
                    echo "cantidad" . $cantidad;
                    echo "id PRODUCTO" . $idproducto;
                    echo "total" . $importe;
                }
            }
        } else {
            echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='Comentarios.php?idUsuario=$idusuario&idProducto=$idprod';</script>";
        }
    }
}
?>
