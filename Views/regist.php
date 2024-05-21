<?php
session_start();

if (isset($_SESSION["user_id"])){
    $mysqli = require "../Models/database.php";

    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}  

?>



<?php

// if (empty($_POST["name"])) {
//     die("Name is required");
// }

// if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
//     die("Valid email is required");
// }

// if (strlen($_POST["password"]) < 8) {
//     die("Password must be at least 8 characters");
// }

// if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
//     die("Password must contain at least one letter");
// }

// if ( ! preg_match("/[0-9]/", $_POST["password"])) {
//     die("Password must contain at least one number");
// }

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require "../Models/database.php";

$sql = "INSERT INTO user (username, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {
    echo "signup succesfull";

  header("Location: main.php");
   exit;
    
 } else {
    
     if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
