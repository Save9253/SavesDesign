<?php
    $page = "Login";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    include_once 'header.php';
    include_once './parts/logoThin.php';
    if(isset($_GET['msg'])){
        if($_GET['msg']=="scs"){echo '<p class="msg">You are registered successfully!<br>Use your Username or E-mail to log in.</p>';};
        if($_GET['msg']=="lgdOut"){echo '<p class="msg">You are logged out!</p>';};
    }
    if(isset($_GET['err'])){
        if($_GET['err']=='empty'){echo '<p class="errMsg">Fill in all the fields!</p>';};
        if($_GET['err']=='dbConn'){echo '<p class="errMsg">Failed to connect to the database!</p>';};
        if($_GET['err']=='noU'){echo '<p class="errMsg">There is no such user!</p>';};
        if($_GET['err']=='pwd'){echo '<p class="errMsg">Wrong password!</p>';};
    }
    $errName = 0;
    if(isset($_GET['err']) && (($_GET['err']=='empty' && empty($_GET['uname'])) || $_GET['err'] == 'noU')){$errName = 1;};

    $errPwd = 0;
    if(isset($_GET['err']) && ((isset($_GET['pwdEmp']) && $_GET['pwdEmp']==1) || $_GET['err']=='pwd')){$errPwd = 1;}
    if(!isset($_SESSION['uname'])):
?>
<form action="functions/login.php" method="POST">
    <input <?php if($errName == 1){echo 'class="errFld"';};?> type="text" name="uname" placeholder="Username or E-mail" <?php if(isset($_GET['uname'])){echo 'value="'.$_GET['uname'].'"';};?>>
    <input <?php if($errPwd == 1){echo 'class="errFld"';};?> type="password" name="pwd" placeholder="Password">
    <button type="submit" name="login">Login</button>
</form>
<?php
    if(!(isset($_GET['msg']) && $_GET['msg']=="scs")){
        include_once './parts/sepr.php';
        echo '<form action="register.php"><button type="submit">Register</button></form>';
    };
    else:
?>
<p class="errMsg">You are already logged in!</p>
<form action="./functions/logout.php"><button type="submit">Logout</button></form>
<?php
    endif;
    include_once 'footer.php';
?>
<script type="text/javascript" src="./scripts/errFld.js"></script>
