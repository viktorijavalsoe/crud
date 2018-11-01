<?php
session_start();
require "../includes_and_partials/database_connection.php";

//getting the id from URL
if(isset($_POST)){
    var_dump($_POST['delete']);
  
    $id = $_POST['delete']; 
    
    $statement = $pdo->prepare("DELETE FROM shopping_cart WHERE product_id=:product_id");
    
    $statement->execute(
    [
    ":product_id" => $id
    ]
    ); 
}; 

header('Location:/viktorija_valsoe_crud/shopping_card.php'); 


?>
