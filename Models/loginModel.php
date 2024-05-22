<?php

class login extends database {
    
    public function getUser($email, $password){


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $this->connect()->real_escape_string($email));
    
    $result = $this->connect()->query($sql);
    
    $user = $result->fetch_assoc();
}
    
    if ($user) {
        
        if (password_verify($password, $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["user_id"];
            
            header("Location: main.php");
            exit;
        }
    }
    else {
        $stmt = null;
        header("Location: main.php");
        exit;
    }
 }
}
   

