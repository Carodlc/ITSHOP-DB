<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establecer ID de Usuario</title>
    <script src="Globales.js"></script>
</head>
<body>
    <script>
        // Recupera el ID del usuario de la URL
        var idUsuario = "<?php echo $_GET['idUsuario']; ?>";
        var rolUsuario = "<?php echo $_GET['rolUsuario']; ?>";


        // Establece el ID del usuario en sessionStorage
        establecerIdUsuario(idUsuario);
        establecerRolUsuario(rolUsuario);
        console.log("rol del usuario:", rolUsuario);
        alert('Inicio de sesión exitoso');
        // Redirecciona a otra página después de establecer el ID del usuario si es necesario
        window.location.href = "index.php?idUsuario="+idUsuario+"&rolUsuario="+rolUsuario+"";
    </script>
</body>
</html>
<?php

?>
