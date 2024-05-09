<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agregar Producto</title>
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
  </style>
</head>

<body>
  <form id="form" action="AgregarProducto_insertar.php" method="post" enctype="multipart/form-data">
    <div class="navbar">
      <!-- Aquí puedes agregar el contenido de tu barra de navegación -->
      <span class="itshop">ITSHOP</span>
    </div>
    <div class="main-container">
      <div class="flex-row-acc">
        <span class="add-product">Agregar producto</span>
        <span class="publish">Publicar</span>
        <label class="switch">
          <input type="hidden" id="switchInput" value="0">
          <input type="checkbox" id="switchDisplay" required>
          <span class="slider"></span>
        </label>
      </div>

      <div class="flex-row-de">
        <span class="nombre">Nombre:</span>
        <div class="input">
          <input type="text" id="nombreInput" placeholder="Introduce el nombre" style="border: none !important" required/>
        </div>
        <div class="rectangle"></div> <!-- Este recuadro se ocultará -->
        <span class="precio">Precio:</span>
        <div class="input-1">
          <input type="number" id="precioInput" placeholder="Introduce Precio" style="border: none !important" min="0" required/>
        </div>

        <span class="stock-0">Stock: 0</span>
        <span class="categoria-label">Categoría:</span>
        <!-- Cambio el botón por un combobox -->
        <div class="custom-select categoria-select">
          <select id="categoria" required>
            <option value="Default">Selecciona categoria</option>
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
        <input type="file" id="uploadBtn" style="display:none" required>
      </div>

      <span class="description">Descripción:</span>

      <div class="rectangle-4">
        <textarea id="descripcion" placeholder="Agrega una descripción.." style="border: none !important;" required></textarea>
      </div>

      <!-- Vista previa de la imagen -->
      <img id="preview" src="#" alt="Vista previa" style="display: none;">

      <div class="flex-row-dc">
        <button class="frame-5"><span class="return">Regresar</span></button>
        <button type="submit" class="frame-6"><span class="save" id="guardar-button">Guardar</span></button>
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
  </script>
</body>

</html>