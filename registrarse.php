<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;800&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
  <style>
    /* Estilos adicionales para el nuevo código */
    body {
      font-family: Outfit, var(--default-font-family);
      margin: 0;
      padding: 0;
    }

    .navbar {
      position: absolute;
      width: 100%;
      /* Set width to 100% to span across the entire page */
      height: 38px;
      top: 0;
      left: 0;
      background: #721918;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .flex-container {
      display: flex;
      justify-content: center;
      align-items: start;
    }

    .left-section {
      flex: 1;
      padding: 20px;
    }

    .right-section {
      flex: 2;
      padding: 20px;
    }

    .profile-pic-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .profile-pic {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-pic-label {
      margin-top: 10px;
      cursor: pointer;
      background-color: #722121;
      color: white;
      padding: 8px 16px;
      border-radius: 4px;
    }

    .form-section {
      margin-bottom: 20px;
    }

    /* Aplicando la fuente Outfit a los labels */
    .form-section label {
      font-family: 'Outfit', var(--default-font-family);
      font-weight: 500;
      margin-bottom: 5px;
    }

    .form-section input[type="text"],
    .form-section input[type="date"],
    .form-section input[type="password"],
    .form-section input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .form-section select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .form-buttons {
      font-family: 'Outfit', var(--default-font-family);
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      width: 556px;
      height: 33px;
      margin: 53px 0 0 78px;
      z-index: 4;
    }

    .form-buttons button {
      font-family: 'Outfit', var(--default-font-family);
      padding: 10px 20px;
      margin: 0 10px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      font-size: 16px;
      font-weight: 500;
    }

    .cancelar-button {
      font-family: 'Outfit', var(--default-font-family);
      background-color: #8d2d2c;
      color: white;
    }

    .registrarse-button {
      background-color: #721918;
      color: white;
    }

    .letra {
      display: flex;
      color: #721918;
      font-family: Outfit, var(--default-font-family);
      font-size: 20px;
      font-weight: 500;
      white-space: nowrap;
    }

    :root {
      --default-font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        Ubuntu, "Helvetica Neue", Helvetica, Arial, "PingFang SC",
        "Hiragino Sans GB", "Microsoft Yahei UI", "Microsoft Yahei",
        "Source Han Sans CN", sans-serif;
    }

    .itshop {
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
      position: absolute;
      height: 62px;
      top: 0;
      left: 69px;
      color: #ffffff;
      font-family: Readex Pro, var(--default-font-family);
      font-size: 40px;
      font-weight: 500;
      line-height: 50px;
      text-align: left;
      white-space: nowrap;
      letter-spacing: -6.4px;
      z-index: 29;
    }

    a {
      color: inherit;
      /* Heredar el color del texto de su contenedor */
      text-decoration: none;
      /* Eliminar subrayado predeterminado */
    }

    .registro-itshop {
      display: flex;
      color: #721918;
      font-family: Outfit, var(--default-font-family);
      font-size: 20px;
      margin-top: 30px;
      font-weight: 800;
      white-space: nowrap;
      z-index: 30;
      margin-bottom: 50px;
      /* Ajusta este valor según sea necesario */
    }

    #tienda-name-section {
      display: none;
    }
  </style>
</head>

<body>

  <form id="form" action="insertar_usuario.php" method="post" enctype="multipart/form-data">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;800&display=swap" />
    <div class="navbar">
      <!-- Aquí puedes agregar el contenido de tu barra de navegación -->
      <span class="itshop">ITSHOP</span>
    </div>
    <div class="container">
      <div class="flex-container">
        <div class="left-section">
          <div class="form-section">
            <span class="registro-itshop">Registro | ITSHOP</span>
          </div>

          <div class="profile-pic-container">
            <img src="/fotos/default-profile-pic.jpg" alt="Profile Picture" class="profile-pic" id="profilePreview">
            <label for="imagen" class="profile-pic-label">Seleccionar imagen</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" style="display: none;" required>
          </div>
        </div>
        <div class="right-section">
          <div class="form-section">
            <label for="Vacio"></label>
          </div>
          <div class="form-section">
            <label for="nombre" class="letra">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
          </div>
          <div class="form-section">
            <label for="fecha-nacimiento" class="letra">Fecha de nacimiento:</label>
            <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" required>
          </div>
          <div class="form-section">
            <label for="especialidad" class="letra">Especialidad:</label>
            <select name="especialidad" id="especialidad" required>
              <option>Seleccionar especialidad</option>
              <?php
              $especialidades = getEspecialidades($dbh);
              foreach ($especialidades as $especialidad) {
                echo "<option value=\"$especialidad\">$especialidad</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-section">
            <label for="password" class="letra">Contraseña:</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div class="form-section">
            <label for="confirm-password" class="letra">Confirmar contraseña:</label>
            <input type="password" id="confirm-password" name="confirm-password">
          </div>
          <div class="form-section">
            <label for="email" class="letra">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-section">
            <label for="roles" class="letra">Rol:</label>
            <select name="roles" id="roles" required onchange="toggleTiendaSection()">
              <option>Seleccionar rol</option>
              <option value="cliente">CLIENTE</option>
              <option value="vendedor">VENDEDOR</option>
            </select>
          </div>

          <div class="form-section" id="tienda-name-section">
            <label for="tienda-name" class="letra">Nombre de la tienda:</label>
            <input type="text" id="tienda-name" name="tienda-name" value="Nombre por defecto" required>
          </div>

          <div class="form-buttons">
            <button onclick="window.location.href = 'index.php'" class="cancelar-button" class="letra" id="atrasBtn">Atrás</button>
            <button type="submit" class="registrarse-button" id="registrarse-button">Registrarse</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      function openFileExplorer() {
      document.getElementById('imagen').click();
    }

    const inputImagen = document.getElementById('imagen');
    const profilePreview = document.getElementById('profilePreview');

    inputImagen.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          profilePreview.src = reader.result;
        }
        reader.readAsDataURL(file);
      } else {
        profilePreview.src = '/fotos/default-profile-pic.jpg';
      }
    });


     

      function toggleTiendaSection() {
        var rolesDropdown = document.getElementById("roles");
        var tiendaSection = document.getElementById("tienda-name-section");

        if (rolesDropdown.value === "vendedor") {
          tiendaSection.style.display = "block";
        } else {
          tiendaSection.style.display = "none";
        }
      }
    </script>

  </form>
</body>

</html>