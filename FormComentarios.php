<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agregar comentario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;800&display=swap" />

    <style>
        :root {
            --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
                "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
                "Source Han Sans CN", sans-serif;
            background: #fff5f4;

        }

        .main-container {
            overflow: hidden;
        }

        .main-container,
        .main-container * {
            box-sizing: border-box;
        }

        input,
        select,
        textarea,
        button {
            outline: 0;
        }

        .main-container {
            position: relative;
            width: 705px;
            height: 629px;
            margin: 0 auto;
            font-size: 0px;
            background: #fff5f4;
            overflow: hidden;
            border-radius: 30px;
        }

        .text {
            display: block;
            position: relative;
            height: 30px;
            margin: 17px 0 0 29px;
            color: #8d2d2c;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 30px;
            text-align: left;
            text-transform: capitalize;
            white-space: nowrap;
            letter-spacing: 0.72px;
        }

        .text-2 {
            display: block;
            position: relative;
            height: 16px;
            margin: 1px 0 0 65px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 16px;
            text-align: left;
            white-space: nowrap;
            z-index: 6;
        }

        .text-3 {
            display: block;
            position: relative;
            height: 16px;
            margin: 13px 0 0 65px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 16px;
            text-align: left;
            white-space: nowrap;
            z-index: 10;
        }

        .text-4 {
            display: block;
            position: relative;
            height: 20px;
            margin: 13px 0 0 65px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 20px;
            text-align: left;
            white-space: nowrap;
            z-index: 8;
        }

        .img {
            position: relative;
            width: 570px;
            height: 250px;
            margin: 6px 0 0 65px;
            font-size: 0px;
            background: url(./assets/images/b9556a66-9c9a-4d99-b811-e54352112f07.png) no-repeat center;
            background-size: cover;
            z-index: 7;
            overflow: visible auto;
        }

        .text-5 {
            display: block;
            position: relative;
            height: 20px;
            margin: 10px 0 0 24px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 20px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .group {
            position: relative;
            width: 24px;
            height: 24px;
            margin: 6px 0 0 346px;
            z-index: 2;
            overflow: hidden;
        }

        .img-2 {
            position: relative;
            width: 15px;
            height: 8px;
            margin: 8px 0 0 3px;
            background: url(./assets/images/3a885481-4efe-4b0d-9e19-7e6bee9f7f0f.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 3;
        }

        .wrapper {
            position: relative;
            width: 349.648px;
            height: 76.169px;
            margin: 10px 0 0 73px;
            z-index: 16;
        }

        .text-6 {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            width: 240px;
            height: 45px;
            top: 0;
            left: 0;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 800;
            line-height: 25.2px;
            text-align: left;
            z-index: 9;
        }

        .pic {
            position: absolute;
            width: 57.648px;
            height: 43.169px;
            top: 32px;
            left: 2px;
            background: url(./assets/images/afd31463-ac85-495c-81a5-59d315f555fb.png) no-repeat center;
            background-size: cover;
            z-index: 12;
        }

        .img-3 {
            position: absolute;
            width: 57.648px;
            height: 43.169px;
            top: 32px;
            left: 148.723px;
            background: url(./assets/images/c83861b1-06b3-40b6-a673-06a0fa82f8e2.png) no-repeat center;
            background-size: cover;
            z-index: 13;
        }

        .pic-2 {
            position: absolute;
            width: 56.182px;
            height: 43.055px;
            top: 32.079px;
            left: 222.818px;
            background: url(./assets/images/b2761a66-e35e-46eb-a7a9-d262f7c0b7e1.png) no-repeat center;
            background-size: cover;
            z-index: 14;
        }

        .pic-3 {
            position: absolute;
            width: 57.648px;
            height: 43.169px;
            top: 32.993px;
            left: 76.686px;
            background: url(./assets/images/7270b200-eb4a-4887-a4a8-17decd5c43c7.png) no-repeat center;
            background-size: cover;
            z-index: 15;
        }

        .img-4 {
            position: absolute;
            width: 57.648px;
            height: 43.169px;
            top: 33px;
            left: 292px;
            background: url(./assets/images/765ae753-63a9-4c8e-ab55-e2d2b276e79a.png) no-repeat center;
            background-size: cover;
            z-index: 16;
        }

        .wrapper-2 {
            position: relative;
            width: 570px;
            height: 39px;
            margin: 72.831px 0 0 65px;
            z-index: 17;
        }

        .section {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 120px;
            height: 33px;
            top: 0;
            left: 0;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 17;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-7 {
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 18;
        }

        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 116px;
            height: 33px;
            top: 6px;
            left: 454px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 4;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-8 {
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 5;
        }

        #regresarButton {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: 116px;
            /* Ancho del botón */
            height: 33px;
            /* Altura del botón */
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: center;
            white-space: nowrap;
            z-index: 50;
            background-color: #8d2d2c;
            /* Color de fondo */
            border: none;
            border-radius: 5px;
            /* Borde redondeado */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #regresarButton:hover {
            background-color: #8d2d2c;
            /* Color de fondo al pasar el ratón */
        }

        #guardarButton {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: 116px;
            /* Ancho del botón */
            height: 33px;
            /* Altura del botón */
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: center;
            white-space: nowrap;
            z-index: 50;
            background-color: #8d2d2c;
            /* Color de fondo */
            border: none;
            border-radius: 5px;
            /* Borde redondeado */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #guardarButton:hover {
            background-color: #8d2d2c;
            /* Color de fondo al pasar el ratón */
        }

        .rectangle-2 {
            width: 650px;
            /* Ancho del rectángulo */
            height: 270px;
            /* Altura del rectángulo aumentada */
            margin: 100px auto 10px 35px;
            /* Margen izquierdo reducido a 35px */
            background-color: #fff5f4;
            /* Color de fondo */
            padding: 8px;
            /* Relleno */
            border-radius: 8px;
            /* Redondeo de las esquinas */
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            /* Sombra */
        }

        .espe {
            display: block;
            margin: -10 0 10px auto;
            /* Margen izquierdo ajustado */
            font-family: Outfit, var(--default-font-family);
            color: #321811;
        }

        .espe-input {
            width: calc(100% - 5px);
            /* Ancho del campo de entrada */
            height: 85%;
            /* Altura del campo de entrada ajustada */
            margin-top: 20px;
            /* Margen superior del campo de entrada */
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .star {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }

        .star:hover,
        .star.active {
            color: gold;
        }

        .valorar {
            display: block;
            position: relative;
            height: 20px;
            top: 35px;
            margin: 10px 0 0 24px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 20px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .valorar img {
            width: 30px;
            /* Ajusta el tamaño según tus necesidades */
            cursor: pointer;
            /* Cambia el cursor al pasar sobre las estrellas */
        }
    </style>


</head>
<?php
include 'conexion.php';

if (isset($_GET['idProducto']) && isset($_GET['idUsuario'])) {
    $idProducto = $_GET['idProducto'];
    $idUsuario = $_GET['idUsuario'];

    $stmt = $dbh->prepare("SELECT * FROM DATOS_USUARIO WHERE IDUSUARIO = ?");
    $stmt->execute([$idUsuario]);
    $datosUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $dbh->prepare("SELECT * FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?");
    $stmt->execute([$idProducto]);
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $DATA = $dbh->query("SELECT SYSDATE FROM DUAL");

    // Obtener la fecha actual
    $fecha_actual = $DATA->fetchColumn();
} else {
    echo 'No se han especificado los parámetros necesarios.';
}
?>

<body>
    <div class="main-container">
        <span class="text">Comentario</span>
        <span class="text-2">Producto: <?php echo $datos[0]['NOMBRE'] ?></span>
        <span class="text-3">Fecha: <?php echo $fecha_actual ?></span>
        <span class="text-4">Usuario: <?php echo $datosUsuario[0]['NOMBRE_USUARIO'] ?></span>
        
        <div class="rectangle-2" style="margin-top: 10px;">
            <input type="text" id="comentario" name="comentario" class="espe-input" placeholder="Escribe tu comentario aqui... " />
        </div>
        
        <div class="wrapper">
            <span class="text-6">Valoracion:</span>
            <div id="rating" class="valorar">
                <img src="assets/Star_gray.png" alt="1 Star" onclick="rateProduct(1)">
                <img src="assets/Star_gray.png" alt="2 Stars" onclick="rateProduct(2)">
                <img src="assets/Star_gray.png" alt="3 Stars" onclick="rateProduct(3)">
                <img src="assets/Star_gray.png" alt="4 Stars" onclick="rateProduct(4)">
                <img src="assets/Star_gray.png" alt="5 Stars" onclick="rateProduct(5)">
            </div>
        </div>
        
        <div class="wrapper-2">
            <div class="section">
                <button id="regresarButton" class="text-7">Regresar</button>
            </div>
            <div class="box">
                <button id="guardarButton" class="text-8">Guardar</button>
            </div>
        </div>
    </div>
    
    <script>
        const idProducto = <?php echo $idProducto; ?>;
        const idUsuario = <?php echo $idUsuario; ?>;
        let currentRating = 0;

        document.getElementById("regresarButton").addEventListener("click", function() {
            window.location.href = "Comentarios.html";
        });

        document.getElementById("guardarButton").addEventListener("click", function() {
            const comentario = document.getElementById('comentario').value;

            const data = {
                idProducto: idProducto,
                idUsuario: idUsuario,
                comentario: comentario,
                rating: currentRating
            };

            fetch('guardarComentario.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                window.location.href = "Comentarios.php?idProducto=<?php echo $idProducto ?>&idUsuario=<?php echo $idUsuario ?>"; // Redirige al archivo "Comentarios.html"
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });

        function rateProduct(rating) {
            currentRating = rating;
            highlightStars(rating);
        }

        function highlightStars(rating) {
            const stars = document.querySelectorAll('#rating img');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.src = 'assets/Star1.png'; // Cambia la imagen a dorada
                } else {
                    star.src = 'assets/Star_gray.png'; // Cambia la imagen a gris
                }
            });
        }
    </script>
</body>

</html>
