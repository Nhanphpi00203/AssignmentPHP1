

<?php

class database{

    public function connect(){
        $db_host = "localhost";
        $db_name = "ass1";
        $db_user = "root";
        $db_pass = "";
        
       
        $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        if(mysqli_connect_error()) {
            echo mysqli_connect_error();
            exit;
        }
        return $conn;

        // try{
        //     $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // }
        // catch (PDOException $e) {
        //     die("connection failed: " . $e->getMessage());
        // }

    }

}