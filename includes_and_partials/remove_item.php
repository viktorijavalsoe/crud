<?php
session_start();

if (isset($_POST['reset'])){
 unset($_SESSION["shopping_card"][array_search($_POST['reset'], array_column($_SESSION["shopping_card"], 'title'))]);
}
header('Location:/viktorija_valsoe_shopping/shopping_card.php');                
?>