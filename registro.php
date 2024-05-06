<?php
// Incluir el archivo de conexión
require_once 'conexion.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $NOMBRE_USUARIO = $_POST['nombre'];
    $ESPECIALIDADES_IDESPECIALIDAD = $_POST['apellido'];
    $IDUSUARIO = $_POST['email'];
    $CONTRASENA= $_POST['password'];
    $ROL_IDROL= $_POST['idRol'];


    try {
        // Insertar datos en la tabla de usuarios
        $rowCount = insertData($dbh, 'DATOS_USUARIO', ['NOMBRE_USUARIO', 'ESPECIALIDADES_IDESPECIALIDAD', 'IDUSUARIO', 'CONTRASENA','ROL_IDROL'], [$NOMBRE_USUARIO, $ESPECIALIDADES_IDESPECIALIDAD, $IDUSUARIO, $CONTRASENA,$ROL_IDROL]);

        // Verificar si la inserción fue exitosa
        if ($rowCount > 0) {
            echo "Usuario registrado exitosamente!";
        } else {
            echo "Hubo un problema al registrar el usuario.";
        }
    } catch (PDOException $e) {
        // Mostrar mensaje de error si ocurre una excepción
        echo "Error al registrar el usuario: " . $e->getMessage();
    }
}
?>
