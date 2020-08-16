<?php
include_once 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwdRpt = $_POST['pwdRpt'];

if(empty($name) || empty($email) || empty($pwd) || empty($pwdRpt)){
    if(empty($pwd)){$pwdEmp=1;}else{$pwdEmp=0;}
    if(empty($pwdRpt)){$pwdRptEmp=1;}else{$pwdRptEmp=1;}
    header('Location: ../register.php?err=empty&name='.$name.'&email='.$email.'&pwdEmp='.$pwdEmp.'&pwdRptEmp='.$pwdRptEmp);
    exit();
}
