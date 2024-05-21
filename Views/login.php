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

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require "../Models/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["user_id"];
            
            header("Location: main.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">


</head>
<body>

    <div class="container">
    <a href="./login.php"><img onclick="" class="account" src="./img/account.webp" width="40px" height="40px" alt=""></a>

        <hr>
        <div class="header">
            
            <div class="menu">
                <span>Shopping Cart</span>
                <a href="./main.php">Home</a>
                <a href="./product.php">Products</a>
                <a href="./admin.php">Admin</a>
                <a href="./logout.php">Log out</a>
                <div class="icon">
                <img src="./img/find.png" alt="">
                <img src="./img/cart.png" alt="">
                </div>
            </div>
        </div>
        <div class="body">
            <hr>


            <form method="post" >
            <div class="login">
                <h2>Login</h2>
                <?php if ($is_invalid): ?>
                <em>Invalid login</em>
            <?php endif; ?>
                Email <br>
                <input type="text" name="email"> <br>
                password <br>
                <input type="password" name="password">
                <br>
                <input type="submit" name="login" value="Login"><br>
                <a href="./register.php">Register</a> <br>

                </form>

            </div>

        </div>
    </div>
</body>
</html>