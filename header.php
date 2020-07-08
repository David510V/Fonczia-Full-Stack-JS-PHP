<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonczia</title>
    <link rel="shortcut icon" type="image/png"  href="./fonczia.png">
    <link rel="stylesheet" href="css/Fonczia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/fontawesome.min.js" integrity="sha256-kfloLmH/F2aW936XePvhgKlJH4TZMn/nAG5oxtuiy8Q=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    
  </head>
<body>
  <?php
  if(isset($_SESSION['userName'])){
    $userName=$_SESSION['userName'];
      echo "<nav class='navbar navbar-expand-lg' dir='rtl'>
      <a class='navbar-brand' href='index.php'>דף הבית</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
        <i class='fas fa-bars'></i>
      </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
          <a class='nav-item nav-link' href='#'>היי $userName</a>
          <a class='nav-item nav-link' href='history.php'>היסטוריה</a>
          <a class='nav-item nav-link' href='includes/logout.inc.php'>התנתק</a>
        </div>
      </div>
    </nav>";
  } 
  else{
      echo "<nav class='navbar navbar-expand-lg' dir='rtl'>
      <a class='navbar-brand' href='index.php'>דף הבית</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
        <i class='fas fa-bars'></i>
      </button>
      <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
        <div class='navbar-nav'>
          <a class='nav-item nav-link' href='login.php'>התחבר</a>
          <a class='nav-item nav-link' href='signup.php'>הרשמה</a>
        </div>
      </div>
    </nav>";
  }
?>