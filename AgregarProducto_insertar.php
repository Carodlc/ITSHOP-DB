<?php
include 'conexion.php';
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"] ?? '';
    $precio = $_POST["precio"] ?? '';
    $stock = 0;
    $CATEGORIA_NOMBRE = $_POST["categoria"] ?? '';
    $descripcion = $_POST["descripcion"] ?? '';
    $publicado = ($_POST["switchDisplay"] == "on") ? 1 : 0;
    $ID_USUARIO = $_POST['idUsuario'] ?? '';

    echo "Nombre: " . $nombre . "<br>";
    echo "Precio: " . $precio . "<br>";
    echo "Stock: " . $stock . "<br>";
    echo "Categoría: " . $CATEGORIA_NOMBRE . "<br>";
    echo "Descripción: " . $descripcion . "<br>";
    echo "Publicado: " . $publicado . "<br>";
    echo "IDUSUARIO: " . $ID_USUARIO. "<br>";

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
                    INSERT INTO PRODUCTS_IMG (ID, FOTO, RUTA_PRODUCTO) VALUES (:productId, EMPTY_BLOB(), :newColumnValue) RETURNING FOTO INTO V_TEMP;
                    
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
        $stmt_especialidad->execute([$CATEGORIA_NOMBRE]);
        $categorias = $stmt_especialidad->fetch(PDO::FETCH_ASSOC);
        $IDCATEGORIA = $categorias['IDCATEGORIAS'] ?? null;

       
        // Obtener el último ID insertado
        // Obtener el último ID insertado
            // Obtener el último ID de usuario de la base de datos
            $query = "SELECT MAX(IDPRODUCTO) FROM DATOS_PRODUCTO";
            $stmt = $dbh->query($query);
            $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $lastID = $maxRow['MAX(IDPRODUCTO)'] ?? 0;

            // Generar el nuevo ID sumando 1 al último ID
            $newID = $lastID + 1;

            // Verificar si el nuevo ID ya existe en la base de datos
            $query_check = "SELECT COUNT(IDPRODUCTO) FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?";
            $stmt_check = $dbh->prepare($query_check);
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['COUNT(IDPRODUCTO)'] ?? 0;

            // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
            while ($count > 0) {
                $newID++;
                $stmt_check->execute([$newID]);
                $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
                $count = $countRow['count'] ?? 0;
            }

            // El nuevo ID es único y seguro para usar
            $IDPRODUCTO = $newID;
       
        // Insertar datos en la tabla de usuarios
        $rowCount = insertData($dbh, 'DATOS_PRODUCTO', ['IDPRODUCTO','DATOS_USUARIO_IDUSUARIO', 'CATEGORIAS_IDCATEGORIAS', 'STOCK', 'PRECIO', 'DESCRIPCION', 'NOMBRE', 'PUBLICADO',], [$IDPRODUCTO, $ID_USUARIO, $IDCATEGORIA, $stock, $precio, $descripcion, $nombre, $publicado]);

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
                        echo 'Imagen subida correctamente.';

                        // Después de la inserción de la imagen en la carpeta local, inserta la información en la base de datos
                        insertImage($dbh, $IDPRODUCTO, $nombreArchivo, $directorioDestino . $nombreArchivo);
                    } else {
                        echo 'Error al subir la imagen.';
                    }
                }
                echo "<script>alert('Producto registrado exitosamente!'); window.location.href = 'Vendedor_perfil?idUsuario=$ID_USUARIO';</script>";
            } else {
                echo "<script>alert('Hubo un problema al registrar el producto.'); window.location.href='AgregarProducto.php?idUsuario=$ID_USUARIO';</script>";
            }
    } catch (PDOException $e) {
        // Mostrar mensaje de error si ocurre una excepción
        echo "Error al registrar el producto" . $e->getMessage();
    }
}
