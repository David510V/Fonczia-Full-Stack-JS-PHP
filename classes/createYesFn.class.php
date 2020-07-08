<?php

    class noFn extends dbase{
        
        public function createFunction($idUser,$a1,$b1,$c1,$d1,$pow1a,$pow2a,$pow3a,$a2,$b2,$c2,$d2,$pow1b,$pow2b,$pow3b){
            $sql="SELECT * FROM yesfra";
            $stmt=$this->connect()->query($sql);
            if(!$stmt){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else{
                $sql="INSERT INTO yesfra(idUser, a1, b1, c1, d1, pow1a, pow2a, pow3a, a2, b2, c2, d2, pow1b, pow2b, pow3b) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt=$this->connect()->prepare($sql);
                if(!$stmt){
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }
                else{
                    $stmt->execute([$idUser,$a1,$b1,$c1,$d1,$pow1a,$pow2a,$pow3a,$a2,$b2,$c2,$d2,$pow1b,$pow2b,$pow3b]);
                   
                }
                
           }
    }
   }
?>