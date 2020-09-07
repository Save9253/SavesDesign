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
    <nav id="topNav">
        <ul>
            <?php if($page !== 'Login'):?>
            <li>
                <a href="login.php">
                    <svg width="30" height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.7239 1.34717H2.73124C1.62464 1.34717 0.727539 2.24421 0.727539 3.35081V29.3435C0.727539 30.4501 1.62464 31.3471 2.73124 31.3471H28.7239C29.8305 31.3471 30.7276 30.4501 30.7276 29.3435V3.35081C30.7276 2.24421 29.8305 1.34717 28.7239 1.34717Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.5923 6.16443L10.5221 8.52802L9.89853 11.1735L10.0416 15.1178L9.60826 15.3306L9.38756 16.5854L9.98751 18.3216L10.7208 19L11.2406 18.9591L11.872 20.3348L12.1257 20.6075L12.1597 24.2408L4.32238 28.2314L3.04852 29.7744L2.81464 31.3472H28.7465L28.5389 29.1973L27.3564 27.5271L19.6171 24.0751L19.3443 21.1964L19.715 20.7072L20.4594 19.1713L20.9841 19.1156L21.4458 18.2966L22.0402 16.5636L21.7264 15.2978L21.2489 15.2788L21.5646 13.3565L21.4862 10.8461L20.6053 8.31604L17.5891 6.30194L13.5923 6.16443Z" fill="black"/>
                    </svg>
                <?php #if(isset($_SESSION['uname'])){echo $_SESSION['uname'];}else{echo 'Log in';}?>
                </a>
            </li>
            <?php endif;?>
            <li>
                <button id="hamburger" class="icon">
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
