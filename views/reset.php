<?php
session_start();
//session_destroy();
if (isset($_SESSION["shopping_card"])){
    unset($_SESSION["shopping_card"]);              
}

//if isset mysql - delete
 header('Location:/viktorija_valsoe_crud/index.php?reset=empty card');


?>
