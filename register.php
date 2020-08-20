<?php
    $page ='Register';
    $styles='<link rel="stylesheet" href="./styles/login.css">';
    include_once './parts/header.php';
    include './parts/logoThick.svg';
    if(isset($_GET['err'])){
        if($_GET['err']=='empty'){echo '<p class="errMsg">Fill in all the fields</p>';}
        if($_GET['err']=='invlMail'||$_GET['err']=='invlMailUname'){echo '<p class="errMsg">Enter a valid e-mail address</p>';}
        if($_GET['err']=='invlUname'||$_GET['err']=='invlMailUname'){echo '<p class="errMsg">Enter a valid username</p>';}
        if($_GET['err']=='pwdMtch'){echo '<p class="errMsg">Passwords don\'t match</p>';}
        if($_GET['err']=='dbConn'){echo '<p class="errMsg">Failed to connect to the database. Please try again later.</p>';}
        if($_GET['err']=='unameTkn'){echo '<p class="errMsg">Username is already taken</p>';}
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
    ){$errPwd = 1;}

    $errPwdRpt = 0;
    if(
        ( isset($_GET['pwdRptEmp']) && $_GET['pwdRptEmp'] == 1) ||
        ( isset($_GET['err']) && ($_GET['err'] == 'pwdMtch') )
    ){$errPwdRpt = 1;}
?>
<form action="functions/register.php" method="POST">
    <input maxlength="65" class="fld <?php if($errMail == 1){echo 'errFld';}?>" type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
    <input maxlength="65" class="fld <?php if($errName == 1){echo 'errFld';}?>" type="text" name="uname" placeholder="Username" <?php if(isset($_GET['uname'])){echo 'value="'.$_GET['uname'].'"';}?>>
    <div class="fld pwdDiv <?php if($errPwd == 1){echo 'errFld';};?>">
        <input type="password" name="pwd" placeholder="Password">
        <svg class="eyePwd" width="33" height="33" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white" />
        </svg>
        <p class="tooltipPwd" style="opacity:0">Show</p>
    </div>
    <div class="fld pwdDiv <?php if($errPwdRpt == 1){echo 'errFld';};?>">
        <input type="password" name="pwdRpt" placeholder="Repeat Password">
        <svg class="eyePwd" width="33" height="33" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white" />
        </svg>
        <p class="tooltipPwd" style="opacity:0">Show</p>
    </div>
    <button type="submit" name="register">Register</button>
</form>
<script type="text/javascript" src="./scripts/Flds.js"></script>
<?php include_once './parts/footer.php'?>
