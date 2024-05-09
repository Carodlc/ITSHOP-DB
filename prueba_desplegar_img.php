<?php
require_once 'conexion.php';

// Función para obtener la imagen de la base de datos



// ID del producto del que quieres mostrar la imagen (debes cambiarlo según tus necesidades)
$productId = 12;

$stmt = $dbh->prepare("SELECT RUTA_USUARIO FROM USUARIOS_IMG WHERE ID = ?");
$stmt->execute([$productId]);
$rol_row = $stmt->fetch(PDO::FETCH_ASSOC);
$ruta_imagen= $rol_row['RUTA_USUARIO'] ?? '';

// Obtener el tipo de contenido de la imagen
$info = getimagesize($ruta_imagen);
$tipo_contenido = $info['mime'];

// Obtener el contenido de la imagen como base64
$imagen_codificada = base64_encode(file_get_contents($ruta_imagen));
$imagen_src = 'data:' . $tipo_contenido . ';base64,' . $imagen_codificada;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Imagen Local</title>
    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <img src="<?php echo $imagen_src; ?>" alt="Imagen">
</body>
</html>

