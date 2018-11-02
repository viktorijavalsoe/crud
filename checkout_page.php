<?php
  session_start();
  
  require "includes_and_partials/head.php";
  include "includes_and_partials/database_connection.php" ;     
?>

<body>
    <?php
    include "includes_and_partials/navigation.php";
    ?>

    <div class="container">
        <p>Delivery Address:</p>
        
        <!--adressen fra MySQL-->
        <?php
             if(isset($_SESSION["username"])):
              $username = $_SESSION["username"];
              
              $statement = $pdo ->prepare(
                  "SELECT *
                  FROM users
                  WHERE username = :username"   
              );
               
              $statement->execute(
                [
                  ":username" => $username
                ]
              );
              
              $users = $statement->fetchAll(PDO::FETCH_ASSOC);
                 
              foreach($users as $user):
              
                 echo $user["fname"]." ".$user["lname"]."<br>";
                 echo $user["address"]."<br>";
                 echo $user["zip_code"]." ".$user["city"]."<br>";
                 echo $user["country"]."<br>";

        endforeach;
        endif;
        ?>
        
        <h2>Order Summary</h2>
        <hr>
        
        <?php
          if(isset($_SESSION["username"])):
                $username = $_SESSION["username"];
              
                $statement = $pdo ->prepare(
                  "SELECT *
                  FROM shopping_cart
                  JOIN users
                  ON shopping_cart.purchased_by = users.username
                  HAVING users.username = :username"
              );
                
                $statement->execute(
                    [
                     ":username" => $username
                    ]
              );
        
                $shopping_cart = $statement->fetchAll(PDO::FETCH_ASSOC);
             
                $total_sum = 0;
        ?>
         <div class="row">

            <?php
               foreach($shopping_cart as $product): 
             ?>
            <div class="col-12 col-md-2 product_image">
                <?= $product["image"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?= $product["name"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?= "$".$product["price"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?= $product["qty"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?php $total_saved_product = $product["qty"] * $product["price"];
                $total_sum += $total_saved_product;?>
                <?= "Total: $".$total_saved_product; ?>
            </div>

            <div class="col-6 col-md-2">
            
            </div>
            

            <?php
              endforeach;
              ?>
          </div>
          <hr>
          
           <div style="text-align:right">
           <?="Total sum for your purchase is $".$total_sum;?>
           </div>
          
         <?php
          endif;
           
        
        ?>
           <form action="/viktorija_valsoe_crud/confirm_order.php" method='get'>
                <input type="submit" value="Order">
            </form>
            
            <!--checkout_container-->
        </div>
        <?php
include "includes_and_partials/footer.php";
require"includes_and_partials/bootstrap_components.php";
    ?>
</body>

</html>
