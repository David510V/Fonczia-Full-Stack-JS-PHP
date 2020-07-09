<?php
include_once 'createU.class.php';

    class errorHandler extends Create{
        

        public function check($userName,$school,$password,$passwordRepeat){
            
            if(empty($userName)|| empty($school) || empty($password)){
                header("Location: ../signup.php?error=emptyfields&username=".$userName."&school=".$school);
                exit();
            }
            // else if(!preg_match("/^[a-zA-Z0-9]*$/",$userName)){ // For invalid username
            //     header("Location: ../signup.php?error=invalidusername&school".$school);
            //     exit();
            // }
        
            else if ($password !== $passwordRepeat){
                header("Location: ../signup.php?error=passwordCheck&mail=".$userName."&school=".$school);
                exit();
            }
            else{
                $this->createUser($userName,$school,$password);
            }
            
        }
    }

?>