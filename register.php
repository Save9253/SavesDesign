<?php
    $page ='Register';
    $styles='<link rel="stylesheet" href="./styles/login.css">';
    include_once 'header.php';
?>
<form action="functions/register.php" method="POST">
    <input type="text" name="name" placeholder="Username">
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwdRpt" placeholder="Repeat Password">
    <button type="submit">Register</button>
</form>
<?php include_once 'footer.php'?>
