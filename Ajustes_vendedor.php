<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil Vendedor</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;500;600&display=swap" />
    <style>
        :root {
            --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
                "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
                "Source Han Sans CN", sans-serif;
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
            overflow: hidden;
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
            background: url(./assets/images/8962523e-f454-46c8-826c-3fe989ea8ade.png) no-repeat center;
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
            background: url(./assets/images/964ec5c4-30cb-4185-a3f1-a3a3dcd9fd58.png) no-repeat center;
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
            background: url(./assets/images/cd7068bf-90f1-4135-9e8a-29c81c960d13.png) no-repeat center;
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
            background: url(./assets/images/f4b52315-a948-45fc-bdef-ff18a2a9b519.png) no-repeat center;
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
            background: url(./assets/images/9c78af69-2fa3-4cf6-8857-79d35cde670e.png) no-repeat center;
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
            background: url(./assets/images/0082c817-bfe7-46d1-a89e-f50caec91abd.png) no-repeat center;
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
            background: url(./assets/images/8d388f54-828e-4919-8c33-3508be1f6a22.png) no-repeat center;
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
            background: url(./assets/images/8cda49e0-2c5d-44ab-a7e6-1a4ae853c2c8.png) no-repeat center;
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
            font-size: 40px;
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
            bottom: 37px;
            left: 188px;
            color: #f5e5e3;
            font-family: Readex Pro, var(--default-font-family);
            font-size: 54px;
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

        .box-4 {
            position: relative;
            width: 1065px;
            height: 897px;
            margin: 29px 0 0 188px;
            z-index: 52;
        }

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

        .section-5 {
            position: relative;
            width: 270px;
            height: 69px;
            margin: 10px 0 0 0;
            background: #f5e5e3;
            z-index: 15;
        }

        .group-4 {
            position: absolute;
            width: 7px;
            height: 69px;
            top: 0;
            left: 0;
            background: #721918;
            z-index: 16;
        }

        .text-6 {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 29px;
            top: 20px;
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

        .text-7 {
            display: block;
            position: relative;
            height: 29px;
            margin: 30px 0 0 25px;
            /* Aumentado el margen superior */
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

        .text-8 {
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

        .text-9 {
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

        .wrapper-4 {
            position: absolute;
            width: 705px;
            height: 895px;
            top: 0;
            left: 360px;
            background: #fff5f4;
            z-index: 24;
            border-radius: 30px;
        }

        .section-6 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            width: 621.53px;
            height: 33px;
            margin: 15px 0 0 38px;
            z-index: 44;
        }

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

        .section-7 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            flex-shrink: 0;
            gap: 10px;
            position: relative;
            width: 150px;
            padding: 6px 15px;
            background: #8d2d2c;
            z-index: 44;
            overflow: hidden;
            border-radius: 30px;
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
            width: 628px;
            height: 194px;
            margin: 18px 0 0 38px;
            background: #f5e5e3;
            z-index: 28;
            border-radius: 30px;
        }

        .section-8 {
            position: absolute;
            width: 628px;
            height: 194px;
            top: 0;
            left: 0;
            background: #f5e5e3;
            z-index: 34;
            border-radius: 30px;
        }

        .pic-4 {
            position: absolute;
            width: 153px;
            height: 155px;
            top: 20px;
            left: 28px;
            background: url(./assets/images/0c2e577fef6df3a2c9d120355946b27e8b333dc5.png) no-repeat center;
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
            width: auto;
            height: 33px;
            top: 138px;
            left: 430px;
            padding: 6px 25px 6px 25px;
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

        .text-12 {
            display: block;
            position: relative;
            height: 30px;
            margin: 9px 0 0 40px;
            color: #8d2d2c;
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
            margin: 7px 0 0 412.686px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 42;
            overflow: hidden;
            border-radius: 30px;
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
            margin: 2px 0 2px 25px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Estilo específico para el botón "General" */
        .menu-button.general {
            background-color: #f5e5e3;
            color: #ffffff;
            /* Cambia el color de fondo solo para el botón "General" */
        }

        /*PARA AJUSTE DE COLOR DEL CLICK */

        .menu-button:hover {
            background-color: #f5e5e3;
            color: #ffffff;
        }

        /* Ajuste para mover los botones hacia la derecha */
        .menu-button-container {
            text-align: right;
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

        #editarPerfilButton:hover {
            background-color: #8d2d2c;
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
        }

        #agregarRolesButton:hover {
            background-color: #8d2d2c;
        }

        #tablaRoles {
            width: 100%;
            border-collapse: collapse;
        }

        #tablaRoles th,
        #tablaRoles td {
            border: 1px solid #ddd;
            /* Borde de las celdas */
            padding: 8px;
            /* Espaciado interno de las celdas */
            text-align: left;
            /* Alineación del texto */
        }

        #tablaRoles th {
            background-color: #f2f2f2;
            /* Color de fondo para las celdas de encabezado */
        }

        #tablaRoles tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Color de fondo para filas pares */
        }

        #tablaRoles tr:hover {
            background-color: #ddd;
            /* Color de fondo al pasar el ratón por encima de una fila */
        }

        #agregarCategoriasButton {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            flex-basis: auto;
            position: relative;
            width: auto;
            /* Ancho automático */
            height: 30px;
            color: #ffffff;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 500;
            line-height: 30px;
            /* Ajustado a la altura del botón */
            text-align: center;
            padding: 0 15px;
            /* Relleno horizontal */
            background-color: #8d2d2c;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #agregarCategoriasButton:hover {
            background-color: #8d2d2c;
        }

        #tablaCategorias {
            width: 100%;
            /* Ancho de la tabla */
            border-collapse: collapse;
            /* Fusionar los bordes de las celdas */
        }

        #tablaCategorias th,
        #tablaCategorias td {
            border: 1px solid #dddddd;
            /* Borde de las celdas */
            padding: 8px;
            /* Espaciado interno de las celdas */
            text-align: left;
            /* Alineación del texto */
        }

        #tablaCategorias th {
            background-color: #f2f2f2;
            /* Color de fondo para las celdas de encabezado */
        }

        #tablaCategorias tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Color de fondo para filas pares */
        }

        #tablaCategorias tr:hover {
            background-color: #dddddd;
            /* Color de fondo al pasar el ratón por encima de una fila */
        }

        #agregarEspecialidadButton {
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
            /* Relleno horizontal */
            background-color: #8d2d2c;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #agregarEspecialidadButton:hover {
            background-color: #8d2d2c;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .text-NOMBRE {
            flex-shrink: 0;
            position: relative;
            height: 30px;
            color: #000000;
            font-family: Outfit, var(--default-font-family);
            font-size: 24px;
            font-weight: 600;
            line-height: 30px;
            margin-left: 180px;
            top: 20px;
            text-align: center;
            text-transform: capitalize;
            white-space: nowrap;
            letter-spacing: 0.72px;
            z-index: 25;
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
<span onclick="window.location.href = 'index.php?idUsuario=<?php echo $_GET['idUsuario']; ?>'" class="text-2">ITSHOP</span>
<div class="section-4">
    <span class="text-3">Inicio > </span><span class="text-4">Mi Cuenta </span>
</div>
</div>
<div class="box-4">
    <div class="flex-row-d">
        <div class="rectangle-4">
            <span class="mi-cuenta-5">mi cuenta</span>
            <span onclick="window.location.href = 'Vendedor_perfil.php?idUsuario=<?php echo $_GET['idUsuario']; ?>'" class="general">General</span>
            <span onclick="window.location.href = 'GestionProductos.php?idUsuario=<?php echo $_GET['idUsuario']; ?>'" class="ventas">Productos</span>
            <span onclick="window.location.href = 'FormInventario.php?idUsuario=<?php echo $_GET['idUsuario']; ?>'" class="ventas">Inventario</span>
            <span onclick="window.location.href = 'FormVentas.php?idUsuario=<?php echo $_GET['idUsuario']; ?>'" class="ventas">Ventas</span>
            <div class="rectangle-6">
                <div class="rectangle-7"></div>
                <span onclick="window.location.href = 'Ajustes_vendedor.php?idUsuario=<?php echo $_GET['idUsuario']; ?>'" class="productos">Ajustes</span>
            </div>
        </div>
        <?php
        include 'conexion.php';
        if (isset($_GET['idUsuario'])) {
            $idUsuario = $_GET['idUsuario'];

            $query = "SELECT * FROM datos_usuario WHERE idusuario = " . $idUsuario;
            $stmt = $dbh->query($query);
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "No se ha especificado un ID de usuario.";
        }
        ?>
        <div class="wrapper-4" id="tablaWrapper">
            <div class="section-6">
                <span class="text-c">Mi Perfil</span>
            </div>
            <div class="group-5">
                <div class="section-8">
                    <span class="text-7">Nombre: <?php echo $datos[0]['nombre_usuario']; ?></span>
                    <span class="text-8">Correo: <?php echo $datos[0]['correo']; ?></span>
                    <div class="section-9">
                        <button id="eliminarCuentaButton" class="text-10">Eliminar Cuenta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("eliminarCuentaButton").addEventListener("click", function() {
            if (confirm("¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.")) {
                sessionStorage.removeItem('idUsuario'); // Eliminar el idUsuario del sessionStorage
                window.location.href = "eliminar_cuenta.php?idUsuario=<?php echo $_GET['idUsuario']; ?>";
            }
        });
    });
</script>
</body>
</html>