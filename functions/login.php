<?php
if(isset($_POST['login'])){
    require 'db.php';
    $mailUname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    if(empty($mailUname) || empty($pwd)){
        if(empty($pwd)){$pwdEmp=1;}else{$pwdEmp=0;}
        header('Location: ../login.php?err=empty&uname='.$mailUname.'&pwdEmp='.$pwdEmp);exit();
    }else{
        $stmt = mysqli_stmt_init($db);
        $unameFind = "SELECT * FROM users WHERE uname=? OR email=?;";
        if(!mysqli_stmt_prepare($stmt,$unameFind)){
            header('Location: ../login.php?err=dbConn&uname='.$mailUname);exit();
        }else{
            mysqli_stmt_bind_param($stmt,'ss',$mailUname,$mailUname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                print_r($row);
                $pwdCheck = password_verify($pwd,$row['pwd']);
                if($pwdCheck == true){
                    session_start();
                    $_SESSION['uname']=$row['uname'];
                    header('Location: ../profile.php');exit();
                }else{
                    header('Location: ../login.php?err=pwd&uname='.$mailUname);exit();
                }
            }else{
                header('Location: ../login.php?err=noU&uname='.$mailUname);exit();
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($db);
}else{
    header('Location: ../login.php');
    exit();
}
