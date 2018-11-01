<?php
session_start();
include "../includes_and_partials/shopping_card.php";
//var_dump($_SESSION["shopping_card"]);

if(isset($_SESSION["username"])){
    
    header('Location:/viktorija_valsoe_crud/shopping_card.php');
    
}else{
    header('Location:/viktorija_valsoe_crud/customer_login_page.php');
}

     
?>

    
    
    