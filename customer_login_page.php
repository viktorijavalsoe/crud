<?php
session_start();

require "includes_and_partials/head.php";
include_once "includes_and_partials/hero_image.php";
?>

<body id="checkout">
    <?php
    include "includes_and_partials/navigation.php";
    ?>

    <div class="container">
        <h1>Check out</h1>

        <hr>
        <!-- Customer log inn -->
        <div class="row product_wrapper justify-content-center">
            <!--New customer-->
            <div class="col 6">
                <h2>Sign in</h2>
                <br>
                <?php
 require "includes_and_partials/sign_in_form.php";     
     ?>
                <h2>Processed without login</h2>
                <br>
                <?php
     require "includes_and_partials/register_form.php";
     ?>
            </div>
            <div class="col-4 d-sm-none d-md-block">

            </div>

        </div>

        <!--checkout_container-->
    </div>

    <?php
include "includes_and_partials/footer.php";
require"includes_and_partials/bootstrap_components.php";
    ?>
</body>

</html>