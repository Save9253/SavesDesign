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
            <?php if($page !== 'Login'):?>
            <li><a href="login.php"><?php if(isset($_SESSION['uname'])){echo $_SESSION['uname'];}else{echo 'Log in';}?></a></li>
            <?php endif;?>
            <li>
                <button class="icon">
                    <svg id="hamburger" width="20" height="17" viewBox="0 0 20 17" fill="var(--dr)" xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="3"/>
                        <rect width="20" height="3" y="7"/>
                        <rect width="20" height="3" y="14"/>
                    </svg>
                </button>
            </li>
        </ul>
    </nav>
</header>
<nav id="sideNav">
    <ul>
        <li><a href="./index.php">Home</a></li>
    </ul>
    <div id="mobileFooter">
    </div>
</nav>
<main id="content">
