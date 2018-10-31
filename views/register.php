<?php

session_start();

require "../includes_and_partials/database_connection.php";

//Save values in both $_POST["username"] and $username
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$zip = $_POST["zip_code"];
$city = $_POST["city"];
$country = $_POST["country"];
$phone = $_POST["telephone"];


//password_hash expects to parameters, string & //PASSWORD_DEFAULT

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// NO white space between  $pdo and prepare 

$statement = $pdo->prepare("INSERT INTO users 
  (email, username, password, fname, lname, address, zip_code, city, country ) VALUES(:email, :username, :password, :fname, :lname, :address, :zip_code, :city, :country)");
//execute populates the statement


// If satser for passord parameter maa komme innom execute
$statement->execute(
    [
    ":email" => $email,    
    ":username" => $username,
    ":password" => $hashed_password,
    ":fname" => $fname,
    ":lname" => $lname,
    ":address" => $address,
    ":zip_code" => $zip,  
    ":city" => $city,
    ":country" => $country  ]

);

if (isset($username)){
    $_SESSION["username"] = $username;
}


header('Location:/viktorija_valsoe_crud/shopping_card.php');
?>
