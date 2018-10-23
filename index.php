<?php
session_start();
require "includes_and_partials/head.php";
?>

<body>
    <?php
    require "includes_and_partials/navigation.php";
    ?>
    <main>
        <section>
            <?php include_once"includes_and_partials/hero_image.php"?>
        </section>

        <div class="container">
            <div class="page_title">
                <h1>Shop New Season</h1>
                <hr>
            </div>

            <?php         
            /*PRODUCT ARRAY*/
            require "includes_and_partials/product_array.php";
            ?>
            <!--PRODUCT GALLERY-->

            <form action="/viktorija_valsoe_crud/shopping_card.php" id="form1" method='post'>
                <section class="product_gallery">
                    <div class="row product_wrapper justify-content-center">

                        <?php  
//Looper gjennom  $all_products for att skrive en og en produkt                 
       foreach($all_products as $single_product){?>
                        <div class="col-12 col-md-6 product_container">
                            <?php
                         // change to require when //imported
                            include "includes_and_partials/reset_quantities_index_page.php";
                            ?>
                            <?php echo $single_product["image"];?>
                            <?php echo "<h2>".$single_product["title"]."</h2>"; ?>
                            <?php echo "<p>$ ".$single_product["price"]."</p>"; ?>
                            <label for="number">Qty</label>
                            <br>
                            <input id="number" class="quantity" name="quantities[<?php echo $single_product['title']?>]" type="number" value="<?php echo $_SESSION[$single_product['title']]?>">

                            <label class="sr-only" for="reset">Reset</label>
                            <input id="reset" name="reset" type="reset" value="Reset">
                            <div class="col d-md-none">
                                <hr>
                            </div>
                        </div>
                        <!--col-->

                        <?php 
                                 
                        }
                        ?>
                    </div>
                    <!--row-->

                </section>
                <!--product gallery-->
                <input type="submit">
            </form>
        </div>
        <!--product gallery-->
    </main>
    <!-- Footer -->

    <?php
    
      
    include "includes_and_partials/footer.php";
    require"includes_and_partials/bootstrap_components.php";
    ?>
</body>

</html>
