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

require("../Models/database.php");

if ($_POST){

    $image   = trim($_POST['pro_img']);
    $name    = trim($_POST['pro_name']);
    $price   = (float) $_POST['pro_price'];
    $description = trim($_POST['pro_des']);

    try {
        $stmt = $conn->prepare("INSERT INTO product (image, proName, description, price, user_id) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sssdi", $image, $name, $description, $price, $_SESSION["user_id"]);

    
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


?>