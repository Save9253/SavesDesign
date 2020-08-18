<?php
    $page ='Register';
    $styles='<link rel="stylesheet" href="./styles/login.css">';
    include_once 'header.php';
    include './parts/logoThin.php';
    if(isset($_GET['err'])){
        if($_GET['err']=='empty'){echo '<p class="errMsg">Fill in all the fields!</p>';}
        if($_GET['err']=='invlMail'||$_GET['err']=='invlMailUname'){echo '<p class="errMsg">Enter a valid e-mail adress!</p>';}
        if($_GET['err']=='invlUname'||$_GET['err']=='invlMailUname'){echo '<p class="errMsg">Enter a valid username!</p>';}
        if($_GET['err']=='pwdMtch'){echo '<p class="errMsg">The passwords don\'t match!</p>';}
        if($_GET['err']=='dbConn'){echo '<p class="errMsg">Failed to connect to the database!</p>';}
        if($_GET['err']=='unameTkn'){echo '<p class="errMsg">The username is already taken!</p>';}
    }
    $errMail = 0;
    if(
        ( isset($_GET['email']) && empty($_GET['email']) ) ||
        ( isset($_GET['err']) && ($_GET['err'] == 'invlMail' || $_GET['err'] == 'invlMailUname') )
    ){$errMail = 1;}

    $errName = 0;
    if(
        ( isset($_GET['uname']) && empty($_GET['uname']) ) ||
        ( isset($_GET['err']) && ($_GET['err'] == 'invlUname' || $_GET['err'] == 'invlMailUname' || $_GET['err'] == 'unameTkn'))
    ){$errName = 1;}

    $errPwd = 0;
    if(
        ( isset($_GET['pwdEmp']) && $_GET['pwdEmp'] == 1 ) ||
        ( isset($_GET['err']) && ($_GET['err'] == 'pwdMtch') )
    ){$errPwd = 0;}

    $errPwdRpt = 0;
    if(
        ( isset($_GET['pwdRptEmp']) && $_GET['pwdRptEmp'] == 1) ||
        ( isset($_GET['err']) && ($_GET['err'] == 'pwdMtch') )
    ){$errPwdRpt = 1;}
?>
<form action="functions/register.php" method="POST">
    <input maxlength="65" <?php if($errMail == 1){echo 'class="errFld"';}?> type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
    <input maxlength="65" <?php if($errName == 1){echo 'class="errFld"';}?> type="text" name="uname" placeholder="Username" <?php if(isset($_GET['uname'])){echo 'value="'.$_GET['uname'].'"';}?>>
    <input maxlength="65" <?php if($errPwd == 1){echo 'class="errFld"';}?> type="password" name="pwd" placeholder="Password">
    <input maxlength="65" <?php if($errPwdRpt == 1){echo 'class="errFld"';}?> type="password" name="pwdRpt" placeholder="Repeat Password">
    <button type="submit" name="register">Register</button>
</form>
<script type="text/javascript" src="./scripts/errFld.js"></script>
<?php include_once 'footer.php'?>
