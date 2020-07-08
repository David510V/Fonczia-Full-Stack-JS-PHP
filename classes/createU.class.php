<?php

    class Create extends dbase{
        
        public function createUser($userName,$school,$password){
            $sql="SELECT * FROM users";
            $stmt=$this->connect()->query($sql);
            if(!$stmt){
                header("Location: ../signup.php?error=sqlerror");
                exit();
            }
            else{
                $stmt = $this->connect()->prepare("SELECT userName FROM users WHERE userName = :name");
                $stmt->bindParam(':name', $userName);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    header("Location: ../signup.php?error=usertaken&mail=".$school);
                    exit();
                }
                else{
                    $sql="INSERT INTO users(userName, school, passUser) VALUES (?, ?, ?)";
                    $stmt=$this->connect()->prepare($sql);
                    if(!$stmt){
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else{
                        $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
                        $stmt->execute([$userName,$school,$hashedPassword]);
                       
                        // $_SESSION['userId']=$userName;
                        $_SESSION['userName']=$userName;
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                }
           }
    }
   }
?>