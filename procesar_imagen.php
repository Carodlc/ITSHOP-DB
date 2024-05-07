<?php
require_once 'conexion.php';

// Función para insertar la imagen en la base de datos
function insertImage($dbh, $productId, $imageName) {
    try {
        // Prepare the query to insert into PRODUCTS_IMG
        $query = "
            DECLARE 
                V_TEMP BLOB;
                V_BFILE BFILE;
                V_NOMBRE_FOTO VARCHAR2(100);
            BEGIN 
                INSERT INTO USUARIOS_IMG (ID, FOTO) VALUES (:productId, EMPTY_BLOB()) RETURNING FOTO INTO V_TEMP;
                
                V_NOMBRE_FOTO := :imageName;
                V_BFILE := BFILENAME('OBJETOS_LOB', V_NOMBRE_FOTO);
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

// Ruta de la carpeta donde se guardarán las imágenes
$directorioDestino = 'D:/8tavo/INGENIERIA DE SOFTWARE/ITSHOP DB/ImagenesPrueba/';

// Verifica si se ha enviado un archivo
if(isset($_FILES['imagen'])){
    $archivo = $_FILES['imagen'];

    // Obtiene información del archivo
    $nombreArchivo = $archivo['name'];
    $nombreTempArchivo = $archivo['tmp_name'];

    // Mueve el archivo a la carpeta destino
    if(move_uploaded_file($nombreTempArchivo, $directorioDestino . $nombreArchivo)){
        echo 'Imagen subida correctamente.';

        // Después de la inserción de la imagen en la carpeta local, inserta la información en la base de datos
        insertImage($dbh, 9, $nombreArchivo);
    } else {
        echo 'Error al subir la imagen.';
    }
}
?>
