<?php
require_once 'conexion.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar los datos del formulario
    $NOMBRE_USUARIO = $_POST['nombre'] ?? '';
    $ESPECIALIDAD_NOMBRE = $_POST['especialidad'] ?? '';
    $CORREO = $_POST['email'] ?? '';
    $CONTRASENA = $_POST['password'] ?? '';
    $CONTRASENA_ENCRYPTADA = password_hash($CONTRASENA, PASSWORD_DEFAULT); // Cifrar la contraseña
    $ROL_NOMBRE = $_POST['roles'] ?? ''; // Convertir a minúsculas antes de comparar
    $FECHA_NACIMIENTO = $_POST['fecha-nacimiento'] ?? '';
    $fecha_formateada = date('d-m-y', strtotime(str_replace('/', '-', $FECHA_NACIMIENTO)));
    // Manejar la carga de la imagen

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
                    INSERT INTO USUARIOS_IMG (ID, FOTO, RUTA_USUARIO) VALUES (:productId, EMPTY_BLOB(), :newColumnValue) RETURNING FOTO INTO V_TEMP;
                    
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


    // Ruta de la carpeta donde se guardarán las imágenes


    try {
        // Verificar si el correo electrónico ya existe en la base de datos
        $stmt_check_email = $dbh->prepare("SELECT COUNT(*) FROM DATOS_USUARIO WHERE CORREO = ?");
        $stmt_check_email->execute([$CORREO]);
        $email_exists = $stmt_check_email->fetchColumn();

        if ($email_exists) {
            // El correo electrónico ya está registrado
            echo "<script>alert('El correo electrónico ya está registrado. Por favor, utilice otro correo electrónico.');</script>";
            echo "<script>history.back();</script>";
            exit; // Salir del script PHP para evitar que se imprima más contenido HTML
        } else {
            // Consultar el ID de la especialidad
            $stmt_especialidad = $dbh->prepare("SELECT IDESPECIALIDAD FROM ESPECIALIDADES WHERE NOMBREESPECIALIDAD = ?");
            $stmt_especialidad->execute([$ESPECIALIDAD_NOMBRE]);
            $especialidad_row = $stmt_especialidad->fetch(PDO::FETCH_ASSOC);
            $ESPECIALIDADES_IDESPECIALIDAD = $especialidad_row['IDESPECIALIDAD'] ?? null;

            // Consultar el ID del rol
            $stmt_rol = $dbh->prepare("SELECT IDROL FROM ROL WHERE NOMBREROL = ?");
            $stmt_rol->execute([$ROL_NOMBRE]);
            $rol_row = $stmt_rol->fetch(PDO::FETCH_ASSOC);
            $ROL_IDROL = $rol_row['IDROL'] ?? '';
            echo "El ROLESSSSSSSSSSSSS: " . $ROL_NOMBRE;

            // Obtener el último ID insertado
            // Obtener el último ID de usuario de la base de datos
            $query = "SELECT MAX(IDUSUARIO) FROM DATOS_USUARIO";
            $stmt = $dbh->query($query);
            $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $lastID = $maxRow['MAX(IDUSUARIO)'] ?? 0;

            // Generar el nuevo ID sumando 1 al último ID
            $newID = $lastID + 1;

            // Verificar si el nuevo ID ya existe en la base de datos
            $query_check = "SELECT COUNT(IDUSUARIO) FROM DATOS_USUARIO WHERE IDUSUARIO = ?";
            $stmt_check = $dbh->prepare($query_check);
            $stmt_check->execute([$newID]);
            $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
            $count = $countRow['COUNT(IDUSUARIO)'] ?? 0;

            // Si el nuevo ID ya existe, seguir incrementando hasta encontrar un ID único
            while ($count > 0) {
                $newID++;
                $stmt_check->execute([$newID]);
                $countRow = $stmt_check->fetch(PDO::FETCH_ASSOC);
                $count = $countRow['count'] ?? 0;
            }

            // El nuevo ID es único y seguro para usar
            $IDUSUARIO = $newID;




            // Asignar el valor del campo "Nombre Tienda" solo si el rol del usuario es "vendedor"
            $NOMBRE_TIENDA = null; // Valor predeterminado
            $TELEFONO = null;
            if ($ROL_NOMBRE === "vendedor") {
                $NOMBRE_TIENDA = $_POST['tienda-name'] ?? null;
                $TELEFONO = $_POST['telefono'] ?? null;

            }
            echo "el valor es " . $IDUSUARIO;

            // Insertar datos en la tabla de usuarios
            $rowCount = insertData($dbh, 'DATOS_USUARIO', ['IDUSUARIO', 'NOMBRE_USUARIO', 'ESPECIALIDADES_IDESPECIALIDAD', 'ROL_IDROL', 'NOMBRE_TIENDA', 'FECHA_NACIMIENTO', 'CORREO', 'CONTRASENA','TELEFONO'], [$IDUSUARIO , $NOMBRE_USUARIO, $ESPECIALIDADES_IDESPECIALIDAD, $ROL_IDROL,  $NOMBRE_TIENDA, $fecha_formateada, $CORREO, $CONTRASENA_ENCRYPTADA,$TELEFONO]);

            // Verificar si la inserción fue exitosa
            if ($rowCount > 0) {
                $directorioDestino = 'D:/8tavo/INGENIERIA DE SOFTWARE/ITSHOP DB/ImagenesPrueba/';

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
                        insertImage($dbh, $IDUSUARIO, $nombreArchivo, $directorioDestino . $nombreArchivo);
                    } else {
                        echo 'Error al subir la imagen.';
                    }
                }
                echo "<script>alert('Usuario registrado exitosamente!'); window.location.href = 'inicio_sesion.html';</script>";
            } else {
                echo "<script>alert('Hubo un problema al registrar el usuario.'); window.location.href='registrarse.php';</script>";
            }
        }
    } catch (PDOException $e) {
        // Mostrar mensaje de error si ocurre una excepción
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
