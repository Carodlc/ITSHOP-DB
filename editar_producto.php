<?php
include 'conexion.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"] ?? '';
    $precio = $_POST["precio"] ?? '';

    $categoria_nombre = $_POST["categoria"] ?? '';
    $descripcion = $_POST["descripcion"] ?? '';
    $publicado = ($_POST["switchDisplay"] == "on") ? 1 : 0;
    $id_usuario = $_POST['idUsuario'] ?? '';
    $idproducto = $_POST['idProducto'] ?? '';


    function insertImage($dbh, $productId, $imageName, $newColumnValue)
    {
        try {
            // Prepare the query to insert into PRODUCTS_IMG
            $query = "
            DECLARE 
            V_TEMP BLOB;
            V_BFILE BFILE;
            V_NOMBRE_FOTO VARCHAR2(100);
        BEGIN 

            UPDATE PRODUCTS_IMG
            SET FOTO = EMPTY_BLOB(),
                RUTA_PRODUCTO = :newColumnValue
            WHERE ID = :productId
            RETURNING FOTO INTO V_TEMP;
            
            -- Cargar la nueva imagen desde el archivo en la columna FOTO
            V_NOMBRE_FOTO := :imageName;
            V_BFILE := BFILENAME('OBJETOS_LOB2', V_NOMBRE_FOTO);
            DBMS_LOB.OPEN(V_BFILE, DBMS_LOB.LOB_READONLY);
            DBMS_LOB.LOADFROMFILE(V_TEMP, V_BFILE, DBMS_LOB.GETLENGTH(V_BFILE));
            DBMS_LOB.CLOSE(V_BFILE);
            COMMIT;
        END;
        
            ";

            // Prepare the statement
            $stmt = $dbh->prepare($query);

            // Bind parameters
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':newColumnValue', $newColumnValue, PDO::PARAM_STR); // Assuming the type of NEW_COLUMN is string, adjust if needed

            // Execute the statement
            $stmt->execute();

            // Return success
            return true;
        } catch (PDOException $e) {
            // If an error occurs, rollback the transaction and return false
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Preparar la consulta SQL para la inserción
    try {

        // Consultar el ID de la especialidad
        $stmt_especialidad = $dbh->prepare("SELECT IDCATEGORIAS FROM CATEGORIAS WHERE NOMBRE_CATEGORIA = ?");
        $stmt_especialidad->execute([$categoria_nombre]);
        $categorias = $stmt_especialidad->fetch(PDO::FETCH_ASSOC);
        $idcategoria = $categorias['IDCATEGORIAS'] ?? null;


        // Insertar datos en la tabla de usuarios
        $query_update = "UPDATE DATOS_PRODUCTO SET CATEGORIAS_IDCATEGORIAS = ?, PRECIO = ?, DESCRIPCION = ?, NOMBRE = ?, PUBLICADO = ? WHERE IDPRODUCTO = ?";
        $stmt_update = $dbh->prepare($query_update);
        $stmt_update->execute([$idcategoria,$precio, $descripcion, $nombre, $publicado,$idproducto]);


        // Verificar si la inserción fue exitosa
        if ($stmt_update->rowCount() > 0) {
            $directorioDestino = 'D:/8tavo/INGENIERIA DE SOFTWARE/ITSHOP DB/ImagenesProductos/';

            // Verifica si se ha enviado un archivo
            if (isset($_FILES['imagen'])) {
                $archivo = $_FILES['imagen'];

                // Obtiene información del archivo
                $nombreArchivo = $archivo['name'];
                $nombreTempArchivo = $archivo['tmp_name'];

                // Mueve el archivo a la carpeta destino
                if (move_uploaded_file($nombreTempArchivo, $directorioDestino . $nombreArchivo,)) {

                    // Después de la inserción de la imagen en la carpeta local, inserta la información en la base de datos
                    insertImage($dbh, $idproducto, $nombreArchivo, $directorioDestino . $nombreArchivo);
                } else {
                    echo 'Error al subir la imagen.';
                }
            }
            echo "<script>alert('Producto actualizado exitosamente!'); window.location.href = 'GestionProductos.php?idUsuario=$id_usuario';</script>";
        } else {
            echo "<script>alert('Hubo un problema al actualizar el producto.'); window.location.href='FormEditar_producto.php?idUsuario=$id_usuario&idProducto=$idproducto';</script>";
        }
    } catch (PDOException $e) {
        // Mostrar mensaje de error si ocurre una excepción
        echo "Error al actualizar el producto" . $e->getMessage();
    }
}
?>
