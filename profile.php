<?php
    $page = "Profile";
    $styles = '<link rel="stylesheet" href="./styles/shop.css">';
    $HeaderLogo = 'yes';

    include_once './parts/header.php';
?>
<div role="alert" id="msgFBErr" class="errMsg hid"></div>
<div id="profDiv" class="hid">
    <div class="H" id="top">
        <h1>Profile</h1>
        <p id="greeting">Hello!</p>
    </div>
    <button id="logoutBtn" class="btn">Log out</button>
</div>
<div id="login" class="hid">
    <div class="errMsg" role="alert">Log in to access this page!</div>
    <a href="login.php" class="btn">Log in</a>
</div>
<?php include_once './parts/footer.php';?>
<script type="text/javascript" src="./scripts/profile.js"></script>

