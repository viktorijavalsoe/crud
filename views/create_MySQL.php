 <?php 
   session_start();
  
    require "../includes_and_partials/database_connection.php";
          
            if(isset($_SESSION["shopping_card"])):
               
               foreach($_SESSION["shopping_card"] as $product_in_the_cart):
                //var_dump($product_in_the_cart);
                $image = $product_in_the_cart["image"];       
                $name = $product_in_the_cart["title"];
                $price = $product_in_the_cart["price"];
                $qty = $product_in_the_cart["quantity"];
                $purchased_by = $_SESSION["username"];

                $statement = $pdo->prepare("SELECT * FROM shopping_cart WHERE name =:name AND purchased_by = :purchased_by");
                
                $statement->execute(
                [
                  ":name" => $name,
                  ":purchased_by" => $purchased_by  
                ]
                ); 
                
                $existing_product = $statement->fetch(PDO::FETCH_ASSOC);
                   if($existing_product){
                       $new_qty = $qty + $existing_product['qty'];
                       
                       $update_amount = $pdo->prepare("UPDATE shopping_cart SET qty = :qty WHERE name = :name");
                       
                       $update_amount->execute(
                       [
                         ":name" => $existing_product['name'],   
                         ":qty" => $new_qty 
                       ]    
                       );
                       
                   }else{
                        
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
                        //check if values been inserted into Mysql  
                        if ($insert->execute()) {
                            echo "Created";
                        } else {
                            echo "Something is fucked";
                        } 
                   }
                            
               endforeach;
           ?> 

            <?php 
              
        endif;
            
         header('Location:/viktorija_valsoe_crud/checkout_page.php');
            ?>