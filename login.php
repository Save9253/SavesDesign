<?php
    $page = "Login";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    $HeaderLogo = 'no';

    include_once './parts/header.php';

    echo '<a id="logoLink" href="index.php">';
    include "parts/logoThick.svg";
    echo '</a>';

    if(isset($_GET['msg'])){
        if($_GET['msg']=="scs"){echo '<div class="msg" role="alert">You are registered successfully!<br>Use your Username or E-mail to log in.</div>';};
        if($_GET['msg']=="lgdOut"){echo '<div class="msg" role="alert">You are logged out!</div>';};
        if($_GET['msg']=="pwdRst"){echo '<div class="msg" role="alert">Your password was successfully reset. You can now log in with your new password!</div>';};
    }
    if(isset($_GET['err'])){
        if($_GET['err']=='empty'){echo '<div class="errMsg" role="alert">Fill in all the fields</div>';};
        if($_GET['err']=='dbConn'){echo '<div class="errMsg" role="alert">Failed to connect to the database. Please try again later.</div>';};
        if($_GET['err']=='noU'){echo '<div class="errMsg" role="alert">No such user found</div>';};
        if($_GET['err']=='pwd'){echo '<div class="errMsg" role="alert">Password is incorrect</div>';};
        if($_GET['err']=='val'){echo '<div class="errMsg" role="alert">Could not validate your request</div>';};
    }
    $errName = 0;
    if(isset($_GET['err']) && (($_GET['err']=='empty' && empty($_GET['uname'])) || $_GET['err'] == 'noU')){$errName = 1;};

    $errPwd = 0;
    if(isset($_GET['err']) && ((isset($_GET['pwdEmp']) && $_GET['pwdEmp']==1) || $_GET['err']=='pwd')){$errPwd = 1;}
    if(!isset($_SESSION['uname'])):

    if(isset($_GET['Dbug'])){echo $_GET['Dbug'];}
?>
<form aria-label="Log in" action="functions/login.php" method="POST">
    <input aria-invalid="<?php if($errName == 1){echo "true";}else{echo 'false';};?>" aria-label="Username or E-mail" aria-required="true" class="fld <?php if($errName == 1){echo "errFld";};?>" type="text" name="uname" placeholder="Username or E-mail" <?php if(isset($_GET['uname'])){echo 'value="'.$_GET['uname'].'"';};?>>
    <div aria-label="Password Field" class="fld pwdDiv <?php if($errPwd == 1){echo 'errFld';};?>">
        <input aria-invalid="<?php if($errPwd == 1){echo "true";}else{echo 'false';};?>" aria-label="Password" aria-required="true" type="password" name="pwd" placeholder="Password">
        <button aria-pressed="false" aria-label="Show Password" aria-pressed="false" type="button" class="icon eyePwd">
            <svg aria-label="Closed eye" role="img" width="25" height="22" viewBox="0 0 30 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white"></path>
            </svg>
        </button>
        <div aria-label="Show Password Label" class="tooltipPwd" style="opacity:0">Show</div>
    </div>
    <?php if(isset($_GET['err']) && $_GET['err'] == 'pwd'){echo '<a id="forgotPwd" href="pwdRst.php">Forgot your password?</a>';}?>
    <button class="btn" type="submit" name="login">Login</button>
</form>
<?php
    if(!(isset($_GET['msg']) && $_GET['msg']=="scs")){
        include_once './parts/sepr.html';
        echo '<a aria-label="Register" href="register.php" id="RegBtn" class="btn">Register</a>';
    };
    else:
?>
<div role="alert" class="errMsg">You are already logged in!</div>
<a href="./functions/logout.php" class="btn">Log out</a>
<?php
    endif;
    include_once './parts/footer.php';
?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
<script type="text/javascript" src="./scripts/winkLogo.js"></script>
