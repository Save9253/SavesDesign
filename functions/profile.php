<?php
    session_start();
    if(!isset($_SESSION['uname'])){
        exit(header('Location:../login.php?msg=login'));
    }else{
        if(isset($_GET['requested'])){
            $_SESSION['requested'] = $_SESSION['cart'];
            unset($_SESSION['cart']);
        }
        exit(header('Location:../profile.php'));
    }
