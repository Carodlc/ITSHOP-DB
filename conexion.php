<?php
// Oracle database connection parameters
$hostname = 'itshopp.azurewebsites.net'; // Replace with your Oracle database hostname
$username = 'admindba'; // Replace with your Oracle database username
$password = 'ITSHOP$24'; // Replace with your Oracle database password
$dbname = "ITSHOP";

// Construct the data source name (DSN) for PDO
$dsn = "mysql:host=$hostname;dbname=$dbname;charset=utf8";

try {
    // Establish a connection to the MySQL database using PDO
    $dbh = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connection successful, display a message
    echo "Connection successful!";
} catch (PDOException $e) {
    // Connection failed, display an error message
    echo "Connection failed: " . $e->getMessage();
}

// Function to insert data into a table
function insertData($dbh, $table, $columns, $values) {
    // Build the INSERT INTO statement
    $query = "INSERT INTO $table (" . implode(", ", $columns) . ") VALUES (" . str_repeat("?,", count($columns) - 1) . "?)";

    // Prepare the statement
    $stmt = $dbh->prepare($query);

    // Execute the statement with the provided values
    $stmt->execute($values);

    // Return the number of rows affected
    return $stmt->rowCount();
}

// Function to fetch roles from database
function getRoles($dbh) {
    $query = "SELECT NOMBREROL FROM ROL";
    $stmt = $dbh->query($query);
    $roles = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $roles;
}

// Function to fetch especialidades from database
function getEspecialidades($dbh) {
    $query = "SELECT NOMBREESPECIALIDAD FROM ESPECIALIDADES";
    $stmt = $dbh->query($query);
    $especialidades = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $especialidades;
}

// Function to fetch categories from database
function getCategorias($dbh) {
    $query = "SELECT nombre_categoria FROM categorias";
    $stmt = $dbh->query($query);
    $categorias = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $categorias;
}

// Function to fetch product names from database
function getNombreProductos($dbh) {
    $query = "SELECT NOMBRE FROM DATOS_PRODUCTO";
    $stmt = $dbh->query($query);
    $categorias = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $categorias;
}

// Function to fetch products from database
function getProductos($dbh) {
    $query = "SELECT nombre, precio,idproducto FROM datos_producto WHERE publicado = 1 ORDER BY idproducto DESC";

    $stmt = $dbh->query($query);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

// Function to fetch user data by ID
function getUsuario($dbh, $IDUSUARIO) {
    $query = "SELECT * FROM DATOS_USUARIO WHERE IDUSUARIO = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$IDUSUARIO]);
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $datos;
}

// Function to fetch orders by user ID
function getPedidos($dbh, $IDUSUARIO) {
    $query = "SELECT IDPEDIDO, FECHA FROM PEDIDO WHERE IDUSUARIOVENDEDOR = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$IDUSUARIO]);
    $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $pedidos;
}

// Function to fetch role ID by user ID
function obtenerRolPorIdUsuario($dbh, $idUsuario) {
    $query = "SELECT ROL_IDROL FROM DATOS_USUARIO WHERE IDUSUARIO = :idUsuario";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($resultado) {
        return $resultado['ROL_IDROL'];
    } else {
        return null; // Return null or handle the case where no role is found
    }
}
?>
