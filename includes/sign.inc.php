<?php
session_start();
if(isset($_POST['signup-submit']))
{
    include_once '../classes/db.class.php';
    include_once '../classes/emptyHand.class.php';
    include_once '../classes/createU.class.php';

    $userName= $_POST['username'];
    $school= $_POST['school'];
    $password= $_POST['password'];
    $passwordRepeat=$_POST['password-rep'];
    $submit= $_POST['signup-submit'];

    $errorHander= new errorHandler;
    $errorHander->check($userName,$school,$password,$passwordRepeat);
    

    
    $dbs=new dbase;
    $sth = $dbs->connect()->query('SELECT * FROM users');
    $sth = null;
    $dbs = null;
}

else{
    header("Location../signup.php");
    exit();
}
?>