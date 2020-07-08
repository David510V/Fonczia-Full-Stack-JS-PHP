<?php include 'header.php' ?>

<h1 class="head1 text-center">הרשמה</h1>
    <form action="includes/sign.inc.php" method="post" class="form-group signup">
        <p>:שם משתמש</p>
        <input class="form-control" type="text" name="username">
        <p>:בית ספר</p>
        <input class="form-control" type="text" name="school" id="">
        <p>:סיסמה</p>
        <input class="form-control" type="password" name="password">
        <p>:חזור על הסיסמה</p>
        <input class="form-control" type="password" name="password-rep">

        <button type="submit" name="signup-submit" class="btn btn-primary">הירשם!</button>
    </form>

<?php include 'footer.php' ?>