<?php


class signup extends database {

    
    public function setUser($name, $email ,$password) {
        
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        try{

            $sql = "INSERT INTO user (username, email, password_hash)
            VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password);
            $stmt->execute();

        }
        catch (PDOException $e) {

            die("ERROR: " . $e->getMessage());
        }



        
       
        
        // $stmt = $this->connect()->stmt_init();
        // $stmt = mysqli_query($this->conn, $sql);
        // if ( !$stmt->prepare($sql)) {
        //     die("SQL error: " . $this->connect()->error);
        //     }
        
        // $stmt->bind_param("sss",$name, $email, $password);

        //     $stmt->execute();
                

        // // if ($stmt->execute()) {
        //         exit();
        // // }

        // $stmt = null;
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