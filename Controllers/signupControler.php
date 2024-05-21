<?php


    class signupControler extends signup{
        public $name;
        public $email;
        public $password;
        public $password_rp;
        
        public function __construct($name, $email, $password, $password_rp) {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->password_rp = $password_rp;
            }
        public function signupUser(){
 
            $this->setUser($this->name, $this->email, $this->password);    

        }

        public function idTakenCheck(){
            $result;
            if (!$this->checkUser($this->name, $this->email))
            {
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
        }


       





// session_start();

// if (isset($_SESSION["user_id"])){
//     $mysqli = require "../Models/database.php";

//     $sql = "SELECT * FROM user
//             WHERE user_id = {$_SESSION["user_id"]}";

//     $result = $mysqli->query($sql);

//     $user = $result->fetch_assoc();
// }  



// if ($_POST["password"] !== $_POST["password_rp"]) {
//     die("Passwords must match");
// }

// $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// $mysqli = require "../Models/database.php";

// $sql = "INSERT INTO user (username, email, password_hash)
//         VALUES (?, ?, ?)";
        
// $stmt = $mysqli->stmt_init();

// if ( ! $stmt->prepare($sql)) {
//     die("SQL error: " . $mysqli->error);
// }

// $stmt->bind_param("sss",
//                   $_POST["name"],
//                   $_POST["email"],
//                   $password_hash);
                  
// if ($stmt->execute()) {
//     echo "signup succesfull";

//   header("Location: main.php");
//    exit;
    
//  } else {
    
//      if ($mysqli->errno === 1062) {
//         die("email already taken");
//     } else {
//         die($mysqli->error . " " . $mysqli->errno);
//     }
// } 

