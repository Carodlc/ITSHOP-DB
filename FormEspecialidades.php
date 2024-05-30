<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gestionar Especialidades</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&display=swap" />
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
      width: 500px;
      /* Cambiado de 705px a 500px */
      height: 400px;
      /* Cambiado de 629px a 400px */
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
      z-index: 1;
    }

    .img {
      position: relative;
      width: 200px;
      /* Cambiado de 431px a 300px */
      height: 150px;
      /* Cambiado de 360px a 250px */
      margin: 20px 0 0 100px;
      /* Ajustado el margen */
      background: url(./assets/images/a33636ed-31cd-4ffa-9bfc-4a7f294ffaba.png) no-repeat center;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .group {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      flex-wrap: nowrap;
      position: absolute;
      width: 179px;
      height: 190px;
      top: 57px;
      left: 122px;
      padding: 20px 20px 20px 20px;
      z-index: 8;
      overflow: hidden;
      border-radius: 5px;
    }

    .wrapper {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      flex-wrap: nowrap;
      flex-shrink: 0;
      gap: 10px;
      position: relative;
      width: 139px;
      padding: 8px 16px 8px 16px;
      background: #ffffff;
      z-index: 9;
      box-shadow: 0 -1px 0 0 rgba(0, 0, 0, 0.08) inset;
    }

    .text-2 {
      flex-shrink: 0;
      flex-basis: auto;
      position: relative;
      height: 19px;
      color: #000000;
      font-family: Inter, var(--default-font-family);
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      text-align: left;
      white-space: nowrap;
      z-index: 10;
    }

    .wrapper-2 {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      flex-wrap: nowrap;
      flex-shrink: 0;
      gap: 10px;
      position: relative;
      width: 139px;
      height: 35px;
      padding: 0;
      background: #ffffff;
      z-index: 11;
      box-shadow: 0 -1px 0 0 rgba(0, 0, 0, 0.08) inset;
    }

    .group-2 {
      display: flex;
      align-items: flex-start;
      justify-content: center;
      flex-wrap: nowrap;
      flex-shrink: 0;
      gap: 10px;
      position: relative;
      width: 139px;
      height: 35px;
      padding: 0;
      background: #ffffff;
      z-index: 12;
      box-shadow: 0 -1px 0 0 rgba(0, 0, 0, 0.08) inset;
    }

    .text-3 {
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
      position: absolute;
      height: 19px;
      top: 120px;
      left: 158px;
      color: #000000;
      font-family: Inter, var(--default-font-family);
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      text-align: left;
      white-space: nowrap;
      z-index: 13;
    }

    .text-4 {
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
      position: absolute;
      height: 19px;
      top: 155px;
      left: 157px;
      color: #000000;
      font-family: Inter, var(--default-font-family);
      font-size: 16px;
      font-weight: 400;
      line-height: 19px;
      text-align: left;
      white-space: nowrap;
      z-index: 14;
    }

    .wrapper-3 {
      position: relative;
      width: 300px;
      height: 33px;
      margin: -400px auto 0;
      /* Ajuste del margen superior para subir la tabla */
      display: flex;
      justify-content: center;
      z-index: 6;
    }

    .rectangle-3 {
      width: 300px;
      /* Ajustado el ancho del rectángulo */
      margin: 0 auto 10px;
      /* Agregado margen inferior y centrado horizontalmente */
      background-color: #fff5f4;
      /* Cambiado el color del rectángulo */
      padding: 10px;
      /* Aumentado el relleno del rectángulo */
      border-radius: 10px;
      /* Añadido el redondeo de las esquinas */
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
      /* Agregada sombra */
    }


    .role {
      display: block;
      margin: 0 auto 5px;
      /* Centrado horizontalmente y agregado margen inferior */
      font-family: Outfit, var(--default-font-family);
      /* Cambiado el tipo de letra */
      color: #321811;
      /* Cambiado el color del texto */
    }

    .section {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: nowrap;
      gap: 10px;
      position: absolute;
      width: 114px;
      height: 33px;
      top: 0;
      left: 439px;
      padding: 6px 25px 6px 25px;
      background: #8d2d2c;
      z-index: 2;
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
      z-index: 3;
    }

    .wrapper-4 {
      display: flex;
      align-items: center;
      justify-content: space-between;
      /* Ajuste para espaciar los botones */
      position: absolute;
      width: 309px;
      height: 33px;
      top: 400px;
      left: 0;
      z-index: 6;
      gap: 20px;
      /* Espacio entre los botones */
      margin-top: 10px;
      /* Espacio superior */
    }

    .box {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: nowrap;
      flex-shrink: 0;
      gap: 10px;
      position: relative;
      width: 119px;
      padding: 6px 25px 6px 25px;
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

    .box-2 {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: nowrap;
      flex-shrink: 0;
      gap: 10px;
      position: relative;
      width: 101px;
      padding: 6px 25px 6px 25px;
      background: #8d2d2c;
      z-index: 6;
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
      z-index: 7;

    }

    .roles-table {
      margin: 0 auto;
      font-family: Outfit, var(--default-font-family);
      /* Cambiado el tipo de letra */
      color: #321811;
      /* Cambiado el color del texto */
    }
    a {
      color: inherit;
      /* Heredar el color del texto de su contenedor */
      text-decoration: none;
      /* Eliminar subrayado predeterminado */
    }

  </style>
</head>

<body>
  <div class="main-container">
    <span class="text">Especialidades</span>
    <div class="flex-column-fc"></div>
  </div>

  <div class="rectangle-3">
    <span class="role">Especialidad:</span>
    <input type="text" class="role-input" placeholder="Ingresar especialidad" />

  </div>
  <div class="wrapper-3">
    <table class="roles-table">
      <thead>
        <tr>
          <th></th> <!-- Columna para checkboxes -->
          <th>Especialidad</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Tu código de conexión y funciones existentes

        try {
          // Establecer conexión a la base de datos
          $dbh = new PDO($dsn, $username, $password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Obtener roles desde la base de datos
          $especialidades = getEspecialidades($dbh);

          // Si hay roles, generar filas para la tabla
          if (!empty($especialidades)) {
            foreach ($especialidades as $especialidad) {
              echo "<tr>";
              echo "<td><input type='checkbox' name='roles[]' value='$especialidad'></td>"; // Columna de checkboxes
              echo "<td>$especialidad</td>"; // Columna de rol
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='2'>No se encontraron roles</td></tr>";
          }
        } catch (PDOException $e) {
          // Mostrar mensaje de error si la conexión falla
          echo "Error: " . $e->getMessage();
        }
        ?>
      </tbody>
    </table>

    <div class="wrapper-4">
      <button class="add-button box"><span class="text-6">Agregar</span></button>
      <div class="box cancel-button"><span class="text-6"><a href="Perfil_admi.php">Cancelar</span></div></a>
      <div class="box-2"><span class="text-7">Borrar</span></div>
    </div>

    <script>
      const addButton = document.querySelector('.add-button');
const roleInput = document.querySelector('.role-input');
const rolesTableBody = document.querySelector('.roles-table tbody');
const deleteButton = document.querySelector('.box-2');

// Función para agregar una nueva especialidad
addButton.addEventListener('click', () => {
    const roleName = roleInput.value.trim();

    if (roleName) {
        // Realizar una solicitud AJAX para insertar la nueva especialidad en la base de datos
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'form_especialidades_insertar.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Si la inserción es exitosa, actualizar la tabla
                rolesTableBody.innerHTML = xhr.responseText;
            } else {
                console.error('Error al insertar la especialidad');
            }
        };
        xhr.send(`especialidad=${roleName}`);
        roleInput.value = '';
    }
});

// Función para eliminar especialidades seleccionadas
deleteButton.addEventListener('click', () => {
    const checkboxes = document.querySelectorAll('.roles-table tbody input[type="checkbox"]:checked');
    const rolesToDelete = Array.from(checkboxes).map(checkbox => checkbox.value);

    // Realizar una solicitud AJAX para eliminar las especialidades seleccionadas de la base de datos
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'form_especialidades_borrar.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Si la eliminación es exitosa, actualizar la tabla
            rolesTableBody.innerHTML = xhr.responseText;
        } else {
            console.error('Error al borrar las especialidades');
        }
    };
    xhr.send(`especialidades=${JSON.stringify(rolesToDelete)}`);
});
    </script>
</body>

</html>