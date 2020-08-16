<?php
    $page ='Register';
    $styles='<link rel="stylesheet" href="./styles/login.css">';
    include_once 'header.php';
    include './parts/logoThin.php';
    if(isset($_GET['err'])){
        echo '<p class="errMsg">';
        if($_GET['err']='empty'){echo 'Fill in all the fields!';}
        echo '</p>';
    }
?>
<form action="functions/register.php" method="POST">
    <input class="<?php if(isset($_GET['name'])&&empty($_GET['name'])){echo 'errFld';}?>" type="text" name="name" placeholder="Username" <?php if(isset($_GET['name'])){echo 'value="'.$_GET['name'].'"';}?>>
    <input class="<?php if(isset($_GET['email'])&&empty($_GET['email'])){echo 'errFld';}?>" type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
    <input class="<?php if(isset($_GET['pwdEmp'])&&$_GET['pwdEmp']==1){echo 'errFld';}?>" type="password" name="pwd" placeholder="Password">
    <input class="<?php if(isset($_GET['pwdRptEmp'])&&$_GET['pwdRptEmp']==1){echo 'errFld';}?>"type="password" name="pwdRpt" placeholder="Repeat Password">
    <button type="submit">Register</button>
</form>
<script type="text/javascript" src="./scripts/errFld.js"></script>
<?php include_once 'footer.php'?>
