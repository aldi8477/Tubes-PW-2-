<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_toko_sahrul";

// Create connection
$mysqli_object = new mysqli($servername, $username, $password, $database);
$mysqli_procedur = mysqli_connect($servername, $username, $password, $database);


// Check connection
if ($mysqli_object->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$mysqli_procedur) {
    die("Connection failed: " . mysqli_connect_error());
}

try {
    $pdo = new PDO("mysql:host=$servername;dbname=db_toko_sahrul", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

?>