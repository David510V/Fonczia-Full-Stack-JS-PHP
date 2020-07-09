<?php

    class noFn extends dbase{
        
        public function createFunction($idUser,$a,$b,$c,$d,$pow1,$pow2,$pow3){
            $sql="SELECT * FROM nofra";
            $stmt=$this->connect()->query($sql);
            if(!$stmt){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else{
                $sql="INSERT INTO nofra(idUser, a, b, c, d, pow1, pow2, pow3) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt=$this->connect()->prepare($sql);
                if(!$stmt){
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }
                else{
                    $stmt->execute([$idUser,$a,$b,$c,$d,$pow1,$pow2,$pow3]);
                    
                }
                
           }
    }
   }
?>