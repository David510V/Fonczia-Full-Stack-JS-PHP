<?php include 'header.php' ?>
<h1 class="head">Fonczia-Math Functions Display</h1>

<?php
   include 'classes/db.class.php';
   $obj=new dbase;
   $obj->connect();
?>
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-5" dir="rtl" >
              <div dir="rtl" style="float:left">
                <h4>ברוכים הבאים לFONCZIA! אפליקצית אינטרנט המוקדשת לתלמידי 3,4,5 יחידות מתמטיקה.</h4>
                <h6>מטרתה של האפליקציה היא לגרום לכם להבין את נושא הפונקציות בצורה ברורה יותר על מנת שתוכלו להצליח בבחינת הבגרות</h6>
                <br>
                <h6><b>כיצד משתמשים?</b></h6>
                <h6>יש לכם שני אפשרויות בחירה האחת: פונקציה ללא שבר, והשניה: פוקנציה עם שבר.</h6>
                <h6>תבחרו את סוג הפוקנציה התואמת לסוג הפוקנציה שאתם רוצים לחקור</h6>
                <h6>בריבועים הגדולים נסמן את הפרמטרים של האיקסים</h6>
                <h6>בריבועים הקטנים נסמן את המקדמים של האיקסים</h6>
                <h6>הריבוע שנמצא ללא אקס הוא בעצם C</h6>
                <h6>במידה ויש X או פרמטר או מקדם שלא קיים אצלכם בפוקנציה פשוט לא לכתוב כלום או לכתוב 0</h6>
                <h6>לא לכתוב במקדמים 0 כי אז זה יחשב לכם כ1 :)</h6>
                <br>
                <h6>לאחר שכתבתם את כל הנתונים לחצו על הכפתור.</h6>


                <p><b>*מספר הערות*</b>
                <br>
                נקודות החיתוך של ציר הX תצטרכו לחשב בעצמכם<br>
                <b>תפשטו את הפוקנציה שלכם, זה יקל על כתיבת המקדמים והפרמטים</b> <br>
                התוצאות שבטבלה לא יהיו תמיד מדויקות ולכן עליכם בכל מקרה לבצע פתרון בעצמכם. <br>
                המטרה של Fonczia היא לגרום לכם להבין את נושא הפונקציות ולא לפתור לכם את שיעורי הבית :)
                </p>
              </div>
                
                <input type="radio" id="firstFn" name="type" value="firstFn" onclick="typeOf(0)" checked>
                <label for="firstFn">ללא שבר</label><br>

                  <input type="radio" id="secondFn" name="type" value="secondFn" onclick="typeOf(1)">
                  <label for="secondFn">שבר</label><br>


                 <div id="first" dir="ltr">
                        <form id="form1" class="form-group" action="includes/createNoFn.include.php" action="javascript:void(0);" method="post" >
                        
                            <input class="parm " type="number" id="a" name="a" placeholder="A" >
                            <span class="myX mt-3">X</span>
                            <sup ><input class="smallParm" type="number" id="pow1" name="pow1" maxlength="1" size="1" placeholder="2"></sup> 
                        
                            <span class="myX mt-3">+</span> 
                        
                            <input class="parm" type="number" id="b" name="b" placeholder="B">
                            <span class="myX mt-3">X</span>
                            <sup><input class="smallParm" type="number" id="pow2" name="pow2" maxlength="1" size="1" placeholder="2"></sup> 
                        
                            <span class="myX mt-3">+</span>

                            <input class="parm" type="number" id="d" name="d" placeholder="D">
                            <span class="myX mt-3">X</span> 
                            <sup><input class="smallParm" type="number" id="pow3" name="pow3" maxlength="1" size="1" placeholder="2"></sup>
                            
                            <span class="myX mt-3">+</span> 

                            <input class="parm" type="number" id="c" name="c" placeholder="C">
                            <br><br>
                            <?php if(isset($_SESSION['userName'])){
                                echo "<button type='submit' name='create-nofn'  class='btn btn-primary' onclick='callChartFirst()'> כפתור </button><br><br>";
                            }else{
                              echo "<button type='button' class='btn btn-primary' onclick='callChartFirst()'> כפתור </button><br><br>";
                            } ?>
                        </form>
                    

                    <table class="table table table-bordered" >
                      <thead>
                        <tr>
                          <th scope="col">תחום הגדרה</th>
                          <th scope="col">נקודות קיצון</th>
                          <th scope="col">תחומי עליה וירידה</th>
                          <th scope="col">נקודות חיתוך עם הצירים</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td >
                            <div id="gender">X כל</div>
                          </td>
                          <td id="extremeDots">
                            
                          </td>
                          <td  dir="rtl">
                            עליה: 
                            <div id="UpDown">

                            </div>
                            ירידה: 
                            <div id="DownToUp">

                            </div>
                          </td>
                          <td id="cutPoints">
                            X: 0 <br>
                            Y: 
                          </td>
                        </tr>
                      </tbody>
                    </table>
                 </div>





                 <div id="second"  dir="ltr">
                    <form class="form-group" action="includes/createYesFn.include.php" action="javascript:void(0);" method="post">
                        
                            <h4>מונה</h4>
                        <input class="parm " type="number" id="a1" name="a1" placeholder="A" >
                        <span class="myX mt-3">X</span>
                        <sup ><input class="smallParm" type="number" id="pow1a" name="pow1a" maxlength="1" size="1" placeholder="2"></sup> 
                    
                        <span class="myX mt-3">+</span> 
                    
                        <input class="parm" type="number" id="b1" name="b1" placeholder="B">
                        <span class="myX mt-3">X</span>
                        <sup><input class="smallParm" type="number" id="pow2a" name="pow2a" maxlength="1" size="1" placeholder="2"></sup> 
                    
                        <span class="myX mt-3">+</span>

                        <input class="parm" type="number" id="d1" name="d1" placeholder="D">
                        <span class="myX mt-3">X</span> 
                        <sup><input class="smallParm" type="number" id="pow3a" name="pow3a" maxlength="1" size="1" placeholder="2"></sup>
                        
                        <span class="myX mt-3">+</span> 

                        <input class="parm" type="number" id="c1" name="c1" placeholder="C">
                        

                        
                        <hr width="100%" style="border: 2px black solid;">
                        
                        
                        
                        
                         <h4>מכנה</h4>
                        <input class="parm " type="number" id="a2" name="a2" placeholder="A" >
                        <span class="myX mt-3">X</span>
                        <sup ><input class="smallParm" type="number" id="pow1b" name="pow1b" maxlength="1" size="1" placeholder="2"></sup> 
                    
                        <span class="myX mt-3">+</span> 
                    
                        <input class="parm" type="number" id="b2" name="b2" placeholder="B">
                        <span class="myX mt-3">X</span>
                        <sup><input class="smallParm" type="number" id="pow2b" name="pow2b" maxlength="1" size="1" placeholder="2"></sup> 
                    
                        <span class="myX mt-3">+</span>

                        <input class="parm" type="number" id="d2" name="d2" placeholder="D">
                        <span class="myX mt-3">X</span> 
                        <sup><input class="smallParm" type="number" id="pow3b" name="pow3b" maxlength="1" size="1" placeholder="2"></sup>
                        
                        <span class="myX mt-3">+</span> 

                        <input class="parm" type="number" id="c2" name="c2" placeholder="C">
                        <br><br><br>
                        <?php if(isset($_SESSION['userName'])){
                                echo "<button type='submit' name='create-yesfn'  class='btn btn-primary' onclick='callChartSecond()'> כפתור </button><br><br>";
                            }else{
                              echo "<button type='submit' class='btn btn-primary' onclick='callChartSecond()'> כפתור </button><br><br>";
                            } ?>
                        
                    </form><br><br>
                    <table class="table table table-bordered" >
                      <thead>
                        <tr>
                          <th scope="col">תחום הגדרה</th>
                          <th scope="col">נקודות קיצון</th>
                          <th scope="col">תחומי עליה וירידה</th>
                          <th scope="col">נקודות חיתוך עם הצירים</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td id="gender1">כל X</td>
                          <td id="extremeDots1">
                            
                          </td>
                          <td  dir="rtl">
                            עליה: 
                            <div id="UpDown1">

                            </div>
                            ירידה: 
                            <div id="DownToUp1">

                            </div>
                          </td>
                          <td>
                            X: 0 <br>
                            Y: <span id="cutPoints1"></span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    
                 </div>
                 
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h2>הגרף</h2>
                
                  <canvas id="myChart"></canvas>
                
                  
            </div>
          
        </div>
    </div>
 
 
    <?php include 'footer.php' ?>