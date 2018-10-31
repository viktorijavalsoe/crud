<?php
session_start();
require "includes_and_partials/head.php";
require "includes_and_partials/database_connection.php";
?>

<body>
 
  <div class="container" style="width: 65%">
      <h2>Shopping Card</h2>
      <?php
          $statement = $pdo ->prepare("SELECT * FROM products");
          $statement ->execute();
          $products = $statement ->fetchAll(PDO::FETCH_OBJ);
          foreach($products->name as $product_name){
              
          };
          
      ?>
      
   
  </div>
  <?php  
    include "includes_and_partials/footer.php";
    require"includes_and_partials/bootstrap_components.php";
    ?>
    
</body>

</html>