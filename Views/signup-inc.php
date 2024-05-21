<?php

if(isset($_POST["submit"]))
{
    // Lay du lieu tu database
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_rp = $_POST["password_rp"];

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