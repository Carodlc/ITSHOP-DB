<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo y la contraseña del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Consultar la base de datos para verificar las credenciales

        $stmt = $dbh->prepare("SELECT COUNT(*) FROM DATOS_USUARIO WHERE correo = ?");
        $stmt->execute([$email]); // Pasar los parámetros en un solo array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $checar = $result['COUNT(*)'];

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($checar > 0) {
            // Inicio de sesión exitoso
            $stmt_rol = $dbh->prepare("SELECT contrasena FROM DATOS_USUARIO WHERE correo = ?");
            $stmt_rol->execute([$email]);
            $rol_row = $stmt_rol->fetch(PDO::FETCH_ASSOC);
            $contrasena_en_bd = $rol_row['CONTRASENA'] ?? '';

            if (password_verify($password, $contrasena_en_bd)) {
                $stmt_rol = $dbh->prepare("SELECT IDUSUARIO FROM DATOS_USUARIO WHERE CORREO = ?");
                $stmt_rol->execute([$email]);
                $rol_row = $stmt_rol->fetch(PDO::FETCH_ASSOC);
                $IDUSUARIO = $rol_row['IDUSUARIO'] ?? '';

                // Alerta de inicio de sesión exitoso
                echo "<script>alert('Inicio de sesión exitoso');</script>";

                $query = $dbh->prepare("SELECT ROL_IDROL FROM DATOS_USUARIO WHERE IDUSUARIO = ?");
                $query->execute([$IDUSUARIO]);
                $rol = $query->fetch(PDO::FETCH_ASSOC);
                $rolUsuario= $rol['ROL_IDROL'] ?? '';
                echo "Rol del usuario: " . $rolUsuario;

                // Redirigir a otra página donde se establecerá el ID del usuario
                header("Location: establecer_id_usuario.php?idUsuario=$IDUSUARIO&rolUsuario=$rolUsuario");

                exit; // Detener la ejecución del script después del redireccionamiento

            } else {
                echo "La contraseña no coincide. Acceso denegado.";
            }
        } else {
            // Correo o contraseña incorrectos
            echo "<script>alert('Correo o contraseña incorrectos'); window.location.href='inicio_sesion.html';</script>";
            exit; // Detener la ejecución del script después del redireccionamiento
        }
    } catch (PDOException $e) {
        // Mostrar un mensaje de error si hay un error de consulta
        echo "Error: " . $e->getMessage();
    }
}
