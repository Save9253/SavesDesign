<?php
    $page = "Login";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    include_once './parts/header.php';
    include_once './parts/logoThick.svg';
    if(isset($_GET['msg'])){
        if($_GET['msg']=="scs"){echo '<p class="msg">You are registered successfully!<br>Use your Username or E-mail to log in.</p>';};
        if($_GET['msg']=="lgdOut"){echo '<p class="msg">You are logged out!</p>';};
        if($_GET['msg']=="pwdRst"){echo '<p class="msg">Your password was successfully reset. You can now log in with your new password!</p>';};
    }
    if(isset($_GET['err'])){
        if($_GET['err']=='empty'){echo '<p class="errMsg">Fill in all the fields</p>';};
        if($_GET['err']=='dbConn'){echo '<p class="errMsg">Failed to connect to the database. Please try again later.</p>';};
        if($_GET['err']=='noU'){echo '<p class="errMsg">No such user found</p>';};
        if($_GET['err']=='pwd'){echo '<p class="errMsg">Password is incorrect</p>';};
        if($_GET['err']=='val'){echo '<p class="errMsg">Could not validate your request</p>';};
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
        <p class="tooltipPwd" style="opacity:0">Show</p>
    </div>
    <?php if(isset($_GET['err']) && $_GET['err'] == 'pwd'){echo '<a id="forgotPwd" href="pwdRst.php">Forgot your password?</a>';}?>
    <button type="submit" name="login">Login</button>
</form>
<?php
    if(!(isset($_GET['msg']) && $_GET['msg']=="scs")){
        include_once './parts/sepr.html';
        echo '<form action="register.php"><button type="submit">Register</button></form>';
    };
    else:
?>
<p class="errMsg">You are already logged in!</p>
<form action="./functions/logout.php"><button type="submit">Logout</button></form>
<?php
    endif;
    include_once './parts/footer.php';
?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
