<?php
session_start();
if(isset($_POST['create-yesfn']))
{
    include_once '../classes/db.class.php';
    include_once '../classes/createYesFn.class.php';

    $idUser=$_SESSION['userId'];
    $a1= $_POST['a1'];
    $b1= $_POST['b1'];
    $c1= $_POST['c1'];
    $d1=$_POST['d1'];
    $pow1a=$_POST['pow1a'];
    $pow2a=$_POST['pow2a'];
    $pow3a=$_POST['pow3a'];
    $a2= $_POST['a2'];
    $b2= $_POST['b2'];
    $c2= $_POST['c2'];
    $d2=$_POST['d2'];
    $pow1b=$_POST['pow1b'];
    $pow2b=$_POST['pow2b'];
    $pow3b=$_POST['pow3b'];
    
    $createNoFn= new noFn;
    $createNoFn->createFunction($idUser,$a1,$b1,$c1,$d1,$pow1a,$pow2a,$pow3a,$a2,$b2,$c2,$d2,$pow1b,$pow2b,$pow3b);
    

    $dbs=new dbase;
    $sth = $dbs->connect()->query('SELECT * FROM yesfra');
    $sth = null;
    $dbs = null;
}

else{
    header("Location../index.php");
    exit();
}
?>