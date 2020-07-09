<?php 
include_once 'db.class.php';

class getYesFn extends dbase{
    public function getYesFunction(){
        $sql="SELECT * FROM yesfra";
        $stmt=$this->connect()->query($sql);

        if(!$stmt){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            $stmt=$this->connect()->prepare("SELECT * FROM yesfra WHERE idUser= :name");
            $stmt->bindParam(':name',$_SESSION['userId']);
            $stmt->execute();
            while($row=$stmt->fetch()){
                $a1=$row['a1'].'X <sup>'.$row['pow1a'].'</sup> +';
                $b1=$row['b1'].'X <sup>'.$row['pow2a'].'</sup> +';
                $d1=$row['d1'].'X <sup>'.$row['pow3a'].'</sup> +';
                $c1=$row['c1'];
                $a2=$row['a2'].'X <sup>'.$row['pow1b'].'</sup> +';
                $b2=$row['b2'].'X <sup>'.$row['pow2b'].'</sup> +';
                $d2=$row['d2'].'X <sup>'.$row['pow3b'].'</sup> +';
                $c2=$row['c2'];
                if(empty($row['a1'])){
                    $a1='';
                }
                if(empty($row['b1'])){
                    $b1='';
                }
                if(empty($row['d1'])){
                      $d1='';
                }
                if(empty($row['c1'])){
                    $c1='';
                }
                if(empty($row['a2'])){
                    $a2='';
                }
                if(empty($row['b2'])){
                    $b2='';
                }
                if(empty($row['d2'])){
                      $d2='';
                }
                if(empty($row['c2'])){
                    $c2='';
                }
                echo '<div style="display: flex;
                align-items: center;">
                    <div class="one" style="width: 50%; font-size:2vw;"> y= </div>
                    <div class="two" style="width: 20%; display: block;">
                    <div class="up">'.$a1.''.$b1.''.$d1.''.$c1.'</div><hr style="border:1.2px solid black">
                    <div class="down">'.$a2.''.$b2.''.$d2.''.$c2.'</div>
                    </div>
                </div>
                <br><br><hr>
                ';
            }
        }
    }
}

?>