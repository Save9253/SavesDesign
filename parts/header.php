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
<div class="headerPlaceHolder"></div>
<header>
    <?php if($HeaderLogo == 'yes'):?>
    <a id="logoLink" href="index.php"><?php include "parts/logoThin.svg";?></a>
    <?php endif;?>
    <nav id="topNav">
        <ul>
            <?php if($page !== 'Login'):?>
            <li>
                <a class="menuIt" href="<?php if(isset($_SESSION['uname'])){echo 'functions/logout.php';}else{echo 'login.php';}?>">
                    <div class="menuTtl"><?php if(isset($_SESSION['uname'])){echo 'Log out';}else{echo 'Log in';}?></div>
                    <svg width="30" height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.7 1.3H2.7C1.6 1.3 0.7 2.2 0.7 3.2V29.3C0.7 30.5 1.6 31.3 2.7 31.3H28.7C29.8 31.3 30.7 30.5 30.7 29.3V3.2C30.7 2.2 29.8 1.3 28.7 1.3Z" stroke="var(--dr)" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M13.6 6.2L10.5 8.5L9.89853 11.2L10 15.1L9.6 15.3L9.2 16.6L10 18.3L10.7 19L11.2 19L11.872 20.3L12.1 20.6L12.2 24.2L4.3 28.2L3 29.8L2.8 31.3H28.7L28.5 29.2L27.2 27.5L19.6 24.1L19.3 21.2L19.7 20.7L20.5 19.2L21 19.1L21.4 18.3L22 16.6L21.7 15.3L21.2 15.3L21.6 13.2L21.5 10.8L20.6 8.3L17.6 6.3L13.6 6.2Z"
                            <?php if(isset($_SESSION['uname'])){echo 'fill="var(--dr)"';}else{echo 'stroke="var(--dr)" stroke-linecap="round" stroke-linejoin="round"';}?>
                        />
                    </svg>
                </a>
            </li>
            <?php endif;?>
            <li>
                <button id="hamburger" class="icon menuIt">
                    <div class="menuTtl">Menu</div>
                    <svg width="20" height="17" viewBox="0 0 20 17" fill="var(--dr)" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0L20 0L20 3L0 3Z M0 7L20 7L20 10L0 10Z M0 14L20 14L20 17L0 17Z">
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
    </nav>
<main id="content">
