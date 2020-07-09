<?php 
    if(isset($_POST['login-submit'])){
        include_once '../classes/db.class.php';

        $dbs=new dbase;
        $userName=$_POST['username'];
        $password=$_POST['password'];

        if(empty($password)||empty($userName)){
            header('Location: ../index.php?error=emptyFields');
            exit();
        }
        else{
            $sql="SELECT * FROM users";
            $stmt=$dbs->connect()->query($sql);
            if(!$stmt){
                header('Location: ../index.php?error=sqlError');
                exit();
            }
            else{
                $stmt=$dbs->connect()->prepare("SELECT * FROM users WHERE userName= :name");
                $stmt->bindValue(':name',$userName);
                $stmt->execute();
                $user=$stmt->fetch(PDO::FETCH_ASSOC);
                if($user){
                    $passwordCheck=password_verify($password, $user['passUser']);
                   
                    if($passwordCheck==false){
                        header("Location: ../login.php?error=wrongPassword");
                        exit();
                    }
                    else if($passwordCheck==true){
                        session_start();
                        $_SESSION['userId']=$user['idUser'];
                        $_SESSION['school']=$user['school'];
                        $_SESSION['userName']=$user['userName'];

                        header("Location: ../index.php?login=success");
                        exit();
                    }
                    else{
                        header("Location: ../login.php?error=mysqlWrong");
                        exit();
                    }
                }
                else{
                    header("Location: ../login.php?error=noUser"); 
                    exit();
                }
            }
        }

    }
    else{
        header('Location: ../index.php');
        exit();
    }
?>