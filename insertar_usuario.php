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
    
    $IMAGENUSUARIO = null;
    if(isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === UPLOAD_ERR_OK) {
        // Obtener el contenido de la imagen
        $imagen_temp = $_FILES['profilePic']['tmp_name'];
        $IMAGENUSUARIO = file_get_contents($imagen_temp);
    } else {
        echo "Error al cargar la imagen: ";
        switch ($_FILES['profilePic']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "El archivo subido excede la directiva upload_max_filesize en php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "El archivo subido fue solo parcialmente cargado.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "Ningún archivo fue subido.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Falta la carpeta temporal.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Error al escribir el archivo en el disco.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "Una extensión de PHP detuvo la carga de archivos.";
                break;
            default:
                echo "Error desconocido al cargar la imagen.";
                break;
        }
    }

    try {
        // Verificar si el correo electrónico ya existe en la base de datos
        $stmt_check_email = $dbh->prepare("SELECT COUNT(*) FROM DATOS_USUARIO WHERE CORREO = ?");
        $stmt_check_email->execute([$CORREO]);
        $email_exists = $stmt_check_email->fetchColumn();
        
        if ($email_exists) {
            // El correo electrónico ya está registrado
            echo "El correo electrónico ya está registrado. Por favor, utilice otro correo electrónico.";
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
            $query = "SELECT COUNT(IDUSUARIO) FROM DATOS_USUARIO";
            $stmt = $dbh->query($query);
            $totalRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $totalRow['COUNT(IDUSUARIO)'] ?? 0;
            echo "El total de usuarios existentes: " . $IMAGENUSUARIO;
            // Generar el nuevo ID de usuario sumando 1 al último ID
            $IDUSUARIO = $total;

            // Asignar el valor del campo "Nombre Tienda" solo si el rol del usuario es "vendedor"
            $NOMBRE_TIENDA = null; // Valor predeterminado
            if ($ROL_NOMBRE === "vendedor") {
                $NOMBRE_TIENDA = $_POST['tienda-name'] ?? null;
            }
            echo "el valor es ". $IDUSUARIO;

            // Insertar datos en la tabla de usuarios
            $rowCount = insertData($dbh, 'DATOS_USUARIO', ['IDUSUARIO', 'NOMBRE_USUARIO', 'ESPECIALIDADES_IDESPECIALIDAD', 'ROL_IDROL', 'IMAGEN_USUARIO', 'NOMBRE_TIENDA', 'FECHA_NACIMIENTO', 'CORREO', 'CONTRASENA'], [$IDUSUARIO+1, $NOMBRE_USUARIO, $ESPECIALIDADES_IDESPECIALIDAD, $ROL_IDROL, $IMAGENUSUARIO, $NOMBRE_TIENDA, $fecha_formateada, $CORREO, $CONTRASENA_ENCRYPTADA]);

            // Verificar si la inserción fue exitosa
            if ($rowCount > 0) {
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
?>
