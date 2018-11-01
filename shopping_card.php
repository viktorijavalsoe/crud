<?php
  session_start();
  
  require "includes_and_partials/head.php"
?>

<body id="shopping_card">
    <?php
     
      require "includes_and_partials/navigation.php";
      require "includes_and_partials/product_array.php"; 
      require "includes_and_partials/database_connection.php";
    ?>

    <div class="container">

        <h1>Shopping Card</h1>

        <!--Produkter fra MySQL-->
        
        <?php
          if(isset($_SESSION["username"])){
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
              ?>

        <hr>
        <div class="row">

            <?php
               foreach($shopping_cart as $product): ?>
            <div class="col-12 col-md-2 product_image">
                <?= $product["image"]; ?>
            </div>

            <div class="col-12 col-md-2">
                <?= $product["name"]; ?>
            </div>

            <div class="col-12 col-md-2"> 
                <?= "$".$product["price"]; ?>
            </div>

            <div class="col-12 col-md-2">
                <?= $product["qty"]; ?>
            </div>

            <div class="col-12 col-md-2">
                <?php $total_saved_product = $product["qty"] * $product["price"];?>
                
                <?= "Total: $".$total_saved_product; ?>
            </div>

            <div class="col-6 col-md-2">

                <!--delete product that is saved in MySQL-->

                <form action="/viktorija_valsoe_crud/views/remove_item_mysql.php" method='post'>
                    <input type="hidden" value="<?php echo $product[" product_id"]?>" name="delete">
                    <input type="submit" name="submit" value='remove'>
                </form>
            </div>

            <?php
              endforeach;
              ?>

        </div>

        <?php    
          }
        ?>


        <hr>

        <div class="row">
            <div class="col d-none col-md-2">
            </div>

            <div class="col d-none col-md-2">
                <p>Product</p>
            </div>

            <div class="col d-none col-md-2">
                <p>Price</p>
            </div>

            <div class="col d-none col-md-2">
                <p>Qty</p>
            </div>

            <div class="col d-none col-md-2">
                <p>Total</p>
            </div>
        </div>


        <?php
          
          require "includes_and_partials/shopping_card.php";
          
          if (isset ($_SESSION["shopping_card"])) {
          $total_sum = 0;
          $total_quantity = 0; 
        ?>

        <div class="row">

            <?php 
              
               foreach($_SESSION["shopping_card"] as $product_in_the_cart):
                 $total_sum += $product_in_the_cart["total"];
                 $total_quantity += $product_in_the_cart["quantity"];
            ?>
            <div class="col-12 col-md-2 product_image">
                <?= $product_in_the_cart["image"]."<br>";?>
            </div>

            <div class="col-12 col-md-2">
                <?= $product_in_the_cart["title"]."<br>"; ?>
            </div>

            <div class="col-12 col-md-2">
                <?= "$".$product_in_the_cart["price"]."<br>"; ?>
            </div>

            <div class="col-12 col-md-2">
                <?= $product_in_the_cart["quantity"]."<br>"; ?>
            </div>

            <div class="col-12 col-md-2">
                <?= "Total: $".$product_in_the_cart["total"]."<br>"; ?>
            </div>

            <div class="col-6 col-md-2">


                <form action="/viktorija_valsoe_crud/includes_and_partials/remove_item.php" method='post'>
                    <input type="hidden" value="reset[<?php echo $product_in_the_cart[" title"]?>]" name="reset">
                    <input type="submit" name="submit" value="remove">
                </form>
            </div>


            <?php 
               endforeach;
           ?>
        </div>

        <hr>

        <div style="text-align:right">

            <?php 
   
          }
            ?>
        </div>

        <form action="/viktorija_valsoe_crud/views/create_MySQL.php" method='post'>
            <input type="submit" value="Proceed to Checkout">
        </form>
        <form action="/viktorija_valsoe_crud/index.php" method='post'>
            <input type="submit" value="Back to Shopping">
        </form>

        <!--container-->
    </div>

    <?php
include "includes_and_partials/footer.php";
require"includes_and_partials/bootstrap_components.php";
    ?>

</body>

</html>
