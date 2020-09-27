<?php
    $page = "Password Reset";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    $HeaderLogo = 'no';
    include_once './parts/header.php';

    echo '<a id="logoLink" href="index.php">';
    include "parts/logoThick.svg";
    echo '</a>';

    $errMail = 0;
    if(isset($_GET['err'])){
        if($_GET['err'] == 'mail'){echo '<div role="alert" class="errMsg">No users with this e-mail registered</div> '; $errMail = 1;};
        if($_GET['err'] == 'empt'){echo '<div role="alert" class="errMsg">Enter an e-mail address</div> '; $errMail = 1;};
        if($_GET['err'] == 'dbConn'){echo '<div role="alert" class="errMsg">Failed to connect to the database. Please try again later.</div> ';};
        if($_GET['err'] == 'fail'){echo '<div role="alert" class="errMsg">Failed send a link</div> ';};
        if($_GET['err'] == 'pwdMtch'){echo '<div role="alert" class="errMsg">Passwords don\'t match</div> ';};
    }
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
<?php if(!isset($_GET['msg']) && !isset($_GET['selector'])):?>
    <form aria-label="Send link" action="functions/pwdRstMail.php" method="POST">
        <div role="alert" style="text-align:justify">Enter the e-mail address you used to register and I will send you a link to reset your password.</div>
        <input aria-invalid="<?php if($errMail == 1){echo "true";}else{echo 'false';};?>" aria-label="E-mail" maxlength="65" class="fld <?php if($errMail == 1){echo 'errFld';}?>" type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
        <button class="btn" type="submit" name="pwdRstMl">Send link</button>
    </form>
<?php elseif(isset($_GET['selector'])):
        require './functions/db.php';
        $currentDate = date('U');
        $selector = $_GET['selector'];
        $stmt = mysqli_stmt_init($db);
        $selPwdResU = "SELECT * FROM pwdreset WHERE selector=?";
        if(!mysqli_stmt_prepare($stmt,$selPwdResU)){header('Location: ../pwdRst.php?err=dbConn');exit();}
        mysqli_stmt_bind_param($stmt,'s',$selector);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){header('Location: ../pwdRst.php?err=dbConn');exit();}
        if($currentDate > $row['expires']){
            echo '<div role="alert" class="errMsg">The link has expired. Please send a new link.</div> ';
?>
    <form aria-label="Send link" action="functions/pwdRstMail.php" method="POST">
        <div role="alert" style="text-align:justify">Enter the e-mail address you used to register and I will send you a link to reset your password.</div>
        <input aria-invalid="<?php if($errMail == 1){echo "true";}else{echo 'false';};?>" aria-label="E-mail" maxlength="65" class="fld <?php if($errMail == 1){echo 'errFld';}?>" type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
        <button class="btn" type="submit" name="pwdRstMl">Send link</button>
    </form>
<?php }else{ ?>
    <form aria-label="Reset Password" action="functions/pwdRst.php?<?php echo 'selector='.$_GET['selector'].'&validator='.$_GET['validator']?>" method="POST">
        <div aria-label="Password Field" class="fld pwdDiv <?php if($errPwd == 1){echo 'errFld';};?>">
            <input aria-invalid="<?php if($errPwd == 1){echo "true";}else{echo 'false';};?>" aria-label="Password" type="password" name="pwd" placeholder="Password">
            <button aria-pressed="false" aria-label="Show Password" type="button" class="icon eyePwd">
                <svg aria-label="Closed eye" role="img" width="25" height="22" viewBox="0 0 30 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white"></path>
                </svg>
            </button>
            <div aria-label="Show Password Label" class="tooltipPwd" style="opacity:0">Show</div>
        </div>
        <div aria-label="Repeat Password Field" class="fld pwdDiv <?php if($errPwdRpt == 1){echo 'errFld';};?>">
            <input aria-invalid="<?php if($errPwdRpt == 1){echo "true";}else{echo 'false';};?>" aria-label="Repeat Password" type="password" name="pwdRpt" placeholder="Repeat Password">
            <button aria-pressed="false" aria-label="Show Password" type="button" class="icon eyePwd">
                <svg aria-label="Closed eye" role="img" width="25" height="22" viewBox="0 0 30 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white"></path>
                </svg>
            </button>
            <div aria-label="Show Password Label" class="tooltipPwd" style="opacity:0">Show</div>
        </div>
        <button class="btn" type="submit" name="pwdRst">Reset</button>
    </form>
<?php };
    elseif(isset($_GET['msg']) && $_GET['msg'] == 'scs'):
?>
    <div role="alert" style="text-align:center">The link was sent to your e-mail!</div>
<?php endif;?>
<?php include_once './parts/footer.php';?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
<script type="text/javascript" src="./scripts/winkLogo.js"></script>
