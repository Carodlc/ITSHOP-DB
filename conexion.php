<?php
// Oracle database connection parameters
$hostname = 'localhost'; // Replace with your Oracle database hostname
$service_name = 'XE'; // Replace with your Oracle database service name
$username = 'ITSHOP'; // Replace with your Oracle database username
$password = 'ITS'; // Replace with your Oracle database password

// Construct the data source name (DSN) for PDO
$dsn = "oci:dbname=(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$hostname)(PORT=1522)))(CONNECT_DATA=(SID=$service_name)))";

try {
    // Establish a connection to the Oracle database using PDO
    $dbh = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connection successful, display a message
    
} catch (PDOException $e) {
    // Connection failed, display an error message
    echo "Connection failed: " . $e->getMessage();
}
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

function getCategorias($dbh) {
    $query = "SELECT NOMBRE_CATEGORIA FROM CATEGORIAS";
    $stmt = $dbh->query($query);
    $categorias = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $categorias;
}

function getNombreProductos($dbh) {
    $query = "SELECT NOMBRE FROM DATOS_PRODUCTO WHERE ";
    $stmt = $dbh->query($query);
    $categorias = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $categorias;
}
function getProductos($dbh) {
    $query = "SELECT NOMBRE, PRECIO FROM DATOS_PRODUCTO ORDER BY IDPRODUCTO DESC";

    $stmt = $dbh->query($query);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getPedidos($dbh, $IDUSUARIO) {
    // Consulta SQL para obtener los pedidos asociados al IDUSUARIO
    $query = "SELECT IDPEDIDO, FECHA FROM PEDIDO WHERE IDUSUARIOVENDEDOR = ?";
    
    // Preparar la consulta
    $stmt = $dbh->prepare($query);
    
    // Ejecutar la consulta pasando el IDUSUARIO como parámetro
    $stmt->execute([$IDUSUARIO]);
    
    // Obtener los resultados como un arreglo asociativo
    $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retornar los resultados
    return $ventas;
}



function obtenerRolPorIdUsuario($dbh, $idUsuario) {
    $query = "SELECT ROL_IDROL FROM DATOS_USUARIO WHERE IDUSUARIO = :idUsuario";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($resultado) {
        return $resultado['ROL_IDROL'];
    } else {
        // En caso de que el usuario no exista o no tenga un rol asignado, puedes retornar un valor por defecto o lanzar una excepción según tu necesidad.
        return null; // O puedes lanzar una excepción aquí
    }
}


?>

