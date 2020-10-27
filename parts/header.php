<?php
    session_start();
    $_SESSION['cartItems'] = 0;
    if(isset($_POST['servID'])){
        if(isset($_SESSION['cart'])){
            $servID = $_POST['servID'];
            if(array_key_exists($servID, $_SESSION['cart'])){
                $_SESSION['cart'][$servID] = $_SESSION['cart'][$servID]+intval($_POST['qty']);
            }else{
                $_SESSION['cart'][$servID] = intval($_POST['qty']);
            }
        }else{
            $_SESSION['cart'] = array($_POST['servID'] => intval($_POST['qty']));
        }
    }
    if(isset($_POST['cartItems'])){
        $preItems = explode(',',$_POST['cartItems']);
        $preQtys = explode(',',$_POST['qtys']);
        for($i=0;$i<count($preItems);$i++){
            $newCart[$preItems[$i]] = intval($preQtys[$i]);
            foreach (array_keys($newCart, 0) as $key) {unset($newCart[$key]);            }
        }
        $_SESSION['cart'] = $newCart;
    }
    if(isset($_SESSION['cart'])){$_SESSION['cartItems'] = array_sum($_SESSION['cart']);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/general.css">
    <?php if(isset($styles)){echo $styles;}?>
    <link rel="shortcut icon" href="./imgs/SavesDesignFavicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"></head>
<body aria-label='<?php if(isset($title)){echo $title;}else{echo $page;}?>'>
<header id="header" style="top:0;" aria-label='Header'>
    <?php if($HeaderLogo == 'yes'):?>
    <a id="logoLink" aira-label="Return to home page" href="index.php"><?php include_once "./parts/logoThin.svg";?></a>
    <?php endif;?>
    <nav aria-label="Main" id="topNav">
        <ul>
            <li>
                <a class="menuIt" aria-label="Cart" href="cart.php">
                    <div class="menuTtl">Cart</div>
                    <svg id="cartSVG" role="img" overflow="visible" aria-label="Cart" width="30" height="30" viewBox="0 0 90 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="var(--dr)" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 5L15 10L30 55H75L85 25"/>
                            <path d="M30 55L25 70H70"/>
                            <circle cx="25" cy="75" r="5"/>
                            <circle cx="70" cy="75" r="5"/>
                            <path id="cartL1" opacity="1" d="M30 25H85"/>
                            <path id="cartL2" opacity="1" d="M33 35H82"/>
                            <path id="cartL3" opacity="1" d="M36 45H79"/>
                        </g>
                        <text id="cartText" x="35" y="45" style="font-size:0px;" fill="var(--dr)">0</text>
                    </svg>
                </a>
            </li>
            <?php if($page !== 'Login'):?>
            <li>
                <a id="loginA"class="menuIt" aria-label="Log in" href="login.php">
                    <div id="log" class="menuTtl">Log in</div>
                    <svg id="loginSVG" role="img" overflow="visible" aria-label="Log in" width="30" height="30" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            id="loginPath"
                            stroke-width="1.5"
                            d="M13.6 6.2L10.5 8.5L9.89853 11.2L10 15.1L9.6 15.3L9.2 16.6L10 18.3L10.7 19L11.2 19L11.872 20.3L12.1 20.6L12.2 24.2L4.3 28.2L3 29.8L2.8 31.3H28.7L28.5 29.2L27.2 27.5L19.6 24.1L19.3 21.2L19.7 20.7L20.5 19.2L21 19.1L21.4 18.3L22 16.6L21.7 15.3L21.2 15.3L21.6 13.2L21.5 10.8L20.6 8.3L17.6 6.3L13.6 6.2Z"
                            fill="none" stroke="var(--dr)" stroke-linecap="round" stroke-linejoin="round"
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
        <li aria-label="Home" <?php if($page == "Home"){echo 'class="curentPage" aria-current="page"';}?>><a href="./index.php">Home</a></li>
    </ul>
    <hr>
    <ul>
        <li aria-label="Shop" <?php if($page == "Shop"){echo 'class="curentPage" aria-current="page"';}?>><a href="./shop.php">Shop</a></li>
    </ul>
    <hr>
    <ul>
        <li aria-label="Cart" <?php if($page == "Cart"){echo 'class="curentPage" aria-current="page"';}?>><a href="./cart.php">Cart</a></li>
    </ul>
</nav>
<main id="content">
