<?php
    $page = "Password Reset";
    $styles = '<link rel="stylesheet" href="./styles/login.css">';
    $HeaderLogo = 'no';
    include_once './parts/header.php';
    include_once './parts/logoThick.svg';
    $errMail = 0;
    if(isset($_GET['err'])){
        if($_GET['err'] == 'mail'){echo '<p class="errMsg">No users with this e-mail registered</p>'; $errMail = 1;};
        if($_GET['err'] == 'empt'){echo '<p class="errMsg">Enter an e-mail address</p>'; $errMail = 1;};
        if($_GET['err'] == 'dbConn'){echo '<p class="errMsg">Failed to connect to the database. Please try again later.</p>';};
        if($_GET['err'] == 'fail'){echo '<p class="errMsg">Failed send a link</p>';};
        if($_GET['err'] == 'pwdMtch'){echo '<p class="errMsg">Passwords don\'t match</p>';};
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
    <form action="functions/pwdRstMail.php" method="POST">
        <p style="text-align:justify">Enter the e-mail address you used to register and I will send you a link to reset your password.</p>
        <input maxlength="65" class="fld <?php if($errMail == 1){echo 'errFld';}?>" type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
        <button type="submit" name="pwdRstMl">Send link</button>
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
            echo '<p class="errMsg">The link has expired. Please send a new link.</p>';
?>
    <form action="functions/pwdRstMail.php" method="POST">
        <p style="text-align:justify">Enter the e-mail address you used to register and I will send you a link to reset your password.</p>
        <input maxlength="65" class="fld <?php if($errMail == 1){echo 'errFld';}?>" type="text" name="email" placeholder="E-mail" <?php if(isset($_GET['email'])){echo 'value="'.$_GET['email'].'"';}?>>
        <button type="submit" name="pwdRstMl">Send link</button>
    </form>
<?php }else{ ?>
    <form action="functions/pwdRst.php?<?php echo 'selector='.$_GET['selector'].'&validator='.$_GET['validator']?>" method="POST">
        <div class="fld pwdDiv <?php if($errPwd == 1){echo 'errFld';};?>">
            <input type="password" name="pwd" placeholder="New Password">
            <svg class="eyePwd" width="33" height="33" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white" />
            </svg>
            <p class="tooltipPwd" style="opacity:0">Show</p>
        </div>
        <div class="fld pwdDiv <?php if($errPwdRpt == 1){echo 'errFld';};?>">
            <input type="password" name="pwdRpt" placeholder="Repeat New Password">
            <svg class="eyePwd" width="33" height="33" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z" fill="white" />
            </svg>
            <p class="tooltipPwd" style="opacity:0">Show</p>
        </div>
        <button type="submit" name="pwdRst">Reset</button>
    </form>
<?php };
    elseif(isset($_GET['msg']) && $_GET['msg'] == 'scs'):
?>
    <p style="text-align:center">The link was sent to your e-mail!</p>
<?php endif;?>
<?php include_once './parts/footer.php';?>
<script type="text/javascript" src="./scripts/Flds.js"></script>
