<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = 0;
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];
    $publicado = isset($_POST["publicado"]) ? "1" : "0"; // Verificar si está publicado

    // Preparar la consulta SQL para la inserción
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
