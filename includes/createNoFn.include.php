<?php
session_start();
if(isset($_POST['create-nofn']))
{
    include_once '../classes/db.class.php';
    include_once '../classes/createNoFn.class.php';

    $idUser=$_SESSION['userId'];
    $a= $_POST['a'];
    $b= $_POST['b'];
    $c= $_POST['c'];
    $d=$_POST['d'];
    $pow1=$_POST['pow1'];
    $pow2=$_POST['pow2'];
    $pow3=$_POST['pow3'];
    
    $createNoFn= new noFn;
    $createNoFn->createFunction($idUser,$a,$b,$c,$d,$pow1,$pow2,$pow3);
    

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