<?php
    $page = "Login";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    include_once 'header.php';
    include_once './parts/logoThin.php';
?>
<form action="functions/login.php" method="POST">
    <input type="text" name="name" placeholder="Username or E-mail">
    <input type="password" name="pwd" placeholder="Password">
    <button type="submit">Login</button>
</form>
<?php include_once './parts/sepr.php'?>
<form action="register.php"><button type="submit">Register</button></form>
<?php include_once 'footer.php'?>
