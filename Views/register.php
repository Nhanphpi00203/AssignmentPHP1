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
                <a href="./products.php">Products</a>
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
            <form action="./signup-inc.php" method="POST" novalidate>
                <div class="register">
                    <h2>register</h2>
                    Username <br>
                    <input type="text" name="name"> <br>
                    Email <br>
                    <input type="text" name="email"> <br>
                    password <br>
                    <input type="password" name="password">
                    <br>
                    comfirmpassword <br>
                    <input type="password" name="password_rp"> <br>
                    <button type="submit" name="submit">Signup</button>
                    </form>
                </div>
    
            </div>
        </div>
    </body>
    </html>