<?php
session_start();

if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
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
        <div class="add_pro">

            <div class="add">
                <h4>Add Products</h4> <button><a href="./admin.php">back</a></button>
            </div>

                <div class="add_item">
                <form action="./add.php" method="POST">
                    <div>
                    Chose an image 
                    <input type="file" name="pro_img" id="" accept="image/*" >
                    </div>
                    <div>
                    Name
                    <input type="text" name="pro_name" id="">
                    </div>
                    <div>
                    Price
                    <input type="number" name="pro_price" value="" min="0" max="" step="1000" />vnđ
                    </div>
                    <div>
                    Description 
                    <input type="text" name="pro_des" id="" class="description">
                    </div>
                    <input class="save" type="submit" name="add" id="" value="Save">
                </form>
                </div>
    </div>
</body>
</html>
