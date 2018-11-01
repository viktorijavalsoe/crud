 <?php 
   session_start();
  
    require "../includes_and_partials/database_connection.php";
          
          if (isset ($_SESSION["shopping_card"])):
          $total_sum = 0;
          $total_quantity = 0; 
        ?>

            <?php 
              
               foreach($_SESSION["shopping_card"] as $product_in_the_cart):
     
                $image = $product_in_the_cart["image"];           
                $name = $product_in_the_cart["title"];
                $price = $product_in_the_cart["price"];
                $qty = $product_in_the_cart["quantity"];
                $purchased_by = $_SESSION["username"];
                
                 $insert = $pdo->prepare("INSERT INTO shopping_cart (image, name, price, qty, purchased_by) VALUES (:image, :name, :price, :qty, :purchased_by)");

                   
                 $insert->execute(
                   [
                    ":image" => $image,
                    ":name" => $name,
                    ":price" => $price,
                    ":qty" => $qty,
                    ":purchased_by" => $purchased_by
                   ]
                 );
                 
               // check if values been inserted into Mysql  
                   if ($insert->execute()) {
                    echo "Created";
                    } else {
                    echo "Something is fucked";
                 } 
                   
            
               endforeach;
           ?> 

            <?php 
              
        endif;
            
              header('Location:/viktorija_valsoe_crud/checkout_page.php');
            ?>