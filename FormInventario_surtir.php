<?php
include 'conexion.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cantidad = $_POST["cantidad"] ?? '';
    $FECHA = $_POST['fecha'] ?? '';
    $ID_USUARIO = $_POST['idUsuario'] ?? '';
    $ID_PRODUCTO = $_POST['idProducto'] ?? '';


    echo "Cantidad" . $cantidad;
    echo "fecha" . $FECHA;
    echo "idusuario" . $ID_USUARIO;
    echo "idPROD" . $ID_PRODUCTO;


    function generateSurtidoId($dbh)
    {
        try {
            // Obtener el próximo valor de la secuencia para IDSURTIDO
            $stmt = $dbh->prepare("SELECT SEQ_SURTIDO.NEXTVAL FROM DUAL");
            $stmt->execute();
            $nextval = $stmt->fetchColumn();
            
            // Retornar el próximo valor de la secuencia
            return $nextval;
        } catch (PDOException $e) {
            // Manejar cualquier error que pueda ocurrir al obtener el próximo valor de la secuencia
            echo "Error al generar IDSURTIDO: " . $e->getMessage();
            return false;
        }
    }
    
    function insertSurtido($dbh, $fecha, $cantidad, $productId, $userId)
    {
        try {
            // Generar un nuevo IDSURTIDO
            $idSurtido = generateSurtidoId($dbh);
    
            if ($idSurtido === false) {
                // Si no se pudo generar el IDSURTIDO, retorna falso
                return false;
            }
    
            // Insertar datos en la tabla SURTIDO
            $stmt = $dbh->prepare("INSERT INTO SURTIDO (IDSURTIDO, DATOS_USUARIO_IDUSUARIO, FECHA) VALUES (:idSurtido, :userId, :fecha)");
            $stmt->bindParam(':idSurtido', $idSurtido, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->execute();
    
            // Insertar datos en la tabla DATOS_PRODUCTO_HAS_SURTIDO
            $stmt = $dbh->prepare("INSERT INTO DATOS_PRODUCTO_HAS_SURTIDO (DATOS_PRODUCTO_IDPRODUCTO, SURTIDO_IDSURTIDO, CANTIDAD) VALUES (:productId, :idSurtido, :cantidad)");
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':idSurtido', $idSurtido, PDO::PARAM_INT);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->execute();
    
            $stmt = $dbh->prepare("UPDATE DATOS_PRODUCTO SET STOCK = STOCK + :cantidad WHERE IDPRODUCTO = :productId");
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->execute();
    
            // Retornar éxito
            return true;
        } catch (PDOException $e) {
            // Si ocurre un error, manejarlo y retornar falso
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    insertSurtido($dbh, $FECHA, $cantidad, $ID_PRODUCTO, $ID_USUARIO);
}
