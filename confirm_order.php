<?php
  session_start();
  
  require "includes_and_partials/head.php";
  include "includes_and_partials/database_connection.php";     
?>

    <body>
           
      <?php
         include "includes_and_partials/navigation.php";
         include "includes_and_partials/hero_image.php";
      ?>
       <div class ="container">
           
           <h2>Thank you for your order</h2>
           <p>Delivery Address:</p>
        
           <!--Hente adressen fra MySQL-->
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
           <p>Your order will soon be dispatched</p>     
              
           <form
             action="/viktorija_valsoe_crud/views/log_out.php" method='get'>
             <input type="submit" value="Log Out">
           </form>
           
        </div>    
         <?php
           include "includes_and_partials/footer.php";
           require"includes_and_partials/bootstrap_components.php";
         ?>   
    </body>  
</html>            