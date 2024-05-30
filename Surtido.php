<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $idUsuario = $_POST['idUsuario'] ?? '';

        $query = "SELECT * FROM datos_producto WHERE datos_usuario_idusuario = " . $idUsuario . " ORDER BY idproducto DESC";
        $stmt = $dbh->query($query);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $idProd = $productos[0]['idproducto'];
        echo "id producto" . $idProd;
        $stmtVendedor = $dbh->prepare("SELECT datos_usuario_idusuario FROM datos_producto WHERE idproducto = ?");
        $stmtVendedor->execute([$idProd]);
        $idUsuarioVendedor = $stmtVendedor->fetchColumn();
        $estado = 0;
        $contador = 0;

        $data = $dbh->query("SELECT sysdate FROM dual");

        // Obtener la fecha actual
        $fecha_actual = $data->fetchColumn();

        $query = "SELECT MAX(idsurtido) FROM surtido";
        $stmt = $dbh->query($query);
        $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastID = $maxRow['max(idsurtido)'] ?? 0;

        // Generar el nuevo ID sumando 1 al último ID
        $newID = $lastID + 1;

        // Verificar si el nuevo ID ya existe en la base de datos
        $query_check = "SELECT COUNT(idsurtido) FROM surtido WHERE idsurtido = ?";
        $stmt_check = $dbh->prepare($query_check);
        $stmt_check->execute([$newID]);
        $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $countRow['count(idsurtido)'] ?? 0;

        // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
        while ($count > 0) {
            $newID++;
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['count'] ?? 0;
        }

        // El nuevo ID es único y seguro para usar
        $idSurtido = $newID;

        $rowCount = insertData($dbh, 'surtido', ['idsurtido', 'datos_usuario_idusuario', 'fecha'], [$idSurtido, $idUsuarioVendedor, $fecha_actual,]);
        if ($rowCount > 0) {
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    $idProducto = $producto['idproducto'];

                    $cantidad = $_POST["cantidad" . $idProducto] ?? '';
                    if ($cantidad > 0) {
                        $detalle_surtido = insertData($dbh, 'datos_producto_has_surtido', ['datos_producto_idproducto', 'surtido_idsurtido', 'cantidad'], [$idProducto, $idSurtido, $cantidad,]);
                        if ($detalle_surtido > 0) {
                            // Actualizar el stock del producto
                            $updateStmt = $dbh->prepare("UPDATE datos_producto SET stock = stock + ? WHERE idproducto = ?");
                            $updateStmt->execute([$cantidad, $idProducto]);
                        }
                    }
                    echo "cantidad" . $cantidad ."<br>";
                    echo "id producto" . $idProducto;
                }
            }
        } else {
            echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='FormInventario.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
        }
    }
}
