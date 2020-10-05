<?php
    $page = "Failed";
    $HeaderLogo = 'yes';

    include_once './parts/header.php';
?>
<div role="alert"class="H" id="top">
    <h1>Oops!</h1>
    <p>Something went wrong!</p>
</div>
<a href="./functions/logout.php" class="btn">Return to home page</a>
<?php
    include_once './parts/footer.php';
?>
