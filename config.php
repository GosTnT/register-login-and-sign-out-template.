<?php
// Database connection (using PDO)
$servername = "d5c0v.h.filess.io:61001";
$username = "fulls_lawmaybehe";
$password = "bf66f0e48de96fca850685dbccfbc2c96d6c58a8";
$dbname = "fulls_lawmaybehe";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully"; 
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>