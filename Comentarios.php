<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comentarios</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;500;600&display=swap" />
    <style>
        :root {
            --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
                "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
                "Source Han Sans CN", sans-serif;
            background: #f5e5e3;

        }

        .main-container {
            position: relative;
            width: calc(100% + 60px);
            /* Modifica el ancho según tus necesidades */
            max-width: 1950px;
            /* Esto asegura que no se extienda más allá de 1440px */
            height: auto;
            /* Cambiado a 'auto' para adaptarse al contenido */
            margin: -10px auto 0 -50px;
            /* Ajustado el margen superior y el margen izquierdo */
            background: #f5e5e3;
        }



        .main-container,
        .main-container * {
            box-sizing: border-box;
        }


        .box {
            position: relative;
            width: 1440px;
            height: 110px;
            margin: -9px 0 0 0;
            z-index: 67;
        }

        .section {
            position: absolute;
            width: 1440px;
            height: 60px;
            top: 0;
            left: 0;
            background: #721918;
            z-index: 60;
        }

        .section-2 {
            position: absolute;
            width: 32.022px;
            height: 32px;
            top: 13px;
            left: 1105px;
            z-index: 61;
            overflow: hidden;
        }

        .img {
            position: relative;
            width: 25.685px;
            height: 25px;
            margin: 4.333px 0 0 3.002px;
            background-size: 100% 100%;
            z-index: 62;
        }

        .box-2 {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 15px;
            left: 1038px;
            z-index: 65;
            overflow: hidden;
        }

        .pic {
            position: relative;
            width: 24.592px;
            height: 23.597px;
            margin: 3.903px 0 0 2.704px;
            background-size: 100% 100%;
            z-index: 66;
        }

        .wrapper {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 15px;
            left: 1174px;
            z-index: 68;
            overflow: hidden;
        }

        .img-2 {
            position: relative;
            width: 20.617px;
            height: 25px;
            margin: 2.5px 0 0 4.85px;
            background-size: 100% 100%;
            z-index: 69;
        }

        .group {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 17px;
            left: 1241px;
            z-index: 63;
            overflow: hidden;
        }

        .img-3 {
            position: relative;
            width: 20px;
            height: 25px;
            margin: 2.5px 0 0 5px;
            background-size: 100% 100%;
            z-index: 64;
        }

        .group-2 {
            position: absolute;
            width: 32.022px;
            height: 32px;
            top: 21px;
            left: 1086px;
            z-index: 2;
            overflow: hidden;
        }

        .img-4 {
            position: relative;
            width: 25.685px;
            height: 25px;
            margin: 4.333px 0 0 3.002px;
            background-size: 100% 100%;
            z-index: 3;
        }

        .box-3 {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 21px;
            left: 1155px;
            z-index: 9;
            overflow: hidden;
        }

        .img-5 {
            position: relative;
            width: 20.617px;
            height: 25px;
            margin: 2.5px 0 0 4.85px;
            background-size: 100% 100%;
            z-index: 10;
        }

        .wrapper-2 {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 22px;
            left: 1223px;
            z-index: 4;
            overflow: hidden;
        }

        .pic-2 {
            position: relative;
            width: 20px;
            height: 25px;
            margin: 2.5px 0 0 5px;
            background-size: 100% 100%;
            z-index: 5;
        }

        .section-3 {
            position: absolute;
            width: 30px;
            height: 30px;
            top: 22px;
            left: 1018px;
            z-index: 6;
            overflow: hidden;
        }

        .pic-3 {
            position: relative;
            width: 24.592px;
            height: 23.597px;
            margin: 3.903px 0 0 2.704px;
            background-size: 100% 100%;
            z-index: 7;
        }

        .group-3 {
            position: absolute;
            width: 1440px;
            height: 60px;
            top: -200px;
            /* Cambié el valor a -20px para moverlo hacia arriba */
            left: 0;
            background: #721918;
            z-index: 1;
        }

        .text {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            width: 358px;
            height: 98px;
            top: 12px;
            left: 30px;
            color: #f5e5e3;
            font-family: Readex Pro, var(--default-font-family);
            font-size: 30px;
            font-weight: 500;
            line-height: 50px;
            text-align: left;
            letter-spacing: -6.4px;
            z-index: 11;
        }

        .text-2 {
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            position: absolute;
            height: 64px;
            bottom: 38px;
            left: 188px;
            color: #f5e5e3;
            font-family: Readex Pro, var(--default-font-family);
            font-size: 55px;
            font-weight: 500;
            line-height: 64px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: -10.24px;
            z-index: 67;
        }

        .section-4 {
            position: absolute;
            width: 155px;
            height: 18px;
            top: 92px;
            left: 191px;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 200;
            line-height: 18px;
            text-align: left;
            text-overflow: initial;
            white-space: nowrap;
            z-index: 38;
        }

        .text-3 {
            position: relative;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 200;
            line-height: 25.2px;
            text-align: left;
        }

        .text-4 {
            position: relative;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 400;
            line-height: 25.2px;
            text-align: left;
        }

        /*ES PARA EL FONDO ROSA*/
        .box-4 {
            position: relative;
            width: 1500px;
            /* Aumentar el ancho */
            height: 1200px;
            margin-top: 29px;
            margin-right: 0;
            margin-left: 50px;
            padding-bottom: 40px;
            /* Mover hacia la derecha */
            z-index: 52;
        }


        /* AQUIIII*/
        .wrapper-3 {
            position: absolute;
            width: 270px;
            height: 629px;
            top: 0;
            left: 0;
            font-size: 0px;
            background: #fff5f4;
            z-index: 13;
            border-radius: 30px;
        }

        .text-5 {
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
            z-index: 14;
        }

        /*AQUI EL CONTORNO DE EL BOTON */
        .section-5 {
            position: relative;
            width: 270px;
            height: 69px;
            margin: 150px 0 0 0;
            /* Ajusta este valor para bajar la sección */
            background: #f5e5e3;
            z-index: 15;
        }

        .group-4 {
            position: relative;
            width: 728px;
            height: 100px;
            /* Ajusta la altura según sea necesario */
            margin: 50px 0 0 38px;
            /* Ajusta el margen superior según sea necesario */
            background: #f5e5e3;
            z-index: 28;
            border-radius: 30px;
        }





        .text-6 {
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
            background-color: #8d2d2c;
            /* Color de fondo del texto */
        }


        .section-6 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 200px;
            /* Ajuste el ancho del botón */
            height: 33px;
            top: 1160px;
            /* Ajuste para bajar el elemento */
            left: 440px;
            /* Ajuste para mover hacia la izquierda */
            padding: 6px 25px;
            background: #8d2d2c;
            /* Color de fondo del botón */
            z-index: 31;
            overflow: hidden;
            border-radius: 30px;
        }


        .text-7 {

            display: block;
            position: relative;
            height: 21px;
            margin: 20px 0 0 20px;
            /* Incrementé el margen izquierdo a 150px */
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 21px;
            font-weight: bolder;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;

        }

        .text-8 {
            display: block;
            position: relative;
            height: 21px;
            margin: 20px 0 0 20px;
            /* Incrementé el margen izquierdo a 150px */
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 400;
            line-height: 21px;
            left: 26px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .text-stock {
            display: flex;
            position: relative;
            height: 21px;
            margin: 600px 0 0 20px;
            /* Incrementé el margen izquierdo a 150px */
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 400;
            line-height: 21px;
            left: 26px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .nombre {
            position: relative;
            height: 21px;
            margin: 600px 0 0 20px;
            /* Incrementé el margen izquierdo a 150px */
            color: #a82929;
            font-family: Outfit, var(--default-font-family);
            font-size: 28px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            top: 565px;
            left: 26px;

            text-transform: capitalize;
            white-space: nowrap;
            z-index: 1;
        }


        .text-9 {
            display: block;
            position: relative;
            height: 29px;
            margin: 80px 0 0 10px;
            /* Ajuste del margen para bajarlo */
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            z-index: 21;
        }

        .text-a {
            display: flex;
            align-items: flex-end;
            justify-content: flex-start;
            position: absolute;
            height: 64px;
            bottom: 418px;
            left: 0;
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

        .text-b {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 29px;
            top: 156px;
            left: 25px;
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

        /*ES PARA LA CAJITA BLANCA*/


        .text-c {
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
            z-index: 25;
        }

        .text-d {
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 20px;
            font-weight: 500;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 45;
        }

        .group-5 {
            position: relative;
            width: 728px;
            height: -100px;
            /* Ajusta la altura según sea necesario */
            margin: 18px 0 0 38px;
            background: #f5e5e3;
            z-index: 28;
            border-radius: 30px;
        }

        .section-8 {
            position: relative;
            /* Cambiado a relative para que el textarea esté contenido */
            min-width: 810px;
            max-width: 100%;
            /* Asegura que no exceda el ancho del contenedor */
            min-height: 100px;
            /* Cambiado a min-height para que el textarea pueda crecer */
            padding: 20px;
            /* Agregado padding para separar el texto del borde */
            box-sizing: border-box;
            /* Asegura que el padding no afecte el tamaño total */
            background: #f5e5e3;
            border-radius: 30px;
            resize: vertical;
            /* Permite redimensionar verticalmente */
            overflow-y: auto;
            /* Agrega barras de desplazamiento vertical si es necesario */
            font-family: Outfit, var(--default-font-family);
            /* Usa la misma fuente que el contenedor */
            font-size: 18px;


            font-weight: 350;
            /* Usa el mismo tamaño de fuente que el contenedor */
            line-height: inherit;
            /* Usa la misma altura de línea que el contenedor */
            border: none;
            /* Agregado borde para resaltar el textarea */
        }



        .pic-4 {
            position: absolute;
            width: 153px;
            height: 155px;
            top: 20px;
            left: 28px;
            background-size: cover;
            z-index: 29;
            border-radius: 200px;
        }

        .text-e {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 28px;
            top: 20px;
            left: 197px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 22px;
            font-weight: 600;
            line-height: 27.72px;
            text-align: left;
            white-space: nowrap;
            z-index: 30;
        }

        .text-f {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 28px;
            top: 20px;
            left: 197px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 22px;
            font-weight: 600;
            line-height: 27.72px;
            text-align: left;
            white-space: nowrap;
            z-index: 35;
        }

        .section-9 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 158px;
            /* Cambiado de 98px a 148px */
            height: 33px;
            top: 573px;
            left: 700px;
            /* Ajuste para mover hacia la derecha */
            padding: 6px 25px;
            background: #8d2d2c;
            z-index: 31;
            overflow: hidden;
            border-radius: 30px;
        }


        .section-10 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 158px;
            height: 33px;
            top: -20px;
            /* Cambiado de 675px a 625px */
            left: 0px;
            padding: 6px 25px;
            background: #8d2d2c;
            z-index: 31;
            overflow: hidden;
            border-radius: 30px;
        }


        .text-10 {
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

        .section-a {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: absolute;
            width: 98px;
            height: 33px;
            top: 138px;
            left: 496px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 36;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-11 {
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
            z-index: 37;
        }

        /*TEXTO PARA REGRESAR BOTON*/
        .text-12 {
            display: block;
            position: relative;
            height: 30px;
            margin: -50px 0 0 40px;
            /* Ajuste del margen para subirlo */
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 30px;
            text-align: left;
            text-transform: capitalize;
            white-space: nowrap;
            letter-spacing: 0.72px;
            z-index: 26;
        }


        .section-b {
            position: relative;
            width: 628px;
            height: 183px;
            margin: 15px 0 0 39px;
            background: #f5e5e3;
            z-index: 40;
            overflow: visible auto;
            border-radius: 30px;
        }

        .box-5 {
            position: relative;
            width: 223.491px;
            height: 112px;
            margin: 19px 0 0 26px;
            font-size: 0px;
            z-index: 56;
            overflow: visible auto;
        }

        .text-13 {
            display: block;
            position: relative;
            height: 16px;
            margin: 0 0 0 1px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 16px;
            text-align: left;
            white-space: nowrap;
            z-index: 41;
        }

        .text-14 {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: relative;
            width: 75px;
            height: 65px;
            margin: 31px 0 0 0;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21.42px;
            text-align: left;
            text-overflow: initial;
            z-index: 56;
            overflow: hidden;
        }

        .group-6 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 210.53px;
            margin: 0 0 10px 412.686px;
            /* Cambia el margin-top a 0 */
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 42;
            overflow: hidden;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
        }

        .text-15 {
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
            z-index: 43;
        }

        .box-6 {
            position: relative;
            width: 628px;
            height: 183px;
            margin: 17px 0 0 38px;
            background: #f5e5e3;
            z-index: 47;
            overflow: visible auto;
            border-radius: 30px;

        }

        .group-7 {
            position: relative;
            width: 222.491px;
            height: 89px;
            margin: 13px 0 0 27.512px;
            font-size: 0px;
            z-index: 57;
            overflow: visible auto;
        }

        .text-16 {
            display: block;
            position: relative;
            height: 16px;
            margin: 0 0 0 0;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 16px;
            text-align: left;
            white-space: nowrap;
            z-index: 48;
        }

        .text-17 {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: relative;
            width: 68px;
            height: 43px;
            margin: 30px 0 0 0.49px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21.42px;
            text-align: left;
            text-overflow: initial;
            z-index: 57;
            overflow: hidden;
        }

        .wrapper-5 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 210.53px;
            margin: 33px 0 0 414px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 49;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-18 {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: 136px;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: center;
            white-space: nowrap;
            z-index: 50;
        }

        .group-8 {
            position: absolute;
            width: 628px;
            height: 183px;
            top: 708px;
            /* Ajustamos la propiedad top para bajarlo */
            left: 40px;
            /* Mantenemos la propiedad left para alinear a la izquierda */
            background: #f5e5e3;
            z-index: 52;
            border-radius: 30px;
        }

        .box-7 {
            position: relative;
            width: 223.004px;
            height: 95px;
            margin: 13px 0 0 27px;
            font-size: 0px;
            z-index: 58;
            overflow: visible auto;
        }

        .text-19 {
            display: block;
            position: relative;
            height: 16px;
            margin: 0 0 0 0.51px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 16px;
            text-align: left;
            white-space: nowrap;
            z-index: 53;
        }

        .text-1a {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: relative;
            width: 68px;
            height: 43px;
            margin: 36px 0 0 0;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21.42px;
            text-align: left;
            text-overflow: initial;
            z-index: 58;
            overflow: hidden;
        }

        .wrapper-6 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 210.53px;
            margin: 28px 0 0 414px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 54;
            overflow: hidden;
            border-radius: 30px;
        }

        .text-1b {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: 136px;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: center;
            white-space: nowrap;
            z-index: 55;
        }

        .menu-button {
            display: block;
            background-color: #fff5f4;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 23px;
            font-weight: 200;
            line-height: 28.98px;
            text-align: left;
            white-space: nowrap;
            letter-spacing: 0.46px;
            border: none;
            padding: 20px 65px;
            margin: 40px 0 2px 25px;
            /* Ajusta este valor según sea necesario */
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu-button.general {
            background-color: #fff5f4;
            color: #000000;
            /* Cambia el color del texto a negro */
            margin-top: -150px;
            /* Mueve hacia arriba solo el botón "General" */
            margin-left: 1px;
            /* Mueve el botón "General" hacia la izquierda */
            border: 27.5px solid #fff5f4;
            ;
            /* Agrega un borde blanco */
        }


        .menu-button.ajuste {
            background-color: #f5e5e3;
            color: #000000;
            /* Cambia el color del texto a negro */
            padding: 15px 100px;
            /* Aumenta el padding horizontal para hacer el elemento más ancho */
            margin-top: -30px;
            margin-left: -6px;
            border: 5px solid #f5e5e3;
            /* Aumenta el ancho del borde */
            /* Centra el texto dentro del botón */
        }


        /* PARA AJUSTE DE COLOR DEL CLICK */
        .menu-button:hover {
            background-color: #f5e5e3;
            color: #ffffff;
        }

        /* Ajuste para mover los botones hacia la derecha */
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 50px;
            /* Espacio entre los botones */
            margin: 50px 0 0 0;
            /* Ajusta este valor según sea necesario */
        }

        #gestionarUsuariosButton {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: 136px;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: center;
            white-space: nowrap;
            z-index: 50;
            background-color: #8d2d2c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #gestionarUsuariosButton:hover {
            background-color: #8d2d2c;
        }

        #editarPerfilButton {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: 136px;
            height: 21px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 21px;
            text-align: center;
            white-space: nowrap;
            z-index: 50;
            background-color: #8d2d2c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #editarPerfilButton .text-6 {
            background-color: #8d2d2c;
            /* Color de fondo del texto */
        }

        #tablaWrapper {
            margin-top: 20px;
            /* Espacio entre el botón y la tabla */
        }

        #tablaContenido {
            width: 100%;
            border-collapse: collapse;
        }

        #tablaContenido th,
        #tablaContenido td {
            border: 1px solid #ddd;
            /* Borde de las celdas */
            padding: 8px;
            /* Espaciado interno de las celdas */
            text-align: left;
            /* Alineación del texto */
        }

        #tablaContenido th {
            background-color: #f2f2f2;
            /* Color de fondo para las celdas de encabezado */
        }

        #tablaContenido tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Color de fondo para filas pares */
        }

        #tablaContenido tr:hover {
            background-color: #ddd;
            /* Color de fondo al pasar el ratón por encima de una fila */
        }

        #agregarRolesButton {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: auto;
            height: 30px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 30px;
            /* Ajustado a la altura del botón */
            text-align: center;
            padding: 0 15px;
            background-color: #8d2d2c;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 30px;


        }

        #agregarRolesButton:hover {
            background-color: #8d2d2c;
        }


        #regresarButton {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            width: 100px;
            /* Ancho del botón */
            height: 40px;
            /* Altura del botón */
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 16px;
            font-weight: 500;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            z-index: 1;
            background-color: #8d2d2c;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            top: -40px;
            /* Mover hacia arriba */
        }

        #regresarButton:hover {
            background-color: #a53a39;
        }



        .comment {
            flex-grow: 1;
            margin: 15px;
            padding: 15px;
            border: 2px solid #aa5454;
            max-width: 820px;
            margin-left: 30px;
            /* Aumenta el grosor del borde a 2px */
            box-sizing: border-box;
            background: #f5e5e3;
            border-radius: 20px;
            /* Bordes redondeados */
            display: flex;
            flex-direction: column;

        }


        .comment-info {
            font-weight: bold;
            margin-bottom: 5px;
            font-family: Outfit, var(--default-font-family);
            font-size: 18px;
            /* Espacio entre elementos de información */
        }

        .user-name {
            align-self: flex-start;
            font-family: Outfit, var(--default-font-family);
            font-size: 19px;
            font-weight: 500;
            color: #771b1b;

            /* Alinea el nombre del usuario a la izquierda */
        }

        .date {
            align-self: flex-end;
            font-family: Outfit, var(--default-font-family);
            font-size: 16px;
            /* Alinea la fecha a la derecha */
        }

        .wrapper-4 {
            position: relative;
            box-sizing: border-box;
            /* El tamaño total incluirá el padding y el border */
            padding: 10px;
            width: 900px;
            align-items: center;
            /* Centra los elementos horizontalmente */
            justify-content: center;
            /* Centra los elementos verticalmente */
            /* Ancho horizontal aumentado */
            padding-bottom: 30px;
            height: auto;
            top: -60px;
            /* Subir el elemento */
            left: 230px;
            background: #fff5f4;
            z-index: 24;
            border-radius: 30px;
        }

        .section-7 {
            position: absolute;
            max-width: 900px;
            /* Asegura que no exceda el ancho del contenedor */

            padding: 10px;
            /* Agregado padding para separar el texto del borde */
            box-sizing: border-box;
            /* Asegura que el padding no afecte el tamaño total */
            border-radius: 30px;

            align-items: center;
            /* Centra los elementos horizontalmente */
            justify-content: center;
            /* Centra los elementos verticalmente */

            width: 900px;
            height: auto;
            margin-top: 50px;
            left: 0px;
            /* Ajusta la posición horizontal hacia la derecha según sea necesario */
            background: #fff5f4;
            z-index: 34;
            border-radius: 30px;
        }

        .product-quantity {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 13.619px;
            top: 580px;
            left: 460px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 13.619px;
            text-align: left;
            white-space: nowrap;
            z-index: 29;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-top: -4px;
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

        .div-rectangle-d {
            position: absolute;
            width: 216px;
            height: 216px;
            top: 20px;
            left: 60px;
            background-size: cover;
            z-index: 37;
            border-radius: 10px;
        }

        .profile-pic {
            margin-left: 120px;
            width: 530px;
            height: 530px;
            border-radius: 5%;
            object-fit: cover;
        }

        textarea.section-8 {
            /* Desactiva todos los eventos del mouse */
            /* Establece un color de fondo consistente */
            border: none;
            /* Elimina el borde */
            resize: none;
            /* Desactiva la redimensión del área de texto */
            outline: none;
            /* Elimina el borde de enfoque */
            /* Establece un color de texto consistente */
        }

        textarea.section-8:focus {
            outline: none;
            /* Asegura que no haya un borde de enfoque */
            border: none;
            /* Asegura que no aparezca ningún borde */
        }

        .stars-outer {
        display: inline-block;
       margin-top: 103px;
       margin-left: 100px;
        position: absolute;
        font-family: Arial, sans-serif;
    }

    .stars-inner {
        position: absolute;
        top: 0;
        left: 0;
        white-space: nowrap;
        overflow: hidden;
        width: 0;
    }

    .stars-outer::before {
        content: "★★★★★";
        font-size: 16px; /* Ajusta el tamaño de las estrellas aquí */
        color: #ccc; /* Color de las estrellas vacías */
    }

    .stars-inner::before {
        content: "★★★★★";
        font-size: 16px; /* Ajusta el tamaño de las estrellas aquí */
        color: #b81919; /* Color de las estrellas llenas */
    }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="box">
            <div class="section">
                <div class="section-2">
                    <div class="img"></div>
                </div>
                <div class="box-2">
                    <div class="pic"></div>
                </div>
                <div class="wrapper">
                    <div class="img-2"></div>
                </div>
                <div class="group">
                    <div class="img-3"></div>
                </div>
                <div class="group-2">
                    <div class="img-4"></div>
                </div>
                <div class="box-3">
                    <div class="img-5"></div>
                </div>
                <div class="wrapper-2">
                    <div class="pic-2"></div>
                </div>
                <div class="section-3">
                    <div class="pic-3"></div>
                </div>
            </div>
            <div class="group-3"></div>
            <span class="text">ITSHOP</span><span class="text-2">ITSHOP</span>

        </div>
        <div class="box-4">
        <form id="form" action="Mandar_Carrito.php" method="post" enctype="multipart/form-data">
            <div class="wrapper-4" id="tablaWrapper">
                <?php
                include 'conexion.php';
                if (isset($_GET['idProducto'])) {
                    // Obtener el valor de 'idProducto'
                    $idProducto = $_GET['idProducto'];

                    if (isset($_GET['idUsuario'])) {
                        // Obtener el valor de 'idProducto'
                        $idUsuario = $_GET['idUsuario'];

                        $DATA = $dbh->query("SELECT SYSDATE FROM dual");

                        // Obtener la fecha actual
                        $fecha_actual = $DATA->fetchColumn();

                        try {
                            // Establecer conexión a la base de datos
                            $query = "SELECT * FROM datos_producto WHERE idproducto = " . $idProducto . " ORDER BY idproducto DESC";

                            $stmt = $dbh->query($query);
                            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Si hay productos, generar instancias de producto
                            if (!empty($productos)) {
                                foreach ($productos as $producto) {
                                    $idProducto = $producto['idproducto'];
                                    $stmt = $dbh->prepare("SELECT ruta_producto FROM products_img WHERE id = ?");
                                    $stmt->execute([$idProducto]);
                                    $rol_row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $ruta_imagen = $rol_row['ruta_producto'] ?? '';

                                    // Obtener el tipo de contenido de la imagen
                                    $info = getimagesize($ruta_imagen);
                                    $tipo_contenido = $info['mime'];

                                    // Obtener el contenido de la imagen como base64
                                    $imagen_codificada = base64_encode(file_get_contents($ruta_imagen));
                                    $imagen_src = 'data:' . $tipo_contenido . ';base64,' . $imagen_codificada;

                                    echo "<div class='div-rectangle-d'><img src=" . $imagen_src . " alt='Imagen' class='profile-pic'></div>";
                                }
                            } else {
                                echo "<div class='div-rectangle-d'>";
                            }
                        } catch (PDOException $e) {
                            // Mostrar mensaje de error si la conexión falla
                            echo "Error: " . $e->getMessage();
                        }
                    } else {
                        // Si no se pasó el parámetro 'idUsuario' en la URL
                        $DATA = $dbh->query("SELECT CURDATE()");

                        // Obtener la fecha actual
                        $fecha_actual = $DATA->fetchColumn();

                        try {
                            // Establecer conexión a la base de datos
                            $query = "SELECT * FROM datos_producto WHERE idproducto = " . $idProducto . " ORDER BY idproducto DESC";

                            $stmt = $dbh->query($query);
                            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Si hay productos, generar instancias de producto
                            if (!empty($productos)) {
                                foreach ($productos as $producto) {
                                    $idProducto = $producto['idproducto'];
                                    $stmt = $dbh->prepare("SELECT ruta_producto FROM products_img WHERE id = ?");
                                    $stmt->execute([$idProducto]);
                                    $rol_row = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $ruta_imagen = $rol_row['ruta_producto'] ?? '';

                                    // Obtener el tipo de contenido de la imagen
                                    $info = getimagesize($ruta_imagen);
                                    $tipo_contenido = $info['mime'];

                                    // Obtener el contenido de la imagen como base64
                                    $imagen_codificada = base64_encode(file_get_contents($ruta_imagen));
                                    $imagen_src = 'data:' . $tipo_contenido . ';base64,' . $imagen_codificada;

                                    echo "<div class='div-rectangle-d'><img src=" . $imagen_src . " alt='Imagen' class='profile-pic'></div>";
                                }
                            } else {
                                echo "<div class='div-rectangle-d'>";
                            }
                        } catch (PDOException $e) {
                            // Mostrar mensaje de error si la conexión falla
                            echo "Error: " . $e->getMessage();
                        }
                    }

                    // Ahora puedes utilizar la variable $idProducto como quieras en esta página
                } else {
                    // Si no se pasó el parámetro 'idProducto' en la URL
                    echo "No se ha especificado un ID de producto.";
                }
                ?>

                <input type="hidden" value="<?php echo $idProducto; ?>" name="idProducto" required>
                <input type="hidden" value="<?php echo $idUsuario; ?>" name="idUsuario" required>

                <div class="product-quantity">
                    <span class="title">Cantidad de producto:</span>
                    <div class="input-container">
                        <input type="number" name="cantidad" class="quantity" value="0" min="0" required>
                    </div>
                </div>
                <div class="section-9">
                    <button type="submit" id="editarPerfilButton" class="text-10">Agregar al carrito</button>
                </div>
                <span class="nombre"><?php echo $productos[0]['nombre']; ?></span>
                
                <span class="text-stock">Stock: <?php echo $productos[0]['stock']; ?></span>

                <span class="text-8">Descripcion:</span>
                <div class="group-5">
                    <textarea class="section-8" readonly><?php echo $productos[0]['descripcion']; ?></textarea>
                </div>
        </form>

        <div class="section-7" id="commentSection">
            <span class="text-7">Comentarios:</span>

            <?php
            if (isset($_GET['idProducto'])) {
                // Obtener el valor de 'idProducto'
                $idProducto = $_GET['idProducto'];

                // Ahora puedes utilizar la variable $idUsuario como quieras en esta página
            } else {
                // Si no se pasó el parámetro 'idUsuario' en la URL
                echo "No se ha especificado un ID de usuario.";
            }

            try {
                // Establecer conexión a la base de datos
                $query = "SELECT * FROM comentario WHERE idproducto = " . $idProducto . " ORDER BY idcomentario ASC";

                $stmt = $dbh->query($query);
                $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Si hay comentarios, generar instancias de producto
                if (!empty($comentarios)) {
                    foreach ($comentarios as $comentario) {
                        $idcomentario = $comentario['idcomentario'];
                        $idUsuarioComentario = $comentario['idusuario'];
                        $query = "SELECT nombre_usuario FROM datos_usuario WHERE idusuario = " . $idUsuarioComentario . "";

                        $stmt = $dbh->query($query);
                        $USUARIOcomentario = $stmt->fetch(PDO::FETCH_ASSOC);
                        $valoracion = $comentario['valoracion']; // Asumiendo que la columna se llama 'VALORACION'
                        $valoracionPorcentaje = ($valoracion / 5) * 100; // Calcula el ancho de las estrellas llenas

                        echo '<div class="comment">';
                        echo '<div class="comment-info user-name">Usuario: ' . $USUARIOcomentario['nombre_usuario'] . '</div>';
                        echo '<div class="comment-info date">Fecha: ' . $comentario['fecha'] . '</div>';
                        echo '<div class="comment-info">Comentario:</div>';
                        echo '<div style="font-family: Outfit, var(--default-font-family); font-size: 16px;">' . $comentario['comentario'] . '</div>';
                
                        // Mostrar las estrellas
                        echo '<div class="comment-info">Valoración:</div>';
                        echo '<div class="stars-outer">';
                        echo '<div class="stars-inner" style="width: ' . $valoracionPorcentaje . '%;"></div>';
                        echo '</div>';
                
                        echo '</div>';
                    }
                } else {
                    echo '<div class="comment">';
                    echo '<div class="comment-info user-name">No existen comentarios para este producto</div>';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                // Mostrar mensaje de error si la conexión falla
                echo "Error: " . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <div class="section-10">
        <button id="regresarButton" onclick="window.location.href = '<?php echo isset($idUsuario) ? 'index.php?idUsuario=' . $idUsuario : 'index.php'; ?>'" class="text-9">Regresar</button>
    </div>
</body>

</html>