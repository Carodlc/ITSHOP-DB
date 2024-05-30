<?php
require_once 'conexion.php';
function uploadToGithub($filePath, $repo, $branch, $token) {
    $fileName = basename($filePath);
    $content = file_get_contents($filePath);
    $contentEncoded = base64_encode($content);

    $url = "https://api.github.com/repos/$repo/contents/ImagenesPrueba/$fileName";

    $data = json_encode([
        'message' => "Upload $fileName",
        'content' => $contentEncoded,
        'branch'  => $branch
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,
        'User-Agent: PHP'
    ]);

    $response = curl_exec($ch);
    if ($response === false) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
    } else {
        echo 'Respuesta de GitHub: ' . $response;
    }
    curl_close($ch);
}

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
    $fecha_formateada = date('Y-m-d', strtotime($FECHA_NACIMIENTO)); // Corregido el formato de la fecha

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

            // Obtener el último ID insertado
            $query = "SELECT MAX(IDUSUARIO) FROM DATOS_USUARIO";
            $stmt = $dbh->query($query);
            $maxRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $lastID = $maxRow['MAX(IDUSUARIO)'] ?? 0;

            // Generar el nuevo ID sumando 1 al último ID
            $IDUSUARIO = $lastID + 1;

            // Asignar el valor del campo "Nombre Tienda" y "Teléfono" solo si el rol del usuario es "vendedor"
            $NOMBRE_TIENDA = null; // Valor predeterminado
            $TELEFONO = null;
            if ($ROL_NOMBRE === "vendedor") {
                $NOMBRE_TIENDA = $_POST['tienda-name'] ?? null;
                $TELEFONO = $_POST['telefono'] ?? null;
            }

            // Insertar datos en la tabla de usuarios
            $stmt_insert = $dbh->prepare("INSERT INTO DATOS_USUARIO (IDUSUARIO, NOMBRE_USUARIO, ESPECIALIDADES_IDESPECIALIDAD, ROL_IDROL, NOMBRE_TIENDA, FECHA_NACIMIENTO, CORREO, CONTRASENA, TELEFONO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $rowCount = $stmt_insert->execute([$IDUSUARIO, $NOMBRE_USUARIO, $ESPECIALIDADES_IDESPECIALIDAD, $ROL_IDROL, $NOMBRE_TIENDA, $fecha_formateada, $CORREO, $CONTRASENA_ENCRYPTADA, $TELEFONO]);

            // Verificar si la inserción fue exitosa
            if ($rowCount > 0) {
                // Verifica si se ha enviado un archivo
                if (isset($_FILES['imagen'])) {
                    $archivo = $_FILES['imagen'];

                    // Obtiene información del archivo
                    $nombreArchivo = $archivo['name'];
                    $nombreTempArchivo = $archivo['tmp_name'];

                    // Ruta temporal para almacenar la imagen antes de subirla a GitHub
                    $directorioTemporal = sys_get_temp_dir();
                    $rutaTemporal = $directorioTemporal . '/' . $nombreArchivo;

                    // Mueve el archivo a la carpeta temporal
                    if (move_uploaded_file($nombreTempArchivo, $rutaTemporal)) {
                        // Datos para la API de GitHub
                        $token = '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'; // Reemplaza con tu token de acceso personal de GitHub
                        $repo = 'Carodlc/ITSHOP-DB'; // Reemplaza con tu usuario y repositorio
                        $branch = 'main'; // Reemplaza con la rama en la que quieres subir el archivo

                        // Sube el archivo a GitHub
                        $response = uploadToGithub($rutaTemporal, $repo, $branch, $token);

                        if (isset($response['content']['download_url'])) {
                            $urlGitHub = $response['content']['download_url'];

                            // Después de la inserción de la imagen en GitHub, inserta la información en la base de datos
                            $stmt_insert_image = $dbh->prepare("INSERT INTO USUARIOS_IMG (ID, FOTO, RUTA_USUARIO) VALUES (?, ?, ?)");
                            $stmt_insert_image->execute([$IDUSUARIO, $nombreArchivo, $urlGitHub]);

                            echo "<script>alert('Usuario registrado exitosamente!'); window.location.href = 'inicio_sesion.html';</script>";
                        } else {
                            echo 'Error al subir la imagen a GitHub.';
                        }
                    } else {
                        echo 'Error al mover la imagen a la carpeta temporal.';
                    }
                } else {
                    echo "<script>alert('Usuario registrado exitosamente!'); window.location.href = 'inicio_sesion.html';</script>";
                }
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
