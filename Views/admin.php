<?php
session_start();

if (isset($_SESSION["user_id"])){
    $mysqli = require "../Models/database.php";

    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}  

else 
header("location: main.php");

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
                <a href="./Main.php">Home</a>
                <a href="./product.php">Products</a>
                <a href="./admin.php">Admin</a>
                <a href="./logout.php">Log out</a>
                <div class="icon">
                <img src="./img/find.png" alt="">
                <img src="./img/cart.png" alt="">
                </div>
            </div>
        </div>
        <div class="admin">
            <div class="add">
                <h4>Products</h4> <button><a href="./addproduct.php?id=<?=$user['user_id']; ?>">Add Product</a></button>
            </div>
            <div class="product_item">
                <table border="1">
                    <thead>
                        <tr> 
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th style="width: 20px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php

require("../Models/database.php");


    $sql = "SELECT *
            FROM product WHERE user_id = {$_SESSION["user_id"]}";

    $result = mysqli_query($conn, $sql);
    if ($result == false){
        echo mysqli_error($conn);
    }else{
        $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
    };
    
    // var_dump($product);

?>     
                <tbody>

                    <?php foreach ($product as $products): ?> 
                      <tr>
                        <td style="width: 200px;"> <img width="70px" height="70px" alt="" src="./img/<?php echo $products['image'] ;?>"> </td>
                        <td style="width: 200px;"> <?php echo $products['proName']; ?> </td>
                        <td style="width: 150px;"> <?php echo $products['price'] ;?> </td>
                        <td style=" display: flex; justify-content: center;">
                            <button style="color: white; background-color: rgb(0, 255, 76); margin-right: 5px; border: 0.5 solid black;"><a style="color: white;" href="./editor.php">Edit</a></button>
                            <button style="background-color: tomato;"><a style="color: white;" href="./delete.php">Delete</a></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
 
                </tbody> 
             
            </div>
            
        </div>

</body>
</html>