<?php
    session_start();
    if(!isset($_SESSION['uname'])){
        exit(header('Location:../login.php?msg=login'));
    }else{
        if(isset($_GET['requested'])){
            $uname = $_SESSION['uname'];
            $services = implode(',',array_keys($_SESSION['cart']));
            $qtys = implode(",",$_SESSION['cart']);

            require 'db.php';
            if($db){
                $stmt = mysqli_stmt_init($db);
                $query = "INSERT INTO `requested`(`uname`, `services`, `qtys`) VALUES (?,?,?)";
                if(!mysqli_stmt_prepare($stmt,$query)){
                    header('Location:../failed.php');exit();
                }else{
                    mysqli_stmt_bind_param($stmt,'sss',$uname,$services,$qtys);
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
            }else{
                exit(header('Location:../failed.php'));
            }
        }
        exit(header('Location:../profile.php'));
    }
