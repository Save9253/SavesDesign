<?php
    $page ='Register';
    $styles='<link rel="stylesheet" href="./styles/login.css">';
    $HeaderLogo = 'no';
    include_once './parts/header.php';

    echo '<a id="logoLink" href="index.php">';
    include "parts/logoThick.svg";
    echo '</a>';
?>
<div role="alert" id="msgEmptyFlds" class="errMsg hid">Fill in all the fields</div>
<div role="alert" id="msgValMl"class="errMsg hid">Enter a valid e-mail address</div>
<div role="alert" id="msgPwdLength" class="errMsg hid">Password should be at least 6 characters</div>
<div role="alert" id="msgPwdMtch" class="errMsg hid">Passwords don't match</div>
<div role="alert" id="msgFBErr" class="errMsg hid"></div>
<form aria-label="Register">
    <input aria-invalid="false" aria-label="E-mail" maxlength="65" id="mailIn" class="fld" type="text" placeholder="E-mail">
    <div aria-label="Password Field" class="fld pwdDiv" id="pwdFld">
        <input aria-invalid="false" aria-label="Password" id="pwdIn" type="password" placeholder="Password">
        <button aria-pressed="false" aria-label="Show Password" type="button" class="icon eyePwd">
            <svg aria-label="Closed eye" role="img" width="25" height="22" viewBox="0 0 30 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white"></path>
            </svg>
        </button>
        <div aria-label="Show Password Label" class="tooltipPwd" style="opacity:0">Show</div>
    </div>
    <div aria-label="Repeat Password Field" class="fld pwdDiv" id="pwdRptFld">
        <input aria-invalid="false" aria-label="Repeat Password" type="password" id="pwdRptIn" placeholder="Repeat Password">
        <button aria-pressed="false" aria-label="Show Password" type="button" class="icon eyePwd">
            <svg aria-label="Closed eye" role="img" width="25" height="22" viewBox="0 0 30 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white"></path>
            </svg>
        </button>
        <div aria-label="Show Password Label" class="tooltipPwd" style="opacity:0">Show</div>
    </div>
    <button class="btn" id="register" type="button">Register</button>
</form>
<?php include_once './parts/footer.php'?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
<script type="text/javascript" src="./scripts/register.js"></script>
