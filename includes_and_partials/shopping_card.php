<?php
      require "includes_and_partials/product_array.php"; 
         
      if ( isset($_POST) && isset($_POST['quantities'])) {
      // echo print_r($_POST['quantities']);
      //tömmer session for den skaper den
         unset($_SESSION["shopping_card"]);
         
         foreach($_POST['quantities'] as $title => $quantity){
             $_SESSION[$title] = $quantity;
             if ($quantity){ 
                 $product = $all_products[array_search($title, array_column($all_products, 'title'))];
                 $product["quantity"] = $quantity;
                 $product["total"] = $product["price"] * $quantity;
                
/*
*shopping_card[]" - [] skaper array 
*shopping_card[]" - holder ulike verdier av product i en array
*/  
              $_SESSION["shopping_card"][] = $product;
                
            }
        }
     } 
  ?>
  
 