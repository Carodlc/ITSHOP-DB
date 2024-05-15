<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&display=swap" />
    <link rel="stylesheet" href="AgregarProduto.css" />
    <style>
        #preview {
            position: absolute;
            top: 70px;
            /* Ajuste de la posición vertical */
            left: 65px;
            /* Ajuste de la posición horizontal */
            width: 225px;
            /* Ancho de la imagen previa */
            height: auto;
        }

        .publish {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: absolute;
            height: 21px;
            top: 20px;
            left: 510px;
            color: #311811;
            font-family: Outfit, var(--default-font-family);
            font-size: 17px;
            font-weight: 400;
            line-height: 21px;
            text-align: left;
            white-space: nowrap;
            z-index: 4;
        }

        .rectangle {
            display: none;
            /* Ocultar el recuadro */
        }

        .categoria-label {
            position: absolute;
            top: 115px;
            /* Ajuste de la posición vertical */
            left: 245px;
            /* Ajuste de la posición horizontal */
            color: black;
            font-family: 'Outfit', var(--default-font-family);
            /* Establecer el mismo tipo de letra */
        }

        .categoria-select {
            position: absolute;
            top: 115px;
            /* Ajuste de la posición vertical */
            left: 330px;
            /* Ajuste de la posición horizontal */
        }

        /* Estilos para el combobox */
        #categoria {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #800000;
            /* Color guinda */
            color: white;
            /* Texto en color blanco */
            padding: 5px 30px 5px 10px;
            /* Espaciado interior */
            border: none;
            /* Borde */
            border-radius: 5px;
            /* Borde redondeado */
        }

        /* Estilos para las opciones */
        #categoria option {
            background-color: #800000;
            /* Color guinda */
            color: white;
            /* Texto en color blanco */
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form id="form" action="Editar_producto.php" method="post" enctype="multipart/form-data">
        <div class="navbar">
            <!-- Aquí puedes agregar el contenido de tu barra de navegación -->
            <span class="itshop">ITSHOP</span>
        </div>
        <?php

        if (isset($_GET['idProducto'])) {
            // Obtener el valor de 'idProducto'
            $idProducto = $_GET['idProducto'];
        } else {
            // Si no se pasó el parámetro 'idProducto' en la URL
            echo "No se ha especificado un ID de producto.";
        }

        // Obtener la ruta de la imagen del producto específico
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

        $query = "SELECT * FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?";

        $stmt = $dbh->prepare($query);

        // Ejecutar la consulta pasando el IDUSUARIO como parámetro
        $stmt->execute([$idProducto]);

        // Obtener los resultados como un arreglo asociativo
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);



        $IDESPECIALIDAD = $datos[0]['CATEGORIAS_IDCATEGORIAS'];
        $stmt_especialidad = $dbh->prepare("SELECT NOMBRE_CATEGORIA FROM CATEGORIAS WHERE IDCATEGORIAS = ?");
        $stmt_especialidad->execute([$IDESPECIALIDAD]);
        $especialidad_row = $stmt_especialidad->fetch(PDO::FETCH_ASSOC);
        $CATEGORIAS_IDCATEGORIAS = $especialidad_row['NOMBRE_CATEGORIA'] ?? null;



        ?>

        <div class="main-container">
            <div class="flex-row-acc">
                <span class="add-product">Editar producto</span>
                <span class="publish">Publicar</span>
                <label class="switch">
                    <input type="hidden" name="switchDisplay" value="off">
                    <input type="checkbox" id="switchDisplay" name="switchDisplay" value="on" <?php echo ($datos[0]['PUBLICADO'] == 1) ? "checked" : ""; ?>>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="flex-row-de">
                <span class="nombre">Nombre:</span>
                <div class="input">
                    <input type="text" id="nombreInput" name="nombre" placeholder="Introduce el nombre" value="<?php echo $datos[0]['NOMBRE']; ?>" style="border: none !important" required />
                </div>
                <div class="rectangle"></div> <!-- Este recuadro se ocultará -->
                <span class="precio">Precio:</span>
                <div class="input-1">
                    <input type="number" id="precioInput" name="precio" placeholder="Introduce Precio" style="border: none !important" min="0" value="<?php echo $datos[0]['PRECIO']; ?>" required />
                </div>

                <span class="stock-0">Stock: <?php echo $datos[0]['STOCK']; ?></span>
                <span class="categoria-label">Categoría:</span>
                <!-- Cambio el botón por un combobox -->
                <div class="custom-select categoria-select">
                    <select id="categoria" name="categoria" required>
                        <option value="<?php echo $CATEGORIAS_IDCATEGORIAS; ?>"><?php echo $CATEGORIAS_IDCATEGORIAS; ?></option>
                        <?php
                        $categorias = getcategorias($dbh);
                        foreach ($categorias as $categoria) {
                            echo "<option value=\"$categoria\">$categoria</option>";
                        }
                        ?>
                    </select>
                </div>
                <label for="uploadBtn" class="frame-3">
                    <span class="upload-photo">Subir foto</span>
                </label>
                <input type="file" id="uploadBtn" style="display:none" name="imagen">
            </div>

            <span class="description">Descripción:</span>

            <div class="rectangle-4">
                <textarea id="descripcion" name="descripcion" placeholder="Agrega una descripción.." style="border: none !important;" required maxlength="100"><?php echo $datos[0]['DESCRIPCION']; ?></textarea>
                <div id="warningMessage" class="warn" style="display: none; color: red;">You have exceeded the maximum character limit.</div>
            </div>

            <!-- Vista previa de la imagen -->

            <img src="<?php echo $imagen_src; ?>" id="preview" alt="Vista previa" ">
            <input type=" hidden" name="idProducto" value="<?php echo $idProducto = $_GET['idProducto']; ?>" style="display: none;">
            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario = $_GET['idUsuario']; ?>">



            <div class="flex-row-dc">
                <button class="frame-5">
                    <a href="GestionProductos.php?idUsuario=<?php echo $idUsuario; ?>" class="return">Regresar</a>
                </button>
                <button type="submit" class="frame-6">
                    <span class="save" id="guardar-button">Guardar</span>
                </button>
            </div>

        </div>
    </form>
    <script>
        document.getElementById('switchDisplay').addEventListener('change', function() {
            var switchValue = this.checked ? 1 : 0;
            console.log("Valor del interruptor:", switchValue);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('preview').style.display = 'block'; // Mostrar la imagen previa
                }

                reader.readAsDataURL(input.files[0]); // convertir a base64
            }
        }


        document.getElementById('uploadBtn').addEventListener('change', function() {
            readURL(this);
        });

        function checkLength(textarea) {
            var warningMessage = document.getElementById("warningMessage");
            if (textarea.value.length >= 100) {
                textarea.value = textarea.value.substring(0, 100); // Trim the text to 100 characters
                warningMessage.style.display = "block"; // Show the warning message
            } else {
                warningMessage.style.display = "none"; // Hide the warning message if characters are within limit
            }
        }

        // Add event listener to trigger checkLength() function when textarea content changes
        document.getElementById('descripcion').addEventListener('input', function() {
            checkLength(this);
        });
    </script>
</body>

</html>