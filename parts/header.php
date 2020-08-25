<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/general.css">
    <?php if(isset($styles)){echo $styles;}?>
    <link rel="shortcut icon" href="./imgs/SavesDesignFavicon.png">
    <title><?php echo $page?> | Save's Design</title>
</head>
<body>
<header>
    <?php if($HeaderLogo == 'yes'):?>
    <a id="logoLink" href="index.php"><?php include "parts/logoThin.svg";?></a>
    <?php endif;?>
    <nav id="descNav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if($page !== 'Login'):?>
            <li><a href="login.php"><?php if(isset($_SESSION['uname'])){echo $_SESSION['uname'];}else{echo 'Log in';}?></a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>
<section id="content">
