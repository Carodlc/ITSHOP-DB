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
    echo "Connected to Oracle database successfully!";
} catch (PDOException $e) {
    // Connection failed, display an error message
    echo "Connection failed: " . $e->getMessage();
}
?>
