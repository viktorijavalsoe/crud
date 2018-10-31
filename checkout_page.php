<?php
  session_start();
  
  require "includes_and_partials/head.php"
?>

<body>
    <?php
    include "includes_and_partials/navigation.php";
    ?>

    <div class="container">
        <h2>Thank you for your order</h2>
        <p>Delivery Address:</p>


        <h2>Order Summary</h2>
        <hr>

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
            <div class="col-12 col-md-3 product_image">
                <?php echo $product_in_the_cart["image"]."<br>";?>
            </div>
            <div class="col-12 col-md-2">
                <?php echo $product_in_the_cart["title"]."<br>";?>
            </div>

            <div class="col-12 col-md-2">
                <?php echo "$".$product_in_the_cart["price"]."<br>"; ?>
            </div>
            <div class="col-12 col-md-2">
                <?php echo $product_in_the_cart["quantity"]."<br>";?>
            </div>
            <div class="col-12 col-md-2">
                <?php echo "Total: $".$product_in_the_cart["total"]."<br>"; ?>
            </div>

            <?php } ?>
        </div>

        <hr>

        <div style="text-align:right">
            <?php       
     if($total_sum == 0){
         echo "Your Shopping card is empty!";
     }else{
         echo "Total sum for your purchase is $".$total_sum;
       
     }
 
    }

 ?>
 
  <form action="/viktorija_valsoe_crud/views/log_out.php" method='get'>
            <input type="submit" value="Log Out">
        </form>


            <!--checkout_container-->
        </div>
        <?php
include "includes_and_partials/footer.php";
require"includes_and_partials/bootstrap_components.php";
    ?>
</body>

</html>