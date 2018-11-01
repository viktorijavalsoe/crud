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

        <?php
          if(isset($_SESSION["username"])){
              $username = $_SESSION["username"];
              echo $username;
              
              $statement = $pdo ->prepare(
                  "SELECT * FROM shopping_cart
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

        <div class="row">

            <?php
               foreach($shopping_cart as $product): ?>
            <div class="col-12 col-md-2 product_image">
                <?= $product["image"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?= $product["name"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?= $product["price"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?= $product["qty"]; ?>
            </div>

            <div class="col-12 col-md-2 product_image">
                <?php $total_saved_product = $product["qty"] * $product["price"];?>
                <?= "Total: ".$total_saved_product; ?>
            </div>

            <div class="col-6 col-md-2">
               
               <!--How to pass variable as GET-->
                <a href="/viktorija_valsoe_crud/includes_and_partials/remove_item_mysql.php?id=<?php echo $product['product_id']?>" role="button" class="button" onclick="alert('Are you sure you want to remove this item')">Delete</a>
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
          
          if (isset ($_SESSION["shopping_card"])) {
          $total_sum = 0;
          $total_quantity = 0; 
        ?>

        <div class="row">

            <?php 
              
               foreach($_SESSION["shopping_card"] as $product_in_the_cart){
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
                
            //LAGRE I MySQL databasen       
                require "includes_and_partials/database_connection.php"; 
                $image = $product_in_the_cart["image"];           
                $name = $product_in_the_cart["title"];
                $price = $product_in_the_cart["price"];
                $qty = $product_in_the_cart["quantity"];
                $purchased_by = $_SESSION["username"];
                
                 $insert = $pdo->prepare("INSERT INTO shopping_cart (image, name, price, qty, purchased_by) VALUES (:image, :name, :price, :qty, :purchased_by)");
               
{
// continue with code processing
}   
                   
                 $insert->execute(
                   [
                    ":image" => $image,
                    ":name" => $name,
                    ":price" => $price,
                    ":qty" => $qty,
                    ":purchased_by" => $purchased_by
                   ]
                 );
                 
                /* check if values been inserted into Mysql  
                   if ($insert->execute()) {
                    echo "Created";
                    } else {
                    echo "Something is fucked";
                 } 
                */      
            
               }
           ?>
        </div>

        <hr>

        <div style="text-align:right">

            <?php 
               
              
               if($total_quantity == 0){
                 echo "Your Shopping card is empty!";
                 } else {
                   echo "Total sum for your purchase is $".$total_sum;
               }
          }
            ?>
        </div>

        <form action="/viktorija_valsoe_crud/checkout_page.php" method='get'>
            <input type="submit" value="Checkout">
        </form>
        <form action="/viktorija_valsoe_crud/views/reset.php" method='get'>
            <input type="submit" onclick="alert('Are you sure you want to empty your card?')" value="Empty Card">
        </form>

        <!--container-->
    </div>

    <?php
include "includes_and_partials/footer.php";
require"includes_and_partials/bootstrap_components.php";
    ?>

</body>

</html>
