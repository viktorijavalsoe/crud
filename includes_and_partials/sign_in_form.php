 <!--Existing customer-->  
 <form action="/viktorija_valsoe_shopping/redirect_with_login.php" method="POST">
 <label class="sr-only" for="username">Username</label>
 <input id="username" type="text" name="username" placeholder="Username">
 
  <br>
 <label class="sr-only" for="password">Password</label>
 <input id="password" type="password" name="password" placeholder="Password">
 
 <?php
    // error message
   
     if(isset($_GET["error"])){
			echo "<h2 style='color:hotpink;'>".$_GET['error']."</h2";
		} 
     ?>
     
  <br> 
  <input type="submit" value="Log in">
  <br>
  <br>
 </form>