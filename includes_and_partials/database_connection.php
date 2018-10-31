<?php

$servername = "mysql.localhost";
$database = "test"; 
$username = "root";
$password = "root";

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {$pdo = new PDO(
    "mysql:host=localhost;dbname=test;charset=utf8",
     "root",
     "root"
     );
     
    // echo "Connected";
    } catch (PDOException $error) {
      echo 'Error: ' . $error->getMessage();
}   
  
?>
