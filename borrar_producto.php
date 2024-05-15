<?php
// Verifica si se ha recibido el parámetro 'idProducto'
if (isset($_GET['idProducto'])) {
  // Conecta con la base de datos y elimina el producto
  include 'conexion.php';
  $idProducto = $_GET['idProducto'];

  $query = "DELETE FROM PRODUCTS_IMG WHERE ID = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute([$idProducto]);

  $query = "DELETE FROM DATOS_PRODUCTO WHERE IDPRODUCTO = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute([$idProducto]);
  // Responde con un estado HTTP 200 OK si la eliminación fue exitosa
  http_response_code(200);

} else {
  // Si no se recibe el parámetro 'idProducto', responde con un estado HTTP 400 Bad Request
  http_response_code(400);
}
?>
