<?php
session_start();
require "database_connection.php";

if (isset($_POST['reset'])){
 unset($_SESSION["shopping_card"][array_search($_POST['reset'], array_column($_SESSION["shopping_card"], 'title'))]);

   

// match title with name in the column
// delete from my sql   
    

/*    
$statement = $pdo->prepare("DELETE * FROM shopping_cart WHERE name = :name");
$statement->execute(
    [
     ":name" => $name
    ]
); */    
    
}
header('Location:/viktorija_valsoe_crud/shopping_card.php');                
?>