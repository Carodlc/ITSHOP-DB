<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ITSHOP</title>
  <script src="Globales.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;800&display=swap" />
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <div class="navegation">
    <div class="frame">

      <span class="itshop">ITSHOP</span>

      <input type="text" id="busqueda" name="busqueda" class="rectangle" required>
      <div class="search">
        <div class="icon"></div>
      </div>
      <button class="frame-1" id="categoriesBtn">
        <div class="menu">
          <div class="icon-2"></div>
        </div>

        <select class="categorias" name="categoriasSelect" id="categoriasSelect" required>
          <option>Categoría</option>
          <!-- Aquí puedes agregar las opciones de categorías desde PHP -->
          <?php
          include 'conexion.php';
          $categorias = getCategorias($dbh); // Suponiendo que tienes una función para obtener las categorías desde la base de datos
          foreach ($categorias as $categoria) {
            echo "<option value=\"$categoria\">$categoria</option>";
          }
          ?>
        </select>
      </button>
      <div id="categoriasDropdown" style="display: none;">

      </div>
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
          <a  id="profileLink"><span class="menu_despliegue">Ver perfil</span></a>
          <a href="#" id="logoutBtn"><span class="menu_despliegue">Cerrar sesión</span></a>
        </div>


      </div>
      <!-- Fin del menú desplegable -->
      <div class="cart">
        <div class="icon-3"></div>
      </div>
      <div class="notification">
        <div class="icon-4"></div>
      </div>
    </div>
  </div>
  <div class="flex-row-ef">
    <?php
    // Tu código de conexión y funciones existentes

    try {
      // Establecer conexión a la base de datos
      $dbh = new PDO($dsn, $username, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Obtener productos desde la base de datos
      $productos = getProductos($dbh);

      // Si hay productos, generar instancias de producto
      if (!empty($productos)) {
        foreach ($productos as $producto) {
          echo "<div class='producto'>";
          echo "<div class='rectangle-6'></div>";
          echo "<div class='descripcion'>";
          echo "<span class='cinturon-unisex-moda'>" . $producto['NOMBRE'] . "</span>";
          echo "<span class='mx-150'> MX$" . $producto['PRECIO'] . "</span>";
          echo "<div class='estrellas-container'>"; // Contenedor adicional para las estrellas
          // Aquí puedes generar las estrellas para el producto

          echo "<div class='estrellas'></div>";
          

          echo "</div>";
          echo "<span class='reviews'>(# reviews)</span>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "No se encontraron productos";
      }
    } catch (PDOException $e) {
      // Mostrar mensaje de error si la conexión falla
      echo "Error: " . $e->getMessage();
    }
    ?>
  </div>


  <div id="overlay">
    <iframe id="registerFrame" frameborder="0"></iframe>
  </div>
  <script src="globales.js"></script>
  <script>
    // Recupera el ID del usuario guardado en sessionStorage
    var idUsuario = obtenerIdUsuario();
    var profileLink = document.getElementById("profileLink");
    var logoutBtn = document.getElementById("logoutBtn");
    var rolUsuario = obtenerRolUsuario();

    // Verifica si se ha guardado el ID del usuario
    if (idUsuario) {
      // Haz lo que necesites con el ID del usuario
      console.log("ID del usuario:", idUsuario);
      console.log("Rol del usuario:", rolUsuario);

      // Si el rol es 1, muestra el enlace de "Ver perfil" para cliente
      if (rolUsuario === "1") {
        profileLink.href = "GeneralCliente.html"; // Cambia el href al perfil del cliente
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        console.log("El usuario tiene rol 1 (cliente)");
      }
      // Si el rol es 2, muestra el enlace de "Ver perfil" para vendedor
      else if (rolUsuario === "2") {
        profileLink.href = "Vendedor_perfil.html"; // Cambia el href al perfil del vendedor
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        console.log("El usuario tiene rol 2 (vendedor)");
      } else {
        // Si el rol no es 1 ni 2, oculta ambos enlaces
        profileLink.style.display = "none";
        logoutBtn.style.display = "none";
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
        if (idUsuario) {
            // Redirigir al usuario a la página de perfil con el ID de usuario como parámetro
            window.location.href = "GeneralCliente.php?idUsuario=" + idUsuario;
        } else {
            // Si no hay ID de usuario, redirigir sin parámetro
            window.location.href = "GeneralCliente.html";
       
          }
    }
   
    
    
    

  </script>

</body>

</html>