<?php include 'header.php' ?>

<h1 class="head1 text-center">התחברות</h1>
    <form action='includes/log.inc.php' method='post' class="form-group signup">
        <p>:שם משתמש</p>
        <input class="form-control" type="text" name="username">
        <p>:סיסמה</p>
        <input class="form-control" type="password" name="password">
        <button type="submit" name='login-submit' class="btn btn-primary">התחבר</button>
    </form>

<?php include 'footer.php' ?>