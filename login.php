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
        if($_GET['msg']=="login"){echo '<div class="msg" role="alert">You have to log in to continue.</div>';};
    }
?>
<div role="alert" id="msgFBErr" class="errMsg hid"></div>
<div role="alert" id="msgEmptyFlds" class="errMsg hid">Fill in all the fields</div>
<div id="loginDiv" class="hid">
    <form aria-label="Log in">
        <input aria-invalid="false" aria-label="E-mail" aria-required="true" class="fld" type="text" id="mailIn" placeholder="E-mail" >
        <div aria-label="Password Field" class="fld pwdDiv">
            <input aria-invalid="false" aria-label="Password" aria-required="true" type="password" id="pwdIn" placeholder="Password">
            <button aria-pressed="false" aria-label="Show Password" type="button" class="icon eyePwd">
                <svg aria-label="Closed eye" role="img" width="25" height="22" viewBox="0 0 30 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white"></path>
                </svg>
            </button>
            <div aria-label="Show Password Label" class="tooltipPwd" style="opacity:0">Show</div>
        </div>
        <a id="forgotPwd" href="pwdRst.php">Forgot your password?</a>
        <label class="checkboxLabl">
            <input class="checkbox" name="remeber" type="checkbox">
            <span>
                <svg class="checkboxSVG" aria-label="Check Mark" role="img" overflow="visible" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 8L6 8L6 8L6 8Z" fill="white"></path>
                </svg>
            </span>Remeber me
        </label>
        <button class="btn" type="button" id="loginBtn">Login</button>
    </form>
    <?php
        if(!(isset($_GET['msg']) && $_GET['msg']=="scs")){
            include_once './parts/sepr.html';
            echo '<a aria-label="Register" href="register.php" id="RegBtn" class="btn">Register</a>';
        };

    ?>
</div>
<div id="msgSignedIn" class="hid"> 
    <div role="alert" class="errMsg">You are already logged in!</div>
    <button id="logoutBtn" class="btn">Log out</a>
</div>
<?php include_once './parts/footer.php'?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
<script type="text/javascript" src="./scripts/login.js"></script>

