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


<?php

require("database.php");

if ($_POST){

    $image   = trim($_POST['pro_img']);
    $name    = trim($_POST['pro_name']);
    $price   = (float) $_POST['pro_price'];
    $description = trim($_POST['pro_des']);

    try {

        $stmt = $conn->prepare("UPDATE INTO product WHERE user_id = {$_SESSION["user_id"]} (image, proName, description, price) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("sssi", $image, $name, $description, $price);

    
        $stmt->execute();
        
        header("Location: admin.php");
        // if ($stmt->) {
        //     header("Location: addproduct.php?status=created");  
        //     exit();
        // }
        // header("Location: addproduct.php?status=fail_create");
        // exit();
        
        } catch (Exception $e){
            echo "Error " . $e->getMessage();
            exit();
        }

} else {
    header("Location: addproduct.php?status=fail_create");
    exit();
}