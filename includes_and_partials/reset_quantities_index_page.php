<?php
   if(isset($_GET["reset"])){
     if (isset($_SESSION[$single_product['title']])){
     unset($_SESSION[$single_product['title']]);
    }
   }
     ?>
