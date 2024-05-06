<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <style>
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
            width: 705px;
            height: 629px;
            margin: 0 auto;
            background: #fff5f4;
            overflow: hidden;
            border-radius: 30px;
        }

        .wrapper {
            position: absolute;
            width: 171px;
            height: 352px;
            top: 17px;
            left: 29px;
            font-size: 0px;
            z-index: 13;
        }

        .text {
            display: block;
            position: relative;
            height: 30px;
            margin: 0 0 0 0;
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
            height: 21px;
            margin: 201px 0 0 24px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 6;
        }

        .text-3 {
            display: block;
            position: relative;
            height: 21px;
            margin: 60px 0 0 10px;
            /* Ajusta este valor según sea necesario */
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .text-30 {
            display: block;
            position: relative;
            height: 21px;
            margin: 60px 0 0 10px;
            /* Ajusta este valor según sea necesario */
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .text-4 {
            display: block;
            position: relative;
            height: 21px;
            margin: 50px 0 0 60px;
            /* He aumentado el margen superior a 50px */
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .box {
            position: absolute;
            width: 451px;
            height: 516px;
            top: 74px;
            left: 202px;
            z-index: 14;
        }

        .box-2 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 177px;
            margin: 90px 0 0 400px;
            /* Ajusta este margen según sea necesario */
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 14;
            overflow: hidden;
            border-radius: 30px;
        }

        .upload-button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 177px;
            margin: 90px 0 0 400px;
            /* Ajusta este margen según sea necesario */
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 14;
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
            z-index: 15;
        }

        .group {
            position: relative;
            width: 24px;
            height: 24px;
            margin: 61px 0 0 209px;
            z-index: 2;
            overflow: hidden;
        }

        .pic {
            position: relative;
            width: 15px;
            height: 8px;
            margin: 8px 0 0 3px;
            background: url(./assets/images/aa2d3cad-7f8e-438a-9c6f-3aa866d6f708.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 3;
        }

        .img {
            position: relative;
            width: 401px;
            height: 32px;
            margin: 48px 0 0 0;
            background: url(./assets/images/fbf711fa-d0a2-45ca-9e06-b78d19a8b8d1.png) no-repeat center;
            background-size: cover;
            z-index: 7;
        }

        .box-3 {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
            gap: 9px;
            position: relative;
            width: 121px;
            height: 30px;
            margin: 21px 0 0 0;
            padding: 10px 12px 10px 12px;
            background: #ffffff;
            border: 1px solid #8d2d2c;
            z-index: 9;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 1px 2px 0 rgba(16, 24, 40, 0.05);
        }

        .box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            flex-shrink: 0;
            gap: 40px;
            position: relative;
            width: 119px;
            padding: 6px 25px 6px 30px;
            background: #8d2d2c;
            z-index: 4;
            overflow: hidden;
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
            z-index: 5;
        }

        .group-2 {
            flex-shrink: 0;
            position: relative;
            width: 20px;
            height: 20px;
            z-index: 11;
            overflow: hidden;
        }

        .img-2 {
            position: relative;
            width: 16.667px;
            height: 18.333px;
            margin: 0.83px 0 0 1.667px;
            background: url(./assets/images/0cb8da7d-fd6e-4329-8ccb-a97f7bd2f739.png) no-repeat center;
            background-size: 100% 100%;
            z-index: 12;
        }

        .pic-2 {
            position: relative;
            width: 401px;
            height: 32px;
            margin: 20px 0 0 0;
            background: url(./assets/images/c8bafee0-38d9-4cfb-b6c7-5b5b9f8f80c5.png) no-repeat center;
            background-size: cover;
            z-index: 8;
        }

        .wrapper-2 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 10px;
            position: relative;
            width: 120px;
            margin: 182px 0 0 331px;
            padding: 6px 25px 6px 25px;
            background: #8d2d2c;
            z-index: 4;
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
            z-index: 5;
        }

        .user-number-container {
            display: inline-block;
            margin-left: 190px;
            /* Ajusta este margen según sea necesario */
            margin-top: -55px;
            /* Ajusta este margen según sea necesario */
            padding: 5px 10px;
            background-color: #f5f5f5;
            border: 1px solid #8d2d2c;
            border-radius: 5px;
            width: 180px;
            /* Ancho del contenedor */
            height: 38px;
            /* Altura del contenedor */
        }

        .user-number-input {
            margin-left: 0;
            margin-top: 0;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            font-family: Outfit, var(--default-font-family);
            font-size: 16px;
            color: #311811;
            width: calc(100% - 40px);
        }


        .date-container {
            display: inline-block;
            margin-left: 190px;
            margin-top: -80px;
            padding: 5px 10px;
            background-color: #f5f5f5;
            border: 1px solid #8d2d2c;
            border-radius: 5px;
        }

        .date-input {
            padding: 5px;
            border: none;
            border-radius: 3px;
            font-family: Outfit, var(--default-font-family);
            font-size: 16px;
            color: #311811;
        }

        .rectangle-3 {
            width: 290px;
            /* Ancho del rectángulo */
            margin: 0px auto 20px 190px;
            /* Margen superior, derecho e inferior ajustados y margen izquierdo */
            background-color: #fff5f4;
            /* Color de fondo */
            padding: 8px;
            /* Relleno */
            border-radius: 8px;
            /* Redondeo de las esquinas */
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            /* Sombra */
        }

        .rectangle-2 {
            width: 290px;
            /* Ancho del rectángulo */
            margin: -50px auto 30px 190px;
            /* He disminuido el margen superior a -50px */
            background-color: #fff5f4;
            /* Color de fondo */
            padding: 8px;
            /* Relleno */
            border-radius: 8px;
            /* Redondeo de las esquinas */
            box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.3);
            /* Sombra */
        }


        .role {
            display: block;
            margin: 0 0 10px auto;
            /* Margen izquierdo ajustado */
            font-family: Outfit, var(--default-font-family);
            color: #321811;
        }

        .role-input {
            width: calc(100% - 80px);
            /* Ancho del campo de entrada */
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .text-10 {
            display: block;
            position: relative;
            height: 21px;
            margin: 30px 0 0 10px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 1;
        }

        .espe {
            display: block;
            margin: -10 0 10px auto;
            /* Margen izquierdo ajustado */
            font-family: Outfit, var(--default-font-family);
            color: #321811;
        }

        .espe-input {
            width: calc(100% - 80px);
            /* Ancho del campo de entrada */
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .add-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 130px;
            height: 40px;
            background-color: #8d2d2c;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 50px;
            /* Ajuste para bajar el botón */
            margin-left: 40px;
        }

        .add-button:hover {
            background-color: #a33b39;
        }


        .cancel-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 130px;
            height: 40px;
            background-color: #8d2d2c;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin-top: 40px;
        }

        .cancel-button:hover {

            background-color: #a33b39;
        }

        .wrapper-4 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: absolute;
            width: 309px;
            height: 33px;
            top: 400px;
            left: -100;
            z-index: 6;
            gap: 100px;
            margin-top: 60px;
        }

        /* Ajustes para posicionar los botones */
        .wrapper-4 .cancel-button {
            margin-right: auto;
            /* Mover el botón a la izquierda */
        }

        .wrapper-4 .add-button {
            margin-left: auto;
            /* Mover el botón a la derecha */
            margin-top: -20px;
            /* Ajustar el margen superior para subir el botón */
        }
    </style>
</head>

<body>
    <form action="Editar_perfil_usuario.php" method="POST" enctype="multipart/form-data">
        <div class="main-container">
            <div class="wrapper">
                <span class="text">Editar Perfil</span>
                <!-- Cambié la clase box-2 por upload-button para mayor claridad -->
                <div class="upload-button" style="margin-top: 150px;">
                    <!-- Agregamos un input de tipo file oculto -->
                    <input type="file" id="fileInput" style="display: none;" accept="image/*">
                    <span class="text-5" onclick="document.getElementById('fileInput').click();">Cambiar imagen</span>
                </div>

                <span class="text-30" style="margin-top: 120px;">Nombre de usuario:</span>
                <!-- Tu input para el número de usuario -->
                <div class="rectangle-3" style="margin-top: -30px;">
                    <input type="text" class="role-input" placeholder="Ingresar nuevo nombre " />
                </div>
                <span class="text-10">Fecha de nacimiento:</span>
                <!-- Tu input para la fecha de nacimiento -->
                <div class="date-container">
                    <input type="date" class="date-input" />
                </div>


                <div class="wrapper-4">
                    <!-- Botón de compra -->
                    <button class="add-button box"><span class="text-6">Editar</span></button>
                    <!-- Botón de comentar -->
                </div>
            </div>
            <!-- Añade un elemento img para mostrar la imagen -->
            <img id="previewImage" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 20px;">
    </form>
    <script>
        // Función para manejar la carga de archivos
        function handleFileSelect(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                // Asigna la URL de la imagen al atributo src del elemento img
                document.getElementById('previewImage').src = e.target.result;
                // Muestra la imagen
                document.getElementById('previewImage').style.display = 'block';
            }

            reader.readAsDataURL(file);
        }

        // Asigna la función handleFileSelect al evento onchange del input file
        document.getElementById('fileInput').addEventListener('change', handleFileSelect);
        // Función para guardar los datos
        function guardarDatos() {
            // Captura los valores de los campos de entrada
            const userNumber = document.getElementById('userNumber').value;
            const dateOfBirth = document.getElementById('dateOfBirth').value;
  

            // Aquí puedes realizar las operaciones para guardar los datos
            // Por ejemplo, podrías enviarlos a un servidor a través de una solicitud HTTP (POST)
            // o guardarlos localmente en el navegador utilizando localStorage o IndexedDB

            // Por ahora, solo los mostraremos en la consola para propósitos de demostración
            console.log("Número de usuario:", userNumber);
            console.log("Fecha de nacimiento:", dateOfBirth);
            

            // Aquí podrías agregar más lógica según tus necesidades
        }
    </script>
</body>

</html>