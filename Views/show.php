<?php

require("../Models/database.php");


    $sql = "SELECT *
            FROM product";

    $result = mysqli_query($conn, $sql);

    if ($result == false){
        echo mysqli_error($conn);
    }else{
        $product = mysqli_fetch_assoc($result);
       
    };
    

?>



<div class="container">
<div class="admin">
<div class="product_item">
                <table border="1">
                    <tbody>
                        <td style="width: 200px;"> <img src="./img/<?=$product['image'] ?> " alt=""></td>
                        <td style="width: 200px;"> <?=$product['proName'] ?> </td>
                        <td style="width: 150px;"> <?=$product['price'] ?> </td>
                        <td style=" display: flex; justify-content: center;">
                            <button style="color: white; background-color: rgb(0, 255, 76); margin-right: 5px; border: 0.5 solid black;"><a style="color: white;" href="./edit.php">Edit</a></button>
                            <button style="background-color: tomato;"><a style="color: white;" href="./delete.php">Delete</a></button>
                        </td>
                    </tbody>
                </table>