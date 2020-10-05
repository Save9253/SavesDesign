<?php
    $page = "Profile";
    $styles = '<link rel="stylesheet" href="./styles/shop.css">';
    $HeaderLogo = 'yes';

    include_once './parts/header.php';
    require './functions/db.php';
    if(isset($_SESSION['uname'])):
?>
<div class="H" id="top">
    <h1>Profile</h1>
    <p>Hello <?php echo $_SESSION['uname'];?>!</p>

</div>
<a href="./functions/logout.php" class="btn">Log out</a>
<p>Test</p>
<?php

?>

<?php
    else:
        echo '<div class="errMsg" role="alert">Log in to see access this page!</div>';
        echo '<a href="login.php" class="btn">Log in</a>';
    endif;
    include_once './parts/footer.php';
?>
