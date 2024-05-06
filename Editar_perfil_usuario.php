<?php
include 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica si se ha recibido el nombre de usuario y la fecha de nacimiento
        if (isset($_POST["nombre_usuario"]) && isset($_POST["fecha_nacimiento"])) {
            // Recupera los valores de los campos del formulario
            $nombreUsuario = $_POST["nombre_usuario"];
            $fechaNacimiento = $_POST["fecha_nacimiento"];
            
           
            
            // Prepara la consulta para actualizar los datos del usuario
            $query = "UPDATE DATOS_USUARIO SET NOMBREUSUARIO = :nombreUsuario, FECHANACIMIENTO = :fechaNacimiento,  WHERE IDUSUARIO = :idUsuario";

            // Prepara la consulta
            $stmt = $dbh->prepare($query);

            // Enlaza los parámetros
            $stmt->bindParam(':nombreUsuario', $nombreUsuario);
            $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
            $stmt->bindParam(':especialidad', $especialidad);
            // Es importante tener el ID del usuario para actualizar el registro correcto
            // Reemplaza '1' con la variable que contiene el ID del usuario
            $idUsuario = 1; // Por ejemplo, asumiendo que el ID del usuario es 1
            $stmt->bindParam(':idUsuario', $idUsuario);
            // Ejecuta la consulta
            $stmt->execute();

            // Muestra un mensaje de éxito
            echo "Datos actualizados correctamente.";
        } else {
            // Si falta algún dato, muestra un mensaje de error
            echo "Faltan datos necesarios para actualizar el perfil.";
        }

    }
?>