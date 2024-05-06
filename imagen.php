<?php
include 'conexion.php';

$dbh = $pdo; // Renombrando la variable para mayor claridad
$dbh->beginTransaction(); // ¡Esencial!
$imagen_path = 'fotos/brownies.png'; // Ruta de la imagen
$imagen_contenido = file_get_contents($imagen_path); // Leer el contenido binario de la imagen
$stmt = $dbh->prepare(
    "INSERT INTO IMAGEN (IMAGEN) " .
    "VALUES (EMPTY_BLOB()) " .
    "RETURNING IMAGEN INTO :imagen_blob");
$stmt->bindParam(':imagen_blob', $blob, PDO::PARAM_LOB);
$stmt->execute();
// Actualizar el BLOB con los datos de la imagen
foreach ($dbh->query("SELECT IMAGEN FROM IMAGEN FOR UPDATE") as $row) {
    $blob = $dbh->prepare("UPDATE IMAGEN SET IMAGEN = EMPTY_BLOB() RETURNING IMAGEN INTO :blob");
    $blob->bindParam(':blob', $lob, PDO::PARAM_LOB);
    $lob->fwrite($imagen_contenido);
    $blob->execute();
}
$dbh->commit();
?>
