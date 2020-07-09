<?php include 'header.php' ?>

<h1 class="head1 text-center">היסטוריה</h1>

    <div class="container-fluid p-5">
        <div class="row">
            
            <div class="col-md-12 text-center">
                <?php
                $userName=$_SESSION['userName'];
                $school= $_SESSION['school'];
                 echo " <h2>  $userName :שם</h2>";
                 echo "<h2> בית ספר: $school</h2>";
                 ?>
                <div class="wrapper">
                    <div class="title">
                        <h2>בלי שבר</h2>
                        <?php
                            include './classes/getFn.class.php';
                            $getFn= new getFn;
                            $getFn->getFunction();
                        ?>
                    </div>
                    <div class="canvas">
                        <h2>עם שבר</h2>
                       <?php 
                        include_once './classes/getYesFn.class.php';
                        $getYesFn=new getYesFn;
                        $getYesFn->getYesFunction();
                       ?>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
 
    
   <!-- Optional JavaScript -->
   <script src="historyFonczia.js"></script>

<?php include 'footer.php' ?>