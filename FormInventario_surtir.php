<?php
include 'conexion.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cantidad = $_POST["cantidad"] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $id_usuario = $_POST['idUsuario'] ?? '';
    $id_producto = $_POST['idProducto'] ?? '';


    echo "Cantidad" . $cantidad;
    echo "fecha" . $fecha;
    echo "idusuario" . $id_usuario;
    echo "idPROD" . $id_producto;


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
    
    function insertSurtido($dbh, $fecha, $cantidad, $product_id, $user_id)
    {
        try {
            // Generar un nuevo IDSURTIDO
            $id_surtido = generateSurtidoId($dbh);
    
            if ($id_surtido === false) {
                // Si no se pudo generar el IDSURTIDO, retorna falso
                return false;
            }
    
            // Insertar datos en la tabla surtido
            $stmt = $dbh->prepare("INSERT INTO surtido (idsurtido, datos_usuario_idusuario, fecha) VALUES (:id_surtido, :user_id, :fecha)");
            $stmt->bindParam(':id_surtido', $id_surtido, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
            $stmt->execute();
    
            // Insertar datos en la tabla datos_producto_has_surtido
            $stmt = $dbh->prepare("INSERT INTO datos_producto_has_surtido (datos_producto_idproducto, surtido_idsurtido, cantidad) VALUES (:product_id, :id_surtido, :cantidad)");
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->bindParam(':id_surtido', $id_surtido, PDO::PARAM_INT);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->execute();
    
            $stmt = $dbh->prepare("UPDATE datos_producto SET stock = stock + :cantidad WHERE idproducto = :product_id");
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stmt->execute();
    
            // Retornar éxito
            return true;
        } catch (PDOException $e) {
            // Si ocurre un error, manejarlo y retornar falso
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    insertSurtido($dbh, $fecha, $cantidad, $id_producto, $id_usuario);
}
