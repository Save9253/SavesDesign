<?php
if(isset($_POST['register'])){
    require 'db.php';

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRpt = $_POST['pwdRpt'];

    if(empty($uname) || empty($email) || empty($pwd) || empty($pwdRpt)){
        if(empty($pwd)){$pwdEmp=1;}else{$pwdEmp=0;}
        if(empty($pwdRpt)){$pwdRptEmp=1;}else{$pwdRptEmp=1;}
        header('Location: ../register.php?err=empty&uname='.$uname.'&email='.$email.'&pwdEmp='.$pwdEmp.'&pwdRptEmp='.$pwdRptEmp);
        exit();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-z0-9]*$/', $uname)){
        header('Location: ../register.php?err=invlMailUname&uname='.$uname.'&email='.$email);exit();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: ../register.php?err=invlMail&uname='.$uname.'&email='.$email);exit();
    }elseif(!preg_match('/^[a-zA-z0-9]*$/', $uname)){
        header('Location: ../register.php?err=invlUname&uname='.$uname.'&email='.$email);exit();
    }elseif($pwd!=$pwdRpt){
        header('Location: ../register.php?err=pwdMtch&uname='.$uname.'&email='.$email);exit();
    }else{
        $stmt = mysqli_stmt_init($db);
        $unameSel = "SELECT uname FROM users WHERE uname=?";
        if(!mysqli_stmt_prepare($stmt,$unameSel)){
            header('Location: ../register.php?err=dbConn&uname='.$uname.'&email='.$email);exit();
        }else{
            mysqli_stmt_bind_param($stmt,'s',$uname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)>0){
                header('Location: ../register.php?err=unameTkn&uname='.$uname.'&email='.$email);exit();
            }else{
                $newU = "INSERT INTO users (uname,email,pwd) VALUES (?,?,?)";
                if(!mysqli_stmt_prepare($stmt,$newU)){
                    header('Location: ../register.php?err=dbConn&uname='.$uname.'&email='.$email);exit();
                }else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,'sss',$uname,$email,$hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header('Location: ../login.php?msg=scs&uname='.$uname);exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($db);
}else{
    header('Location: ../register.php?');exit();
}
