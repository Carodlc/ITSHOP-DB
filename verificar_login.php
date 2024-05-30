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
        $stmt = $dbh->prepare("SELECT contrasena, idusuario, rol_idrol FROM datos_usuario WHERE correo = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($user) {
            // Verificar la contraseña
            if (password_verify($password, $user['contrasena'])) {
                $idusuario = $user['idusuario'];
                $rolUsuario = $user['rol_idrol'];

                // Alerta de inicio de sesión exitoso
                echo "<script>alert('Inicio de sesión exitoso');</script>";

                // Redirigir a otra página donde se establecerá el ID del usuario
                header("Location: establecer_id_usuario.php?idUsuario=$idusuario&rolUsuario=$rolUsuario");
                exit; // Detener la ejecución del script después del redireccionamiento
            } else {
                echo "<script>alert('La contraseña no coincide'); window.location.href='inicio_sesion.html';</script>";
                exit; // Salir del script PHP para evitar que se imprima más contenido HTML
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
?>
