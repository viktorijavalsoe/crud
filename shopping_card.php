<?php
  session_start();
  
  require "includes_and_partials/head.php"
?>

<body id="shopping_card">
    <?php
     
      require "includes_and_partials/navigation.php";
      require "includes_and_partials/product_array.php"; 
    ?>

    <div class="container">

        <h1>Shopping Card</h1>

        <hr>

        <?php      
     if ( isset($_POST) && isset($_POST['quantities'])) {
  // echo print_r($_POST['quantities']);
    //tömmer session foer den skaper den
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
              
               
                <!---wrong includes-->
                <form action="/viktorija_valsoe_shopping/remove_item.php" method='post'>
                    <input type="hidden" value="<?php echo $product_in_the_cart[" title"]?>" name="reset">
                    <input type="submit" name="submit" value="remove">
                </form>
            </div>

            <?php
                
            //LAGRE I MySQL databasen       
                require "includes_and_partials/database_connection.php"; 
                            
                $name = $product_in_the_cart["title"];
                $price = $product_in_the_cart["price"];
                $qty = $product_in_the_cart["quantity"];
                
                 $insert = $pdo->prepare("INSERT INTO shopping_cart (name, price, qty) VALUES (:name, :price, :qty)");
                
                 if(!empty($name) || !empty($price)){
                     echo "<br> yeei <br>";
                 }else{
                     echo "neei";
                 }
{
// continue with code processing
}   
                   
                 $insert->execute(
                   [
                    ":name" => $name,
                    ":price" => $price,
                    ":qty" => $qty  
                   ]
                 );
                 
                   
                   if ($insert->execute()) {
                    echo "Created";
                    } else {
                    echo "Something is fucked";
                 } 
                      
            
               }
           ?>
        </div>

        <hr>

        <div style="text-align:right">
           
            <?php       
               if($total_sum == 0){
                 echo "Your Shopping card is empty!";
                 } else {
                   echo "Total sum for your purchase is $".$total_sum;
               }
          }
            ?>
        </div>

        <form action="/viktorija_valsoe_crud/customer_login_page.php" method='get'>
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
