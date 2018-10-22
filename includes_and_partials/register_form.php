<form action="register.php" method="POST">
 <p>Enter Email</p>
 <label class="sr-only" for="email">Email</label>
 <input id="email" type="email" name="email" placeholder="Email" required>
 <br>
 <p>Enter Username</p>
 <label class="sr-only" for="register_username">Username</label>
 <input id="register_username" type="text" name="username" placeholder="Username" required>
 <br>
 <p>Enter Password</p>
 <label class="sr-only" for="register_password">Password</label>
 <input id="register_password" type="password" name="password" placeholder="Password" required>
 <br>
 <br>
 <p>Shipping Address</p>
 <div class=row>
 <div class=col>
 <label class="sr-only" for="fname">Name</label>
 <input id="fname" type="text" name="fname" placeholder="Name">
     </div>
    <div class=col> 
 <label class="sr-only" for="lname">Name</label>
 <input id="lname" type="text" name="lname" placeholder="Last name" required>
     </div>
 </div>
 
   <br>
 <label class="sr-only" for="address1">Address 1</label>
 <input id="address1" type="text" name="address" placeholder="Address" required>
  <br>
  
<div class=row>  

 <div class=col>
  <label class="sr-only" for="zip_code">zip code</label>
 <input id="zip_code" type="text" name="zip_code" placeholder="Zip Code" required>
    </div>
    
 <div class=col>  
     <label class="sr-only" for="city">City</label>
 <input id="city" type="text" name="city" placeholder="City" required>       
     </div>
     
</div> 
  <br>   
 <label class="sr-only" for="country">country</label>
 <input id="country" type="text" name="country" placeholder="Country" required>
 
 <br>

 <label class="sr-only" for="telephone">telephone</label>
 <input id="telephone" type="tel" name="telephone" placeholder="Phone number" required>
<br> 
  <input type="submit" value="Register">
 <br> 
 </form> 
 
