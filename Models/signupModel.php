<?php


class signup extends database {

    
    public function setUser($name, $email ,$password) {
       
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, email, password_hash)
        VALUES (?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);
     
        // $stmt = mysqli_query($this->conn, $sql);
        
        
        
        // $stmt->bind_param("sss",
        //     $name, $email, $password);

        $stmt->execute();


        // if ($stmt->execute()) {
        //         exit();
        // }

        $stmt = null;
    }


    public function checkUser($email) {
        $stmt = $this->connect()->prepare('SELECT * FROM user WHERE email = ?;');


        if($stmt->execute()) {
           
            header("location: main.php");
            exit();
        }

        $resultCheck;  

        if($stmt->num_rows() > 0 ) {
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }
        
        return $resultCheck;
    }

}