<?php
    $page = "Shop";
    $styles = '<link rel="stylesheet" href="./styles/shop.css">';
    $HeaderLogo = 'yes';

    include_once './parts/header.php';

?>
<div role="alert" id="added" class="msg hid">Successfully added to cart!</div>
<div class="H" id="top">
    <h1>Shop</h1>
    <p>Enjoy transparent prices! All taxes are already included!</p>
</div>

<section id="packagesSec" aria-label="Packages">
    <div class="H">
        <h2>Packages</h2>
        <p class="underH">Get a <span class="discount">10%</span> discount for purchasing a package!</p>
    </div>
    <div aria-label="Packages" id="packages">
</section>
<section id="all" aria-label="All Services">
    <div class="H">
        <h2>All the services</h2>
        <p>Pay only for what you need!</p>
    </div>
    <div id="services">
    </div>
</section>
<?php include_once './parts/footer.php';?>
<script type="text/javascript" src="./scripts/shop.js"></script>

