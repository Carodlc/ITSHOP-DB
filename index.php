<!DOCTYPE html>
<html lang="en">
<?php
// Tu código de conexión y funciones existentes
if (isset($_GET['idUsuario'])) {
  // Obtener el valor de 'idUsuario'
  $idUsuario = $_GET['idUsuario'];
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

      <input type="text" id="busqueda" name="busqueda" class="rectangle" required>
      <div class="search">
        <div class="icon"></div>
      </div>
      <button class="frame-1" id="categoriesBtn">
        <div class="menu">
          <div class="icon-2"></div>
        </div>

        <select class="categorias" name="categoriasSelect" id="categoriasSelect" onchange="filtrarPorCategoria()" required>
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
          <a id="profileLink"><span class="menu_despliegue">Ver perfil</span></a>
          <a href="#" id="logoutBtn"><span class="menu_despliegue">Cerrar sesión</span></a>
        </div>


      </div>
      <!-- Fin del menú desplegable -->
      <div class="cart" id="cart">
        <div class="icon-3" onclick="window.location.href = '<?php echo isset($idUsuario) ? 'Carrito.php?idUsuario=' . $idUsuario : 'index.php'; ?>'">

        </div>
      </div>

    </div>
  </div>
  <div class="flex-row-ef">
    <?php
    // Tu código de conexión y funciones existentes
    if (isset($_GET['idUsuario'])) {
      // Obtener el valor de 'idUsuario'
      $idUsuario = $_GET['idUsuario'];
      try {
        // Establecer conexión a la base de datos
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener productos desde la base de datos
        $productos = getProductos($dbh);

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
            echo "<div class='producto'>";
            echo "<img src=" . $imagen_src . " alt='Imagen' class='rectangle-6'onclick=\"window.location.href='Comentarios.php?idProducto=" . $producto['IDPRODUCTO'] . "&idUsuario=" . $idUsuario . "'\">";
            echo "<div class='descripcion'>";
            echo "<span class='cinturon-unisex-moda'>" . $producto['NOMBRE'] . "</span>";
            echo "<span class='mx-150'> MX$" . $producto['PRECIO'] . "</span>";

            echo "</div>";
            echo "</div>";
            $query = "SELECT TELEFONO,IDUSUARIO FROM DATOS_USUARIO WHERE IDUSUARIO = " . $idUsuario . "";

            $stmt = $dbh->query($query);
            $telefono = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
          }
        } else {
          echo "No se encontraron productos";
        }
      } catch (PDOException $e) {
        // Mostrar mensaje de error si la conexión falla
        echo "Error: " . $e->getMessage();
      }

      echo '<div class="whatsapp-btn">';
      echo '<a href="https://wa.me/52'.$telefono[0]['TELEFONO'].'" target="_blank">';
      echo '  <button>WHATSSAP</button>';
      echo '</a>';
    echo '</div>';

      // Ahora puedes utilizar la variable $idUsuario como quieras en esta página
    } else {
      // Si no se pasó el parámetro 'idUsuario' en la URL
      try {
        // Establecer conexión a la base de datos
        $dbh = new PDO($dsn, $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener productos desde la base de datos
        $productos = getProductos($dbh);

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
            echo "<div class='producto'>";
            echo "<img src=" . $imagen_src . " alt='Imagen' class='rectangle-6'onclick=\"window.location.href='Comentarios.php?idProducto=" . $producto['IDPRODUCTO'] . "'\">";
            echo "<div class='descripcion'>";
            echo "<span class='cinturon-unisex-moda'>" . $producto['NOMBRE'] . "</span>";
            echo "<span class='mx-150'> MX$" . $producto['PRECIO'] . "</span>";

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
    var carritoicon = document.getElementsByClassName("icon-3")
    var rolUsuario = obtenerRolUsuario();

    // Verifica si se ha guardado el ID del usuario
    if (idUsuario) {
      // Haz lo que necesites con el ID del usuario
      console.log("ID del usuario:", idUsuario);
      console.log("Rol del usuario:", rolUsuario);

      // Si el rol es 1, muestra el enlace de "Ver perfil" para cliente
      if (rolUsuario === "1") {
        profileLink.href = "GeneralCliente.php?idUsuario=" + idUsuario; // Cambia el href al perfil del cliente
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        console.log("El usuario tiene rol 1 (cliente)");
      }
      // Si el rol es 2, muestra el enlace de "Ver perfil" para vendedor
      else if (rolUsuario === "2") {
        profileLink.href = "Vendedor_perfil.php?idUsuario=" + idUsuario; // Cambia el href al perfil del vendedor
        profileLink.style.display = "block";
        logoutBtn.style.display = "block";
        carritoicon[0].style.display = "none";
        console.log("El usuario tiene rol 2 (vendedor)");
      } else {
        // Si el rol no es 1 ni 2, oculta ambos enlaces
        profileLink.href = "Perfil_admi.php?idUsuario=" + idUsuario;
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
      if (idUsuario) {
        // Redirigir al usuario a la página de perfil con el ID de usuario como parámetro
        window.location.href = "GeneralCliente.php?idUsuario=" + idUsuario;
      } else {
        // Si no hay ID de usuario, redirigir sin parámetro
        window.location.href = "GeneralCliente.php";

      }
    }

  function filtrarPorCategoria() {
    var selectedCategoria = document.getElementById("categoriasSelect").value;
    if (selectedCategoria !== "") {
      window.location.href = "index.php?idUsuario=<?php echo isset($idUsuario) ? $idUsuario : ''; ?>&categoria=" + encodeURIComponent(selectedCategoria);
    } else {
      // Si no se selecciona ninguna categoría, redirecciona a la página sin el parámetro 'categoria'
      window.location.href = "index.php?idUsuario=<?php echo isset($idUsuario) ? $idUsuario : ''; ?>";
    }
  }


  </script>

    <!-- btn pruebsa --> 


</body>

</html>