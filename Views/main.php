


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
<!-- <script>
    login = document.getElementById('welcome')
    alert("Hello <?= htmlspecialchars($user["userName"]) ?> you have logged in");
</script> -->
    <style>
        .welcome{
            position: absolute;
            left: 2px;
            background-color: orange;
            top: -15px;
            height: 34px;
            padding-top: 7px;
            color: bisque;
            width: 797px;
            padding-left: 10px;
            z-index: -1;
        }
    </style>
</head>
<body>


<div class="container">
<?php   if (isset($user)): ?>
     
     <p class="welcome" id="welcome">Welcome <?= htmlspecialchars($user["userName"]) ?></p>

     <?php else: ?>

     <?php endif; ?>
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
            
            <img src="./img/main.PNG" alt="">
            <h5>Recently Added Products</h5>
            <hr>
            <div class="main_product">
                <div class="product">
                    <div class="pro1">
                        <img src="./img/watch.webp" alt="">
                        Watch <br>
                        $29.99
                    </div>
                    <div class="pro2">
                        <img src="./img/wallet.webp" alt="">
                        Watch <br>
                        $29.99
                    </div>
                    <div class="pro3">
                        <img src="./img/airpod.jpg" alt="">
                        Watch <br>
                        $29.99
                    </div>
                    <div class="pro4">
                        <img src="./img/camera.jpg" alt="">
                        Watch <br>
                        $29.99
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>