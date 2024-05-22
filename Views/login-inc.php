<?php

if(isset($_POST["submit"]))
{
    // Lay du lieu tu database
   
    $email = $_POST["email"];
    $password = $_POST["password"];
 

    // gan class vo
    include "../Models/database.php";
    include "../Models/signupModel.php";
    include "../Controllers/signupControler.php";

   
    $signup = new signupControler($name, $email , $password, $password_rp);

    //
    $signup->signupUser();

    //
    header("location: main.php");
}