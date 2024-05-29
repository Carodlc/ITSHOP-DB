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
