<?php
if(isset($_POST['pwdRst'])){
    require 'db.php';

    $selector = $_GET['selector'];
    $validator = $_GET['validator'];
    $pwd = $_POST['pwd'];
    $pwdRpt = $_POST['pwdRpt'];

    if(empty($pwd) || empty($pwdRpt)){
        if(empty($pwd)){$pwdEmp=1;}else{$pwdEmp=0;}
        if(empty($pwdRpt)){$pwdRptEmp=1;}else{$pwdRptEmp=0;}
        header('Location: ../pwdRst.php?err=empty&pwdEmp='.$pwdEmp.'&pwdRptEmp='.$pwdRptEmp.'&selector='.$selector.'&validator='.$validator);
        exit();
    }elseif($pwd != $pwdRpt){
        header('Location: ../pwdRst.php?err=pwdMtch&selector='.$selector.'&validator='.$validator);exit();
    }elseif(empty($selector) || empty($validator)){
        header('Location: ../login.php?err=val');exit();
    }elseif(ctype_xdigit($selector) == true && ctype_xdigit($validator) == true){
        $currentDate = date('U');
        $selPwdResU = "SELECT * FROM pwdreset WHERE selector=?";
        $stmt = mysqli_stmt_init($db);

        if(!mysqli_stmt_prepare($stmt,$selPwdResU)){header('Location: ../pwdRst.php?err=dbConn');exit();}

        mysqli_stmt_bind_param($stmt,'s',$selector);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(!$row = mysqli_fetch_assoc($result)){header('Location: ../pwdRst.php?err=dbConn');exit();}

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin,$row['token']);

        if($tokenCheck == true){
            $pwdRst = "UPDATE users SET pwd=? WHERE email=?";
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            if(!mysqli_stmt_prepare($stmt,$pwdRst)){header('Location: ../pwdRst.php?err=dbConn');exit();}
            mysqli_stmt_bind_param($stmt,'ss',$hashedPwd,$row['email']);
            mysqli_stmt_execute($stmt);

            $delTok = "DELETE FROM pwdreset WHERE email=?";
            if(!mysqli_stmt_prepare($stmt,$delTok)){header('Location: ../pwdRst.php?err=dbConn');exit();}
            mysqli_stmt_bind_param($stmt,'s',$row['email']);
            mysqli_stmt_execute($stmt);

            header('Location: ../login.php?msg=pwdRst');exit();
        }else{
            header('Location: ../pwdRst.php?err=val');exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($db);
    }
}else{
    header('Location:../index.php');exit();
}
