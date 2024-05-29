<!DOCTYPE html>
<html lang="en">
<?php
// Tu código de conexión y funciones existentes
if (isset($_GET['idusuario'])) {
  // Obtener el valor de 'idusuario'
  $idusuario = $_GET['idusuario'];
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ITSHOP</title>
  <script src="Globales.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;800&display=swap" />
  <link rel="stylesheet" href="index.css" />
  <style>
        /* Estilos para el menú desplegable */
        .dropdown {
        position: relative;
        left: 50px;
        display: inline-block;
        z-index: 1000;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        /* Cambia el color de fondo aquí si deseas */
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1001;
        border-radius: 20px;
        /* Agrega bordes redondos al menú */
    }

    .dropdown-content a {
        color: #333;
        /* Cambia el color del texto aquí si deseas */
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        border-radius: 20px;
        z-index: 1001;

        /* Agrega bordes redondos a los elementos del menú */
    }

    .dropdown-content a:hover {
        background-color: #ddd;
        z-index: 1001;

        /* Cambia el color de fondo al pasar el cursor aquí si deseas */
    }

    .dropdown:hover .dropdown-content {
        display: block;
        z-index: 1001;

    }

    :root {
        --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
            "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
            "Source Han Sans CN", sans-serif;
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
        width: 100%;
        height: auto;
        margin: 0;
        background: #f5e5e3;
        overflow: hidden;
    }

    @media screen and (max-width: 768px) {
        /* Estilos específicos para pantallas más pequeñas */
    }

    @media screen and (min-width: 1200px) {
        /* Estilos específicos para pantallas más grandes */
    }

    body {
        overflow-x: hidden;
    }


    .navegation {
        display: flex;
        flex-direction: row;
        /* Cambiado de column a row */
        align-items: center;
        /* Alinea los elementos verticalmente */
        justify-content: space-between;
        /* Espacia los elementos uniformemente */
        position: relative;
        width: 100%;
        height: 41px;
        top: -10px;
        left: -10px;
        padding: 10px 5%;
        /* Ajuste el padding para espaciar el contenido */
        background: #721918;
        justify-content: center;
        z-index: 1001;

        /* Centra los elementos horizontalmente */
    }





    .frame {
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 35px;
        position: relative;
        width: 100%;
        height: 59px;

        z-index: 1;
    }

    .itshop {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        flex-shrink: 0;
        flex-basis: auto;
        position: relative;
        width: 241px;
        height: 64px;
        top: 7px;
        color: #ffffff;
        font-family: Readex Pro, var(--default-font-family);
        font-size: 64px;
        font-weight: 500;
        line-height: 64px;
        text-align: left;
        white-space: nowrap;
        letter-spacing: -10.24px;
        z-index: 2;
    }

    .rectangle {
        flex-shrink: 0;
        position: relative;
        width: 380px;
        height: 50px;
        background: rgba(205, 89, 87, 0.3);
        z-index: 3;
        border-radius: 9px;
        box-shadow: 0 1px 2px 0 rgba(16, 24, 40, 0.05);
    }

    /* Estilos para la barra de búsqueda */
    #busqueda {
        color: white;
        /* Cambiar el color del texto a blanco */
        font-family: Outfit, var(--default-font-family);
        /* Cambiar la fuente del texto */
        padding-left: 10px;
        /* Añadir relleno izquierdo */
        border: rgba(228, 169, 168, 0.3);
        /* Asegurarse de que el input no tenga borde */
      top: -2px;
        /* Asegurarse de que el input tenga un fondo transparente */
        width: 380px;
        /* Ajustar el ancho del input al 100% */
        height: 35px;
        border-radius: 30px;

        /* Ajustar la altura del input al 100% */
        outline: none;
        /* Quitar el contorno al enfocar */
    }



    .search {
        flex-shrink: 0;
        position: absolute;
        width: 25.017px;
        height: 25px;
        top: 21px;
        left: 673px;
        z-index: 14;
        overflow: hidden;
    }

    .icon {
        position: relative;
        width: 26px;
        height: 26px;
        top: 3px;
        margin: 2.625px 0 0 2.627px;
        background: url(./assets/search.png) no-repeat center;
        background-size: 100% 100%;
        z-index: 15;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .frame-1 {
        display: inline-flex;
        /* Cambia display a inline-flex */
        align-items: center;
        /* Alinea los elementos verticalmente */
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 17px;
        position: relative;
        padding: 5px 12px;
        /* Elimina el padding derecho e izquierdo para que se ajuste al texto */
        cursor: pointer;
        background: transparent;
        left: 50px;
        top: 5px;

        border: 3px solid #7a1f1e;
        z-index: 4;
        border-radius: 10px;
    }


    .menu {
        flex-shrink: 0;
        position: relative;
        width: 24px;
        height: 24px;
        z-index: 5;
        overflow: hidden;
    }

    .icon-2 {
        position: relative;
        width: 20.5px;
        height: 16.5px;
        margin: 3.75px 0 0 1.75px;
        background: url(./assets/menu.png) no-repeat center;
        background-size: 100% 100%;
        z-index: 6;
    }

    /* Estilos para el botón y el select */
    .button-style,
    .categorias {
        flex-shrink: 0;
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #f4e1df;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 7;
    }

    /* Estilos adicionales para el select */
    .categorias {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: transparent;
        border: none;
        outline: none;
        cursor: pointer;
    }

    /* Estilos para el dropdown */
    #categoriasDropdown {
        display: none;
        /* Añade estilos adicionales según tus necesidades */
    }

    /* Estilo para el despliegue de opciones del select */
    .categorias option {
        background-color: #7a1f1e;
        /* Color de fondo */
        color: #f4e1df;
        /* Color del texto */
        font-family: Outfit, var(--default-font-family);
        /* Fuente */
        font-size: 17px;
        /* Tamaño de fuente */
        padding: 5px 10px;
        /* Espaciado interno */
        border: none;
        /* Borde */
        outline: none;
        /* Estilo de contorno */
    }

    /* Estilo para el despliegue de opciones cuando están seleccionadas */
    .categorias option:checked {
        background-color: #f4e1df;
        /* Color de fondo */
        color: #7a1f1e;
        /* Color del texto */
    }



    .menu_despliegue {
        flex-shrink: 0;
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #160908;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 1000;
    }

    .cart {
        flex-shrink: 0;
        position: relative;
        left: 60px;

        width: 32.022px;
        height: 32px;
        z-index: 8;
        overflow: hidden;
    }

    .icon-3 {
        position: relative;
        width: 25.685px;
        height: 25px;
        margin: 4.333px 0 0 3.002px;
        background: url(./assets/cart.png) no-repeat center;
        background-size: 100% 100%;
        z-index: 9;
    }

    .notification {
        flex-shrink: 0;
        position: relative;
        width: 30px;
        height: 30px;
        z-index: 10;
        overflow: hidden;
    }

    .icon-4 {
        position: relative;
        width: 25px;
        height: 25px;
        margin: 2.5px 0 0 4.85px;
        background: url(./assets/notification.png) no-repeat center;
        background-size: 100% 100%;
        z-index: 11;
    }

    .user {
        flex-shrink: 0;
        position: relative;
        top: 2px;
        width: 30px;
        height: 30px;
        z-index: 12;
        overflow: hidden;
    }

    .icon-5 {
        position: relative;
        width: 25px;
        height: 25px;
        margin: 2.5px 0 0 5px;
        background: url(./assets/user.png) no-repeat center;
        background-size: 100% 100%;
        z-index: 13;
    }

    .flex-row-ef {
        display: flex;
        flex-wrap: wrap;
        /* Permite que los elementos se envuelvan a la siguiente fila */
        justify-content: space-between;
        /* Espacia los elementos uniformemente */
        margin: 46px 0 0 70px;
    }

    .producto {
        flex-basis: calc(25% - 1px);
        /* Define el tamaño base del producto para que quepan 4 en una fila */
        margin-bottom: 20px;
        /* Espacio entre filas */
        z-index: 1;

    }




    .rectangle-6 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 7;
        border-radius: 10px;
        object-fit: cover;

    }

    .descripcion {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 19;
    }

    .cinturon-unisex-moda {
        flex-basis: auto;
        position: relative;
        height: auto;
        /* Cambiar a auto para que se ajuste según el contenido */
        margin-bottom: 10px;
        /* Aumentar el margen inferior */
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: wrap;
        text-transform: capitalize;

        /* No es necesario, puedes eliminar esto */
        z-index: 20;
    }

    .descripcion {
        display: block;
        /* Cambiar a block para que los elementos se muestren en bloques verticales */
    }

    .descripcion>* {
        margin-bottom: 5px;
        /* Ajustar el margen inferior de los elementos dentro de .descripcion */
    }


    .mx-150 {
        flex-basis: auto;
        display: block;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 21;
    }

    .estrellas-container {
        display: flex;
        align-items: center;
        /* Alinear las estrellas verticalmente */
    }

    .estrellas {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 30px;
        height: 30px;
        background: url(./assets/Star1.png) no-repeat center;
        background-size: cover;
        z-index: 22;
    }

    .reviews {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 23;
    }

    .producto-7 {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 24;
    }

    .rectangle-8 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 25;
        border-radius: 10px;
    }

    .descripcion-9 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 26;
    }

    .cinturon-unisex-moda-a {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 27;
    }

    .mx-150-b {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 28;
    }

    .estrellas-c {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/Star2.png) no-repeat center;
        background-size: cover;
        z-index: 29;
    }

    .reviews-d {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 30;
    }

    .producto-e {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 31;
    }

    .rectangle-f {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 32;
        border-radius: 10px;
    }

    .descripcion-10 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 33;
    }

    .cinturon-unisex-moda-11 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 34;
    }

    .mx-150-12 {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 35;
    }

    .estrellas-13 {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/7d95024f-c855-4821-8ac7-4d687ed009f1.png) no-repeat center;
        background-size: cover;
        z-index: 36;
    }

    .reviews-14 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 37;
    }

    .producto-15 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 38;
    }

    .rectangle-16 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 39;
        border-radius: 10px;
    }

    .descripcion-17 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 40;
    }

    .fashion-belt {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 41;
    }

    .mx-price {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 42;
    }

    .stars {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/b57f3bee-5986-45cb-8f87-fa5da407fd45.png) no-repeat center;
        background-size: cover;
        z-index: 43;
    }

    .reviews-18 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 44;
    }

    .flex-row-db {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 1065px;
        height: 332px;
        margin: 40px 0 0 188px;
        z-index: 67;
    }

    .product {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 46;
    }

    .rectangle-19 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 47;
        border-radius: 10px;
    }

    .description {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 48;
    }

    .fashion-belt-1a {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 49;
    }

    .mx-price-1b {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 50;
    }

    .stars-1c {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/293ab50f-92e7-45b8-b312-e6ad358655a0.png) no-repeat center;
        background-size: cover;
        z-index: 51;
    }

    .reviews-1d {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 52;
    }

    .product-1e {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 53;
    }

    .rectangle-1f {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 54;
        border-radius: 10px;
    }

    .description-20 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 55;
    }

    .fashion-belt-21 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 56;
    }

    .mx-price-22 {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 57;
    }

    .stars-23 {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/543c2f54-7dd3-432f-a215-9ef5e5a41c2c.png) no-repeat center;
        background-size: cover;
        z-index: 58;
    }

    .reviews-24 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 59;
    }

    .product-25 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 60;
    }

    .rectangle-26 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 61;
        border-radius: 10px;
    }

    .descripcion-27 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 62;
    }

    .cinturon-unisex-moda-28 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 63;
    }

    .mx-150-29 {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 64;
    }

    .estrellas-2a {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/10ad7579-5360-42aa-a82d-8d7c0d56a47b.png) no-repeat center;
        background-size: cover;
        z-index: 65;
    }

    .reviews-2b {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 66;
    }

    .producto-2c {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 67;
    }

    .rectangle-2d {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 68;
        border-radius: 10px;
    }

    .descripcion-2e {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 69;
    }

    .cinturon-unisex-moda-2f {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 70;
    }

    .mx-150-30 {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 71;
    }

    .estrellas-31 {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/9583102a-20bf-4c18-83de-59a686205c7f.png) no-repeat center;
        background-size: cover;
        z-index: 72;
    }

    .reviews-32 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 73;
    }

    .flex-row-e {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 1065px;
        height: 332px;
        margin: 40px 0 0 188px;
        z-index: 96;
    }

    .producto-33 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 75;
    }

    .rectangle-34 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 76;
        border-radius: 10px;
    }

    .descripcion-35 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 77;
    }

    .cinturon-unisex-moda-36 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 78;
    }

    .mx-150-37 {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 79;
    }

    .estrellas-38 {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/0b99c776-bd95-44a4-9b0d-9307153d0c6a.png) no-repeat center;
        background-size: cover;
        z-index: 80;
    }

    .reviews-39 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 81;
    }

    .producto-3a {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 82;
    }

    .rectangle-3b {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 83;
        border-radius: 10px;
    }

    .descripcion-3c {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 84;
    }

    .cinturon-unisex-moda-3d {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 85;
    }

    .mx-dollars {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 86;
    }

    .estrellas-3e {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/dcecbece-cb83-4a59-a84a-737f1909ea75.png) no-repeat center;
        background-size: cover;
        z-index: 87;
    }

    .reviews-3f {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 88;
    }

    .producto-40 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 89;
    }

    .rectangle-41 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 90;
        border-radius: 10px;
    }

    .descripcion-42 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 91;
    }

    .cinturon-unisex-moda-43 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 92;
    }

    .mx-dollars-44 {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 93;
    }

    .estrellas-45 {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/f91f9737-d41d-410e-8857-616ae4a0323e.png) no-repeat center;
        background-size: cover;
        z-index: 94;
    }

    .reviews-46 {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 95;
    }

    .producto-47 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-wrap: nowrap;
        flex-shrink: 0;
        gap: 8px;
        position: relative;
        width: 255px;
        z-index: 96;
    }

    .rectangle-48 {
        flex-shrink: 0;
        position: relative;
        width: 255px;
        height: 247px;
        background: #d9c7c7;
        z-index: 97;
        border-radius: 10px;
    }

    .descripcion-49 {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        flex-shrink: 0;
        position: relative;
        width: 247px;
        z-index: 98;
    }

    .cinturon-unisex-moda-4a {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 99;
    }

    .mx-dollars-4b {
        flex-basis: auto;
        position: relative;
        height: 26px;
        color: #311811;
        font-family: Outfit, var(--default-font-family);
        font-size: 21px;
        font-weight: 800;
        line-height: 26px;
        text-align: left;
        white-space: nowrap;
        z-index: 100;
    }

    .estrellas-4c {
        display: flex;
        align-items: flex-end;
        flex-wrap: nowrap;
        position: relative;
        width: 165px;
        height: 30px;
        background: url(./assets/images/a6440763-d92b-493b-ad75-b9cb0f44f952.png) no-repeat center;
        background-size: cover;
        z-index: 101;
    }

    .reviews-4d {
        flex-basis: auto;
        position: relative;
        height: 21px;
        color: #d7454b;
        font-family: Outfit, var(--default-font-family);
        font-size: 17px;
        font-weight: 400;
        line-height: 21px;
        text-align: left;
        white-space: nowrap;
        z-index: 102;
    }

    /* Cambia el color de fondo de la barra de desplazamiento */
    ::-webkit-scrollbar {
        background-color: #f4f4f4;
    }

    /* Cambia el color de la barra de desplazamiento */
    ::-webkit-scrollbar-thumb {
        background-color: #721918;
    }

    /* Cambia el color del fondo al pasar el mouse sobre la barra de desplazamiento */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #721918;
    }

    /* Cambia el grosor de la barra de desplazamiento */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Cambia el grosor de la barra de desplazamiento en el eje y */
    ::-webkit-scrollbar-y {
        width: 10px;
    }

    /* Cambia el grosor de la barra de desplazamiento en el eje x */
    ::-webkit-scrollbar-x {
        height: 10px;
    }
    </style>

  <style>
    .whatsapp-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 999;
    }

    .whatsapp-btn button {
      padding: 10px 20px;
      background-color: #25d366;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      outline: none;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>

</head>

<body>
  <div class="navegation">
    <div class="frame">

      <span class="itshop">ITSHOP</span>
      <form method="GET" action="index.php" id="searchForm" onsubmit="return verificarUsuarioLogueado()">
        <input type="text" id="busqueda" name="busqueda" class="rectangle">
        <button type="submit" class="icon"></button>
        <input type="hidden" name="idusuario" value="<?php echo isset($idusuario) ? $idusuario : ''; ?>">

        <button type="button" class="frame-1" id="categoriesBtn">
          <div class="menu">
            <div class="icon-2"></div>
          </div>

          <select class="categorias" name="categoriasSelect" id="categoriasSelect" onchange="filtrarPorCategoria()">
            <option value="">Categoría</option>
            <?php
            include 'conexion.php';
            $categorias = getCategorias($dbh);
            foreach ($categorias as $categoria) {
              echo "<option value=\"$categoria\">$categoria</option>";
            }
            ?>
          </select>
        </button>
        <div id="categoriasDropdown" style="display: none;"></div>
      </form>


    
    <!-- Agregar el menú desplegable -->
    <div class="dropdown">
      <div class="user">
        <div class="icon-5"></div>
      </div>
      <div class="dropdown-content">
        <a href="inicio_sesion.html" id="loginBtn"><span class="menu_despliegue">Iniciar sesión</span></a>
        <a href="registrarse.php" id="registerBtn"><span class="menu_despliegue">Registrarse</span></a>
      </div>
      <div class="dropdown-content" id="dropdownContent">
        <a id="profileLink"><span class="menu_despliegue">Ver perfil</span></a>
        <a href="#" id="logoutBtn"><span class="menu_despliegue">Cerrar sesión</span></a>
      </div>


    </div>
    <!-- Fin del menú desplegable -->
    <div class="cart" id="cart">
      <div class="icon-3" onclick="window.location.href = '<?php echo isset($idusuario) ? 'Carrito.php?idusuario=' . $idusuario : 'index.php'; ?>'">

      </div>
    </div>

  </div>
  </div>
  <div class="flex-row-ef">
    <?php
    if (isset($_GET['idusuario'])) {
      $idusuario = $_GET['idusuario'];
      $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
      $categoria = isset($_GET['categoriasSelect']) ? $_GET['categoriasSelect'] : '';

      try {
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (!empty($categoria)) {
          $stmt_especialidad = $dbh->prepare("SELECT idcategorias FROM categorias WHERE LOWER(nombre_categoria) = LOWER(?)");
          $stmt_especialidad->execute([$categoria]);
          $categorias = $stmt_especialidad->fetch(PDO::FETCH_ASSOC);
          $idcategoria = $categorias['idcategorias'] ?? null;

          $query = "SELECT nombre, precio, idproducto, descripcion, datos_usuario_idusuario FROM datos_producto WHERE publicado = 1 AND categorias_idcategorias = ? AND LOWER(descripcion) LIKE LOWER(?) ORDER BY idproducto DESC";
          $stmt_check = $dbh->prepare($query);
          $stmt_check->execute([$idcategoria, '%' . $busqueda . '%']);
        } else {
          $query = "SELECT nombre, precio, idproducto, descripcion, datos_usuario_idusuario FROM datos_producto WHERE publicado = 1 AND LOWER(descripcion) LIKE LOWER(?) ORDER BY idproducto DESC";
          $stmt_check = $dbh->prepare($query);
          $stmt_check->execute(['%' . $busqueda . '%']);
        }

        $productos = $stmt_check->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($productos)) {
          foreach ($productos as $producto) {
            $idproducto = $producto['idproducto'];
            $idvendedor = $producto['datos_usuario_idusuario'];
            $stmt = $dbh->prepare("SELECT nombre_tienda FROM datos_usuario WHERE idusuario = ?");
            $stmt->execute([$idvendedor]);
            $rol_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $nombre_tienda = $rol_row['nombre_tienda'] ?? '';

            $stmt = $dbh->prepare("SELECT ruta_producto FROM products_img WHERE id = ?");
            $stmt->execute([$idproducto]);
            $rol_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $ruta_imagen = $rol_row['ruta_producto'] ?? '';

            // Obtener el tipo de contenido de la imagen
            $info = getimagesize($ruta_imagen);
            $tipo_contenido = $info['mime'];

            // Obtener el contenido de la imagen como base64
            $imagen_codificada = base64_encode(file_get_contents($ruta_imagen));
            $imagen_src = 'data:' . $tipo_contenido . ';base64,' . $imagen_codificada;
            echo "<div class='producto'>";
            echo "<img src=" . $imagen_src . " alt='Imagen' class='rectangle-6' onclick=\"window.location.href='Comentarios.php?idproducto=" . $producto['idproducto'] . "&idusuario=" . $idusuario . "'\">";
            echo "<div class='descripcion'>";
            echo "<span class='cinturon-unisex-moda'>" . $producto['nombre'] . "</span>";
            echo "<span class='mx-150'> MX$" . $producto['precio'] . "</span>";
            echo "</div>";
            echo "<span class='reviews'>" . $nombre_tienda . "</span>";
            echo "</div>";
          }
        } else {
          echo "No se encontraron productos";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    } else {
      echo "<span class='cinturon-unisex-moda'>Inicia Sesión para ver los productos</span>";
    }
    ?>


  </div>



  <div id="overlay">
    <iframe id="registerFrame" frameborder="0"></iframe>
  </div>
  <script src="globales.js"></script>
  <script>
    // Recupera el ID del usuario guardado en sessionStorage
    var idusuario = obtenerIdUsuario();
    var profileLink = document.getElementById("profileLink");
    var logoutBtn = document.getElementById("logoutBtn");
    var carritoicon = document.getElementsByClassName("icon-3")
    var rolUsuario = obtenerRolUsuario();

    // Verifica si se ha guardado el ID del usuario
    if (idusuario) {
      // Haz lo que necesites con el ID del usuario
      console.log("ID del usuario:", idusuario);
      console.log("Rol del usuario:", rolUsuario);

      // Si el rol es 1, muestra el enlace de "Ver perfil" para cliente
      if (rolUsuario === "1") {
        profileLink.href = "GeneralCliente.php?idusuario=" + idusuario; // Cambia el href al perfil del cliente
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        console.log("El usuario tiene rol 1 (cliente)");
      }
      // Si el rol es 2, muestra el enlace de "Ver perfil" para vendedor
      else if (rolUsuario === "2") {
        profileLink.href = "Vendedor_perfil.php?idusuario=" + idusuario; // Cambia el href al perfil del vendedor
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        carritoicon[0].style.display = "none";
        console.log("El usuario tiene rol 2 (vendedor)");
      } else {
        // Si el rol no es 1 ni 2, oculta ambos enlaces
        profileLink.href = "Perfil_admi.php?idusuario=" + idusuario;
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        console.log("El usuario no tiene rol 1 ni 2");
      }
    } else {
      // Si no se ha guardado el ID del usuario, oculta ambos enlaces
      profileLink.style.display = "none";
      logoutBtn.style.display = "none";
      console.log("No se ha guardado el ID del usuario.");
    }


    function redireccionarVerPerfil() {
      // Verificar si tenemos un ID de usuario
      if (idusuario) {
        // Redirigir al usuario a la página de perfil con el ID de usuario como parámetro
        window.location.href = "GeneralCliente.php?idusuario=" + idusuario;
      } else {
        // Si no hay ID de usuario, redirigir sin parámetro
        window.location.href = "GeneralCliente.php";

      }
    }

    function obtenerIdUsuario() {
      return sessionStorage.getItem('idusuario');
    }

    function verificarUsuarioLogueado() {
      var idusuario = "<?php echo isset($idusuario) ? $idusuario : ''; ?>";
      if (!idusuario) {
        alert("Por favor, inicia sesión para realizar una búsqueda o filtrar por categoría.");
        return false; // Evita que el formulario se envíe
      }
      return true;
    }

    function filtrarPorCategoria() {
      var idusuario = "<?php echo isset($idusuario) ? $idusuario : ''; ?>";
      if (!idusuario) {
        alert("Por favor, inicia sesión para realizar una búsqueda o filtrar por categoría.");
        return;
      }

      var selectedCategoria = document.getElementById("categoriasSelect").value;
      var busqueda = document.getElementById("busqueda").value;
      var url = "index.php?idusuario=" + encodeURIComponent(idusuario);

      if (selectedCategoria !== "") {
        url += "&categoriasSelect=" + encodeURIComponent(selectedCategoria);
      }

      if (busqueda !== "") {
        url += "&busqueda=" + encodeURIComponent(busqueda);
      }

      window.location.href = url;
    }

    document.addEventListener("DOMContentLoaded", function() {
      var urlParams = new URLSearchParams(window.location.search);
      var hasSearchParams = urlParams.has('busqueda') || urlParams.has('categoriasSelect');

      if (hasSearchParams) {
        document.getElementById('resetButton').style.display = 'block';
      }

      // Resto del código existente para gestionar la visibilidad de enlaces y perfil
    });

    function resetSearch() {
      var idusuario = "<?php echo isset($idusuario) ? $idusuario : ''; ?>";
      var url = "index.php";
      if (idusuario) {
        url += "?idusuario=" + encodeURIComponent(idusuario);
      }
      window.location.href = url;
    }
  </script>

  <!-- btn pruebsa 
<div class="whatsapp-btn">
    <a href="https://wa.me/52'.$telefono[0]['TELEFONO'].'" target="_blank">
      <button>WHATSAPP</button>
    </a>
  </div>

-->


</body>

</html>
