<?php
    $page = "Login";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    $HeaderLogo = 'no';
    include_once './parts/header.php';
    include_once './parts/logoThick.svg';
    if(isset($_GET['msg'])){
        if($_GET['msg']=="scs"){echo '<div class="msg">You are registered successfully!<br>Use your Username or E-mail to log in.</div>';};
        if($_GET['msg']=="lgdOut"){echo '<div class="msg">You are logged out!</div>';};
        if($_GET['msg']=="pwdRst"){echo '<div class="msg">Your password was successfully reset. You can now log in with your new password!</div>';};
    }
    if(isset($_GET['err'])){
        if($_GET['err']=='empty'){echo '<div class="errMsg">Fill in all the fields</div>';};
        if($_GET['err']=='dbConn'){echo '<div class="errMsg">Failed to connect to the database. Please try again later.</div>';};
        if($_GET['err']=='noU'){echo '<div class="errMsg">No such user found</div>';};
        if($_GET['err']=='pwd'){echo '<div class="errMsg">Password is incorrect</div>';};
        if($_GET['err']=='val'){echo '<div class="errMsg">Could not validate your request</div>';};
    }
    $errName = 0;
    if(isset($_GET['err']) && (($_GET['err']=='empty' && empty($_GET['uname'])) || $_GET['err'] == 'noU')){$errName = 1;};

    $errPwd = 0;
    if(isset($_GET['err']) && ((isset($_GET['pwdEmp']) && $_GET['pwdEmp']==1) || $_GET['err']=='pwd')){$errPwd = 1;}
    if(!isset($_SESSION['uname'])):

    if(isset($_GET['Dbug'])){echo $_GET['Dbug'];}
?>
<form action="functions/login.php" method="POST">
    <input class="fld <?php if($errName == 1){echo "errFld";};?>" type="text" name="uname" placeholder="Username or E-mail" <?php if(isset($_GET['uname'])){echo 'value="'.$_GET['uname'].'"';};?>>
    <div class="fld pwdDiv <?php if($errPwd == 1){echo 'errFld';};?>">
        <input  type="password" name="pwd" placeholder="Password">
        <svg class="eyePwd" width="33" height="33" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white" />
        </svg>
        <div class="tooltipPwd" style="opacity:0">Show</div>
    </div>
    <?php if(isset($_GET['err']) && $_GET['err'] == 'pwd'){echo '<a id="forgotPwd" href="pwdRst.php">Forgot your password?</a>';}?>
    <button class="btn" type="submit" name="login">Login</button>
</form>
<?php
    if(!(isset($_GET['msg']) && $_GET['msg']=="scs")){
        include_once './parts/sepr.html';
        echo '<form action="register.php"><button class="btn" type="submit">Register</button></form>';
    };
    else:
?>
<div class="errMsg">You are already logged in!</div>
<form action="./functions/logout.php"><button class="btn" type="submit">Logout</button></form>
<?php
    endif;
    include_once './parts/footer.php';
?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
