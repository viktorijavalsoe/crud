<?php
session_start();

/*
* 1. Koble opp til databasen
* 2. Hente anvenderen fra databasen
* 3. Koble slik at passord i databasen stemmer overns * * med passordet som bruker har skrevet inn 
* formulularet: passord_verify
*/

require "../includes_and_partials/database_connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

$statement = $pdo->prepare("SELECT * FROM users
WHERE username = :username");
//execute populates the statement


// If satser for passord parameter maa komme innom execute
$statement->execute(
    [
    ":username" => $username
    ]
);

$fetched_user = $statement->fetch();

//var_dump($fetched_user["password"]);

//3. Compare
/*password_verify tar inn 2 argumenter:
 * argument 1 = info  fra databasen
 *argument 2 = inserted value
 *sammenligner om pasordet som er inntastet stemmer *overens med databasen
*/

$is_password_correct = password_verify($password, $fetched_user["password"]);

if($is_password_correct){
    //Save user globally to session
    $_SESSION["username"] = $fetched_user["username"]; header('Location:/viktorija_valsoe_crud/shopping_card.php');
    
} else {   
  header('Location:/viktorija_valsoe_crud/customer_login_page.php?login_failed=true');
}


?>