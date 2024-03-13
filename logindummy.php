<?php
    session_start();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    echo $_SESSION['email'];
?>

<form action="#" method="POST">
    email
    <input type="text" name="email"> <br>
    password
    <input type="text" name="password"> <br>
    <input type="submit" name="confirm">
</form>