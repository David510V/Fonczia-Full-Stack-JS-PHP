<?php 
    include_once 'db.class.php';
    class getFn extends dbase{

        public function getFunction(){
         $sql="SELECT * FROM nofra";
        $stmt=$this->connect()->query($sql);
          if(!$stmt){
             header("Location: ../index.php?error=sqlerror");
            exit();
          }
          else{
              $stmt=$this->connect()->prepare("SELECT * FROM nofra WHERE idUser= :name");
              $stmt->bindParam(':name',$_SESSION['userId']);
              $stmt->execute();
              while($row=$stmt->fetch()){
                  $a=$row['a'].'X <sup>'.$row['pow1'].'</sup> +';
                  $b=$row['b'].'X <sup>'.$row['pow2'].'</sup> +';
                  $d=$row['d'].'X <sup>'.$row['pow3'].'</sup> +';
                  $c=$row['c'];
                  if(empty($row['a'])){
                    $a='';
                  }
                  if(empty($row['b'])){
                    $b='';
                  }
                  if(empty($row['d'])){
                      $d='';
                  }
                  if(empty($row['c'])){
                    $c='';
                  }
                  echo 'y= '.$a.''.$b.''.$d.''.$c.''.'<br><br>
                  <div>
                  <canvas id='.$_SESSION['userId'].'></canvas>
                  </div>
                  
                  <hr>';
              } 
               
          }
        }
    }


?>