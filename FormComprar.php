<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compra</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
    <style>
        :root {
            --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
                "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
                "Source Han Sans CN", sans-serif;
            background: #fff5f4;

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
            margin-right: -10px;

            width: 705px;
            height: 629px;
            margin: 0 auto;
            background: #fff5f4;

        }

        .wrapper {
            position: relative;
            width: 705px;
            height: 62px;
            margin: 0 0 0 0;
            z-index: 10;
        }

        .wrapper1 {
            width: 100%;
            height: 62px;
        }

        .section1 {
            width: 100%;
            height: 52px;

            background: #721918;
        }

        .section {
            position: absolute;
            width: 705px;
            height: 52px;
            top: 0;
            left: 0;
            background: #721918;
            z-index: 9;
        }

        .text {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 62px;
            top: 20px;
            left: 69px;
            color: #f5e5e3;
            font-family: Readex Pro, var(--default-font-family);
            font-size: 40px;
            font-weight: 500;
            line-height: 50px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: -6.4px;
            z-index: 10;
        }

        .pic {
            position: relative;
            width: 510px;
            height: 416px;
            margin: 24px 0 0 89px;
            font-size: 0px;
            background: url(./assets/images/18140595-6d85-40a3-9378-29e1017cfe5f.png) no-repeat center;
            background-size: cover;
            z-index: 2;
            overflow: visible auto;
        }

        .text-2 {
            display: block;
            position: relative;
            height: 30px;
            margin: 14px 0 0 113px;
            color: #721918;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 800;
            line-height: 30px;
            text-align: left;
            white-space: nowrap;
            z-index: 5;
        }

        .section-2 {
            position: relative;
            width: 24px;
            height: 24px;
            margin: 38px 0 0 322px;
            overflow: hidden;
        }

        .pic-2 {
            position: relative;
            width: 15px;
            height: 8px;
            margin: 8px 0 0 3px;
            background: url(./assets/images/98567db4-c784-4d6d-9371-6be38f67259f.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 1;
        }

        .text-3 {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            position: relative;
            width: 467px;
            height: 50px;
            margin: 19px 0 0 22px;
            color: #721918;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 400;
            line-height: 25.2px;
            text-align: center;
            z-index: 8;
        }

        .wrapper-2 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 155px;
            margin: 54px 0 0 177px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 3;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-4 {
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
            z-index: 4;
        }

        .group {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 92px;
            margin: 30px 0 0 78px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 6;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-5 {
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
            z-index: 7;
        }

        .group button.text-5 {
            background-color: #8d2d2c;
            border: none;
        }
    </style>
</head>

<body>
    <div class="wrapper1">
        <div class="section1"></div><span class="text">ITSHOP</span>
    </div>
    <div class="main-container">

        <div class="pic">
            <span class="text-2">Contacto con el vendedor</span>
            <div class="section-2">
                <div class="pic-2"></div>
            </div>
            <span class="text-3">Sera redirigido a un chat con el vendedor via Whatsapp, presione el
                link para seguir</span>
            <?php
            include 'conexion.php';

            if (isset($_GET['idUsuario'])) {
                // Obtener el valor de 'idUsuario'
                $idUsuario = $_GET['idUsuario'];
                $idvendedor = $_GET['idVendedor'];
                // Ahora puedes utilizar la variable $idUsuario como quieras en esta página 
                $query = "SELECT TELEFONO,IDUSUARIO FROM DATOS_USUARIO WHERE IDUSUARIO = " . $idvendedor . "";
                $stmt = $dbh->query($query);
                $telefono = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // Si no se pasó el parámetro 'idUsuario' en la URL
                echo "No se ha especificado un ID de usuario.";
            }
            ?>

            <div class="wrapper-2"><a class="text-4" href='https://wa.me/52<?php echo $telefono['TELEFONO'] ?>' target='_blank'>Entrar al chat</a></div>
        </div>
        <div class="group">
            <button class="text-5" style="background-color: #8d2d2c;" onclick="window.location.href = '<?php echo isset($idUsuario) ? 'index.php?idUsuario=' . $idUsuario : 'index.php'; ?>'">Home</button>
        </div>


        <!-- Generated by Codia AI - https://codia.ai/ -->
</body>

</html>