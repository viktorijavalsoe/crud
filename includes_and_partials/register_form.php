 <form action="/viktorija_valsoe_shopping/redirect_without_login.php" method="POST">
 
 <p>Enter Username</p>
 <label class="sr-only" for="email">Email</label>
 <input id="email" type="email" name="email" placeholder="Email" required>
 <br>
 <p>Enter Password</p>
 <label class="sr-only" for="password">Email</label>
 <input id="password" type="password" name="password" placeholder="Email" required>
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
  <input type="submit" value="Proceed">
 <br>
 </form> 