<?php
include 'conexion.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"] ?? '';
    $precio = $_POST["precio"] ?? '';
    $stock = 0;
    $categoria_nombre = $_POST["categoria"] ?? '';
    $descripcion = $_POST["descripcion"] ?? '';
    $publicado = ($_POST["switchDisplay"] == "on") ? 1 : 0;
    $id_usuario = $_POST['idUsuario'] ?? '';

    

    function insertImage($dbh, $productId, $imageName, $newColumnValue)
    {
        try {
            // Preparar la consulta para insertar en PRODUCTS_IMG
            $query = "
                DECLARE 
                    V_TEMP BLOB;
                    V_BFILE BFILE;
                    V_NOMBRE_FOTO VARCHAR2(100);
                BEGIN 
                    INSERT INTO PRODUCTS_IMG (ID, FOTO, RUTA_PRODUCTO) VALUES (:productId, EMPTY_BLOB(), :newColumnValue) RETURNING FOTO INTO V_TEMP;
                    
                    V_NOMBRE_FOTO := :imageName;
                    V_BFILE := BFILENAME('OBJETOS_LOB2', V_NOMBRE_FOTO);
                    DBMS_LOB.OPEN(V_BFILE, DBMS_LOB.LOB_READONLY);
                    DBMS_LOB.LOADFROMFILE(V_TEMP, V_BFILE, DBMS_LOB.GETLENGTH(V_BFILE));
                    DBMS_LOB.CLOSE(V_BFILE);
                    COMMIT;
                END;
            ";

            // Preparar la declaración
            $stmt = $dbh->prepare($query);

            // Vincular parámetros
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':imageName', $imageName, PDO::PARAM_STR);
            $stmt->bindParam(':newColumnValue', $newColumnValue, PDO::PARAM_STR); // Suponiendo que el tipo de NEW_COLUMN es string, ajustar si es necesario

            // Ejecutar la declaración
            $stmt->execute();

            // Devolver éxito
            return true;
        } catch (PDOException $e) {
            // Si ocurre un error, hacer rollback de la transacción y devolver falso
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Preparar la consulta SQL para la inserción
    try {

        // Consultar el ID de la categoría
        $stmt_categoria = $dbh->prepare("SELECT idcategorias FROM categorias WHERE nombre_categoria = ?");
        $stmt_categoria->execute([$categoria_nombre]);
        $categorias = $stmt_categoria->fetch(PDO::FETCH_ASSOC);
        $idcategoria = $categorias['idcategorias'] ?? null;

       
        // Obtener el último ID insertado
        // Obtener el último ID insertado
            // Obtener el último ID de usuario de la base de datos
            $query = "SELECT MAX(idproducto) FROM datos_producto";
            $stmt = $dbh->query($query);
            $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $lastID = $maxRow['max(idproducto)'] ?? 0;

            // Generar el nuevo ID sumando 1 al último ID
            $newID = $lastID + 1;

            // Verificar si el nuevo ID ya existe en la base de datos
            $query_check = "SELECT COUNT(idproducto) FROM datos_producto WHERE idproducto = ?";
            $stmt_check = $dbh->prepare($query_check);
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['count(idproducto)'] ?? 0;

            // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
            while ($count > 0) {
                $newID++;
                $stmt_check->execute([$newID]);
                $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
                $count = $countRow['count'] ?? 0;
            }

            // El nuevo ID es único y seguro para usar
            $idproducto = $newID;
       
        // Insertar datos en la tabla de usuarios
        $rowCount = insertData($dbh, 'datos_producto', ['idproducto','datos_usuario_idusuario', 'categorias_idcategorias', 'stock', 'precio', 'descripcion', 'nombre', 'publicado',], [$idproducto, $id_usuario, $idcategoria, $stock, $precio, $descripcion, $nombre, $publicado]);

        // Verificar si la inserción fue exitosa
        if ($rowCount > 0) {
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
                echo "<script>alert('Producto registrado exitosamente!'); window.location.href = 'GestionProductos.php?idUsuario=$id_usuario';</script>";
            } else {
                echo "<script>alert('Hubo un problema al registrar el producto.'); window.location.href='AgregarProducto.php?idUsuario=$id_usuario';</script>";
            }
    } catch (PDOException $e) {
        // Mostrar mensaje de error si ocurre una excepción
        echo "Error al registrar el producto" . $e->getMessage();
    }
}
