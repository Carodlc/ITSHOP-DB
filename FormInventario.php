<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;400;500;600;800&display=swap" />
    <link rel="stylesheet" href="GestionProductos.css" />
    <style>
        :root {
            --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
                "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
                "Source Han Sans CN", sans-serif;
            background: #f5e5e3;

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
            width: 1440px;
            height: auto;
            top: -10px;
            left: -10px;
            margin: 0 auto;
            background: #f5e5e3;

        }

        .flex-row-be {
            position: relative;
            width: 1440px;
            height: 76px;
            margin: -1px 0 0 0;
            z-index: 8;
        }

        .rectangle {
            position: absolute;
            width: 1440px;
            height: 60px;
            top: 0;
            left: 0;
            background: #721918;
            z-index: 1;
        }

        .cart-icon {
            position: absolute;
            width: 32.022px;
            height: 32px;
            top: 13px;
            left: 1086px;
            z-index: 2;
            overflow: hidden;
        }

        .icon {
            position: relative;
            width: 25.685px;
            height: 25px;
            margin: 4.333px 0 0 3.002px;
            background: url(./assets/images/a412b338-fc89-4bfc-b2bc-3b7f57d49bdd.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 3;
        }

        .notification-icon {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 13px;
            left: 1155px;
            z-index: 9;
            overflow: hidden;
        }

        .icon-1 {
            position: relative;
            width: 20.617px;
            height: 25px;
            margin: 2.5px 0 0 4.85px;
            background: url(./assets/images/ef8ab4a9-9901-480b-801a-5407a9abc649.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 10;
        }

        .user-icon {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 14px;
            left: 1223px;
            z-index: 4;
            overflow: hidden;
        }

        .icon-2 {
            position: relative;
            width: 20px;
            height: 25px;
            margin: 2.5px 0 0 5px;
            background: url(./assets/images/afb008ff-93af-4bcf-ad3a-debafda12919.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 5;
        }

        .home-icon {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 14px;
            left: 1018px;
            z-index: 6;
            overflow: hidden;
        }

        .icon-3 {
            position: relative;
            width: 24.592px;
            height: 23.597px;
            margin: 3.903px 0 0 2.704px;
            background: url(./assets/images/d3c55084-1cc9-41b4-9950-28fa057f06f3.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 7;
        }

        .itshop {
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            position: absolute;
            height: 64px;
            bottom: 7px;
            left: 188px;
            color: #f5e5e3;
            font-family: Readex Pro, var(--default-font-family);
            font-size: 64px;
            font-weight: 500;
            line-height: 64px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: -10.24px;
            z-index: 8;
        }

        .inicio-mi-cuenta {
            position: relative;
            width: 155px;
            height: 18px;
            margin: 8px 0 0 191px;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 200;
            line-height: 18px;
            text-align: left;
            text-overflow: initial;
            white-space: nowrap;
            z-index: 50;
        }

        .inicio {
            position: relative;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 200;
            line-height: 25.2px;
            text-align: left;
        }

        .mi-cuenta {
            position: relative;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 400;
            line-height: 25.2px;
            text-align: left;
        }

        .flex-row-d {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            position: relative;
            /* Eliminar la altura fija y dejar que se ajuste automáticamente */
            /* height: 629px; */
            margin: 29px 0 0 188px;
            z-index: 22;
        }

        .rectangle-4 {
            flex-shrink: 0;
            position: relative;
            width: 270px;
            height: 629px;
            font-size: 0px;
            background: #fff5f4;
            z-index: 12;
            border-radius: 30px;
        }

        .mi-cuenta-5 {
            display: block;
            position: relative;
            height: 30px;
            margin: 15px 0 0 25px;
            color: #8d2d2c;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 30px;
            text-align: left;
            text-transform: capitalize;
            white-space: nowrap;
            letter-spacing: 0.72px;
            z-index: 13;
        }

        .general {
            display: block;
            position: relative;
            height: 29px;
            margin: 30px 0 0 25px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            z-index: 14;
        }

        .rectangle-6 {
            position: relative;
            width: 270px;
            height: 69px;

            margin: 31px 0 0 0;
            background: #f5e5e3;
            z-index: 15;
        }

        .rectangle-7 {
            position: absolute;
            width: 7px;
            height: 69px;
            top: 0;
            left: 0;
            background: #721918;
            z-index: 16;
        }

        .productos {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 29px;
            top: 21px;
            left: 25px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            z-index: 17;
        }

        .inventario {
            display: block;
            position: relative;
            height: 29px;
            margin: 33px 0 0 25px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            z-index: 18;
        }

        .ventas {
            display: block;
            position: relative;
            height: 29px;
            margin: 52px 0 0 25px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            z-index: 19;
        }

        .ajustes {
            display: block;
            position: relative;
            height: 29px;
            margin: 52px 0 0 25px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            z-index: 20;
        }

        .rectangle-8 {
            flex-shrink: 0;
            position: relative;
            width: 705px;
            height: auto;
            /* Ajustar automáticamente la altura según el contenido */
            background: #fff5f4;
            z-index: 22;
            left: -170px;
            padding-bottom: 20px;
            border-radius: 30px;
        }

        /* Ajustar estilos para los elementos dentro de .rectangle-8 */
        /* Asegúrate de ajustar los estilos según sea necesario para tu diseño */
        .rectangle-8 .div-rectangle {
            margin-bottom: 20px;
            /* Espacio entre elementos */
        }

        .flex-row-df {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            width: 639px;
            height: 33px;
            margin: 15px 0 0 27px;
            z-index: 46;
        }

        .productos-9 {
            flex-shrink: 0;
            position: relative;
            height: 30px;
            color: #8d2d2c;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 30px;
            text-align: left;
            text-transform: capitalize;
            white-space: nowrap;
            letter-spacing: 0.72px;
            z-index: 23;
        }

        .frame {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            flex-shrink: 0;
            gap: 10px;
            position: relative;
            width: 186px;
            padding: 6px 25px 6px 25px;
            cursor: pointer;
            background: #8d2d2c;
            border: none;
            z-index: 46;
            overflow: hidden;
            border-radius: 30px;
        }

        .frame-surtir {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            flex-shrink: 0;
            left: 560px;
            gap: 10px;
            position: relative;
            width: 100px;
            padding: 6px 25px 6px 25px;
            cursor: pointer;
            background: #8d2d2c;
            border: none;
            z-index: 46;
            overflow: hidden;
            border-radius: 30px;
        }

        .agregar-producto {
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
            z-index: 47;
        }

        .rectangle-a {
            position: relative;
            width: 628px;
            height: 259px;
            margin: 18px 0 0 38px;
            background: #f5e5e3;
            z-index: 25;
            border-radius: 30px;
        }

        .rectangle-b {
            position: absolute;
            width: 216px;
            height: 216px;
            top: 20px;
            left: 26px;
            background: url(./assets/images/4b44c303e71fac2754d15ac57555ba035a9337d5.png) no-repeat center;
            background-size: cover;
            z-index: 26;
            border-radius: 10px;
        }

        .frame-c {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 98px;
            height: 33px;
            top: 20px;
            left: 505px;
            padding: 6px 25px 6px 25px;
            cursor: pointer;
            background: #8d2d2c;
            border: none;
            z-index: 31;
            overflow: hidden;
            border-radius: 30px;
        }

        .editar {
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
            z-index: 32;
        }

        .brownies {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 20px;
            left: 261px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 27;
        }

        .mx-25 {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 26px;
            top: 41px;
            left: 261px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 21px;
            font-weight: 800;
            line-height: 26px;
            text-align: left;
            white-space: nowrap;
            z-index: 30;
        }

        .frame-button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 101px;
            height: 33px;
            top: 62px;
            left: 504px;
            padding: 6px 25px 6px 25px;
            cursor: pointer;
            background: #8d2d2c;
            border: none;
            z-index: 33;
            overflow: hidden;
            border-radius: 30px;
        }

        .span-borrar {
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
            z-index: 34;
        }

        .span-stock {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 84px;
            left: 261px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 29;
        }

        .div-descripcion {
            position: absolute;
            width: 94px;
            height: 21px;
            top: 175px;
            left: 261px;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            text-overflow: initial;
            white-space: nowrap;
            z-index: 28;
        }

        .span-descripcion {
            position: relative;
            color: #721918;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21.42px;
            text-align: left;
        }

        .span-colon {
            position: relative;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21.42px;
            text-align: left;
        }

        .span-ricos-brownies {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 215px;
            left: 268px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 49;
        }

        .div-rectangle {
            position: relative;
            width: 628px;
            height: 175px;
            margin: 33px 0 0 38px;
            background: #f5e5e3;
            z-index: 36;
            border-radius: 30px;
        }

        .div-rectangle-d {
            position: absolute;
            width: 216px;
            height: 216px;
            top: 20px;
            left: 60px;
            background: url(./assets/images/36da9dee2c9de6a52e306fad7aab00da46e0da3b.png) no-repeat center;
            background-size: cover;
            z-index: 37;
            border-radius: 10px;
        }

        .frame-button-e {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 98px;
            height: 33px;
            top: 20px;
            left: 505px;
            padding: 6px 25px 6px 25px;
            cursor: pointer;
            background: #8d2d2c;
            border: none;
            z-index: 41;
            overflow: hidden;
            border-radius: 30px;
        }

        .span-editar {
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
            z-index: 42;
        }

        .span-botellas-agua {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 20px;
            left: 261px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            text-transform: capitalize;
            font-weight: 800;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 38;
        }

        .mx-15 {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 26px;
            top: 41px;
            left: 261px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 21px;
            font-weight: 800;
            line-height: 26px;
            text-align: left;
            white-space: nowrap;
            z-index: 40;
        }

        .frame-f {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 101px;
            height: 33px;
            top: 62px;
            left: 504px;
            padding: 6px 25px 6px 25px;
            cursor: pointer;
            background: #8d2d2c;
            border: none;
            z-index: 43;
            overflow: hidden;
            border-radius: 30px;
        }

        .borrar {
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
            z-index: 44;
        }

        .stock {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 50px;
            left: 261px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 45;
        }

        .descripcion {
            position: absolute;
            width: 94px;
            height: 21px;
            top: 100px;
            left: 261px;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            text-overflow: initial;
            white-space: nowrap;
            z-index: 39;
        }

        .descripcion-10 {
            position: relative;
            color: #721918;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21.42px;
            text-align: left;
        }

        .colon {
            position: relative;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21.42px;
            text-align: left;
        }

        .botella-agua {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 210px;
            left: 282px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 48;
        }

        /* Estilo para el efecto hover en los elementos */
        .rectangle-6:hover,
        .general:hover,
        .productos:hover,
        .inventario:hover,
        .ventas:hover,
        .ajustes:hover {
            color: rgb(175, 107, 107);
            /* Cambia el color de fondo cuando se hace hover */
            cursor: pointer;
        }

        .profile-pic {
            width: 135px;
            height: 135px;
            border-radius: 50%;
            object-fit: cover;
        }

        input.quantity {
            width: 50px;
            text-align: center;
            border: 1px solid #cccccc;
            border-radius: 3px;
            margin: 0 5px;
            font-size: 14px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="flex-row-be">
            <div class="rectangle">
                <div class="cart-icon">
                    <div class="icon"></div>
                </div>
                <div class="notification-icon">
                    <div class="icon-1"></div>
                </div>
                <div class="user-icon">
                    <div class="icon-2"></div>
                </div>
                <div class="home-icon">
                    <div class="icon-3"></div>
                </div>
            </div>
            <span onclick="window.location.href = 'index.php?idUsuario=<?php echo $idUsuario = $_GET['idUsuario']; ?>'" class="itshop">ITSHOP</span>
        </div>
        <div class="inicio-mi-cuenta">
            <span class="inicio">Inicio > </span><span class="inicio">Mi Cuenta ></span><span class="mi-cuenta">Inventario</span>
        </div>
        <div class="flex-row-d">
            <div class="rectangle-4">
                <span class="mi-cuenta-5">mi cuenta</span><span onclick="window.location.href = 'Vendedor_perfil.php?idUsuario=<?php echo $idUsuario; ?>'" class="general">General</span>
                <span onclick="window.location.href = 'GestionProductos.php?idUsuario=<?php echo $idUsuario; ?>'" class="ventas">Productos</span>

                <div class="rectangle-6">
                    <div class="rectangle-7"></div>
                    <span class="productos">Inventario</span>
                </div>
                <span onclick="window.location.href = 'FormVentas.php?idUsuario=<?php echo $idUsuario; ?>'" class="ventas">Ventas</span><span onclick="window.location.href = 'Ajustes_vendedor.php?idUsuario=<?php echo $idUsuario; ?>'" class="ajustes">Ajustes</span>
            </div>
            <div class="rectangle-8">
                <div class="flex-row-df">
                    <span class="productos-9">Inventario</span><button class="frame" onclick="window.location.href='imprimir_stock.php?idUsuario=<?php echo $idUsuario; ?>'">
                        <span class="agregar-producto">Reporte de inventario</span>
                    </button>
                </div>
                <div style="color: #8D2D2C; font-size: 17px; font-family: Outfit; font-weight: 400; word-wrap: break-word; margin-bottom: 10px; margin-left:30px">Crear reporte de movimientos:</div>
                <form method="GET" action="crear_reporteInventario.php">
                    <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
                        <div style="color: #8D2D2C; font-size: 17px; font-family: Outfit; font-weight: 400; margin-right: 10px;">Desde:</div>
                        <input type="date" id="fechaDesde" name="fechaDesde">
                        <div style="margin-left: 20px; margin-right: 20px;">&nbsp;</div> <!-- Espacio entre DESDE y HASTA -->
                        <div style="color: #8D2D2C; font-size: 17px; font-family: Outfit; font-weight: 400; margin-left: 10px; margin-right: 10px;">Hasta:</div>
                        <input type="date" id="fechaHasta" name="fechaHasta">
                    </div>
                    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <button id="generateReport" style="background: #8D2D2C; color: white; font-size: 17px; font-family: Outfit; font-weight: 500; border-radius: 30px; padding: 6px 25px; border:none;">Generar</button>
                    </div>
                </form>

                <form id="surtidoForm" action="Surtido.php" method="post" enctype="multipart/form-data">

                    <button type="submit" class="frame-surtir">
                        <span class="agregar-producto">Surtir</span>
                    </button>
                    <?php
                    include 'conexion.php';
                    if (isset($_GET['idUsuario'])) {
                        // Obtener el valor de 'idUsuario'
                        $idUsuario = $_GET['idUsuario'];

                        // Ahora puedes utilizar la variable $idUsuario como quieras en esta página
                    } else {
                        // Si no se pasó el parámetro 'idUsuario' en la URL
                        echo "No se ha especificado un ID de usuario.";
                    }

                    $DATA = $dbh->query("SELECT SYSDATE FROM DUAL");

                    // Obtener la fecha actual
                    $fecha_actual = $DATA->fetchColumn();


                    try {
                        // Establecer conexión a la base de datos
                        $query = "SELECT * FROM DATOS_PRODUCTO WHERE DATOS_USUARIO_IDUSUARIO = " . $idUsuario . " ORDER BY IDPRODUCTO DESC";

                        $stmt = $dbh->query($query);
                        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Si hay productos, generar instancias de producto
                        if (!empty($productos)) {
                            foreach ($productos as $producto) {

                                $idProducto = $producto['IDPRODUCTO'];
                                $stmt = $dbh->prepare("SELECT RUTA_PRODUCTO FROM PRODUCTS_IMG WHERE ID = ?");
                                $stmt->execute([$idProducto]);
                                $rol_row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $ruta_imagen = $rol_row['RUTA_PRODUCTO'] ?? '';

                                // Obtener el tipo de contenido de la imagen
                                $info = getimagesize($ruta_imagen);
                                $tipo_contenido = $info['mime'];

                                // Obtener el contenido de la imagen como base64
                                $imagen_codificada = base64_encode(file_get_contents($ruta_imagen));
                                $imagen_src = 'data:' . $tipo_contenido . ';base64,' . $imagen_codificada;

                                echo "<div class='div-rectangle'>";
                                echo "<div class='div-rectangle-d'><img src=" . $imagen_src . " alt='Imagen' class='profile-pic'></div>";
                                
                                echo "<input type='hidden' value='" . $fecha_actual . "' name='fecha' required  '>";

                                echo "<span class='span-botellas-agua'>" . $producto['NOMBRE'] . "</span>";


                                echo "<span class='stock'>Stock:  " . $producto['STOCK'] . "</span>";
                                echo "<div class='descripcion'>";
                                echo '<div class="product-quantity">';
                                echo '  <span class="title">Cantidad de producto:</span>';
                                echo '  <div class="input-container">';
                                echo '    <input type="number" name="cantidad' . $idProducto . '" class="quantity" min="0" value="0" required>';
                                echo '    <div class="arrow-square-down"><div class="icon-8"></div></div>';
                                echo '  </div>';
                                echo '</div>';
                                echo '<input type="hidden" name="idUsuario" value="' . $idUsuario . '" required>';
                                echo '<input type="hidden" name="idProducto" value="' . $idProducto . '" required>';

                                echo "</div>";

                                echo "</div>";
                            }
                        } else {
                            echo "<div class='div-rectangle'>";
                            echo "<span class='mi-cuenta'>No tienes productos agregados.</span>";
                        }
                    } catch (PDOException $e) {
                        // Mostrar mensaje de error si la conexión falla
                        echo "Error: " . $e->getMessage();
                    }

                    ?>

                </form>


            </div>

        </div>
    </div>
    <!-- Generated by Codia AI - https://codia.ai/ -->
</body>
<script>
    document.getElementById('surtidoForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

        // Crear un objeto FormData con los datos del formulario
        var formData = new FormData(this);

        // Usar fetch para enviar los datos del formulario de forma asíncrona
        fetch('Surtido.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Asumimos que la respuesta es texto
        .then(data => {
            // Aquí puedes actualizar el contenido de la página según sea necesario
            // Por ejemplo, podrías recargar parte de la página o actualizar un mensaje de estado
            location.reload(); // Recargar la página
        })
        .catch(error => console.error('Error:', error));
    });

    document.getElementById('generateReport').addEventListener('click', function() {
        // Obtén los valores de los inputs de fecha
        const fechaDesde = document.getElementById('fechaDesde').value;
        const fechaHasta = document.getElementById('fechaHasta').value;
        const idUsuario = '<?php echo $_GET['idUsuario']; ?>';

        // Verifica que las fechas estén presentes
        if (fechaDesde && fechaHasta) {
            // Construye la URL con los parámetros
            const url = `crear_reporteInventario.php?idUsuario=${idUsuario}&fechaDesde=${fechaDesde}&fechaHasta=${fechaHasta}`;

            // Redirige a la URL para generar y descargar el PDF
            window.location.href = url;
        } else {
            alert('Por favor, selecciona ambas fechas.');
        }
    });
</script>

</html>