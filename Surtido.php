<?php
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    if (isset($_POST['idUsuario'])) {
        // Obtener el valor de 'idUsuario'
        $IDUSUARIO = $_POST['idUsuario'] ?? '';




        $query = "SELECT * FROM DATOS_PRODUCTO WHERE DATOS_USUARIO_IDUSUARIO = " . $IDUSUARIO . " ORDER BY IDPRODUCTO DESC";
        $stmt = $dbh->query($query);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $IDPROD = $productos[0]['IDPRODUCTO'];
        echo "id PRODUCTO" . $IDPROD;
        $stmtVendedor = $dbh->prepare("SELECT DATOS_USUARIO_IDUSUARIO FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
        $stmtVendedor->execute([$IDPROD]);
        $IDUSUARIOVENDEDOR = $stmtVendedor->fetchColumn();
        $ESTADO = 0;
        $contador = 0;

        $DATA = $dbh->query("SELECT SYSDATE FROM DUAL");

        // Obtener la fecha actual
        $fecha_actual = $DATA->fetchColumn();

        $query = "SELECT MAX(IDSURTIDO) FROM SURTIDO";
        $stmt = $dbh->query($query);
        $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastID = $maxRow['MAX(IDSURTIDO)'] ?? 0;

        // Generar el nuevo ID sumando 1 al último ID
        $newID = $lastID + 1;

        // Verificar si el nuevo ID ya existe en la base de datos
        $query_check = "SELECT COUNT(IDSURTIDO) FROM SURTIDO WHERE IDSURTIDO = ?";
        $stmt_check = $dbh->prepare($query_check);
        $stmt_check->execute([$newID]);
        $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = $countRow['COUNT(IDSURTIDO)'] ?? 0;

        // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
        while ($count > 0) {
            $newID++;
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['count'] ?? 0;
        }

        // El nuevo ID es único y seguro para usar
        $IDSURTIDO = $newID;

        $rowCount = insertData($dbh, 'SURTIDO', ['IDSURTIDO', 'DATOS_USUARIO_IDUSUARIO', 'FECHA'], [$IDSURTIDO, $IDUSUARIOVENDEDOR, $fecha_actual,]);
        if ($rowCount > 0) {
            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    $idProducto = $producto['IDPRODUCTO'];
                    

                    $cantidad = $_POST["cantidad" . $idProducto] ?? '';
                    if ($cantidad > 0) {





                        $detalle_surtido = insertData($dbh, 'DATOS_PRODUCTO_HAS_SURTIDO', ['DATOS_PRODUCTO_IDPRODUCTO', 'SURTIDO_IDSURTIDO', 'CANTIDAD',], [$idProducto, $IDSURTIDO, $cantidad,]);
                        if ($detalle_surtido > 0) {
                            // Actualizar el stock del producto
                            $updateStmt = $dbh->prepare("UPDATE DATOS_PRODUCTO SET STOCK = STOCK + ? WHERE IDPRODUCTO = ?");
                            $updateStmt->execute([$cantidad, $idProducto]);
                        }
                    }
                    echo "cantidad" . $cantidad ."<br>";
                    echo "id PRODUCTO" . $idProducto;
                }
            }
        } else {
            echo "<script>alert('Hubo un problema al agregar el producto.'); window.location.href='FormInventario.php?idUsuario=$idUsuario&idProducto=$idProducto';</script>";
        }
    }
}
