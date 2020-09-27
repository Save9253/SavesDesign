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
<body aria-label='<?php if(isset($title)){echo $title;}else{echo $page;}?>'>
<header id="header" style="top:0;" aria-label='Header'>
    <?php if($HeaderLogo == 'yes'):?>
    <a id="logoLink" aira-label="Return to home page" href="index.php"><?php include "parts/logoThin.svg";?></a>
    <?php endif;?>
    <nav aria-label="Main" id="topNav">
        <ul>
            <?php if($page !== 'Login'):?>
            <li>
                <a class="menuIt" aria-label="<?php if(isset($_SESSION['uname'])){echo 'Log out';}else{echo 'Log in';}?>" href="<?php if(isset($_SESSION['uname'])){echo 'functions/logout.php';}else{echo 'login.php';}?>">
                    <div id="log" class="menuTtl"><?php if(isset($_SESSION['uname'])){echo 'Log out';}else{echo 'Log in';}?></div>
                    <svg role="img" aria-label="<?php if(isset($_SESSION['uname'])){echo 'Log out';}else{echo 'Log in';}?>" width="30" height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.6 6.2L10.5 8.5L9.89853 11.2L10 15.1L9.6 15.3L9.2 16.6L10 18.3L10.7 19L11.2 19L11.872 20.3L12.1 20.6L12.2 24.2L4.3 28.2L3 29.8L2.8 31.3H28.7L28.5 29.2L27.2 27.5L19.6 24.1L19.3 21.2L19.7 20.7L20.5 19.2L21 19.1L21.4 18.3L22 16.6L21.7 15.3L21.2 15.3L21.6 13.2L21.5 10.8L20.6 8.3L17.6 6.3L13.6 6.2Z"
                            <?php if(isset($_SESSION['uname'])){echo 'fill="var(--dr)"';}else{echo 'stroke="var(--dr)" stroke-linecap="round" stroke-linejoin="round"';}?>
                        />
                    </svg>
                </a>
            </li>
            <?php endif;?>
            <li aria-label="Menu">
                <button aria-expanded="false" aria-controls="sideNav" aria-label="Menu" id="hamburger" class="icon menuIt">
                    <div class="menuTtl">Menu</div>
                    <svg aria-label="Menu" overflow="visible" role="img" width="20" stroke-width="3" stroke-linecap="round" stroke="var(--dr)" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 1.5L20 1.5 M0 8.5L20 8.5 M0 15.5L20 15.5">
                    </svg>
                </button>
            </li>
        </ul>
    </nav>
</header>
<div aria-expanded="true" aria-controls="header" id="headerUnfold" aria-hidden="true" aria-label="Expand Header" class="">
        <svg overflow="visible" role="img" width="30" stroke="var(--dr)" viewBox="0 0 30 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linejoin="round"  stroke-width="3" stroke-linecap="round" d="M0 1L15 5L30 1">
        </svg>
</div>
<nav aria-label="Site" id="sideNav" style="right:-250px;" class="contHid">
    <ul>
        <li aria-label="Home"><a href="./index.php">Home</a></li>
    </ul>
</nav>
<main id="content">
