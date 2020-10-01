<?php
    $HeaderLogo = 'yes';
    $page = 'Cart';
    $styles = '<link rel="stylesheet" href="./styles/shop.css">';

    include_once './parts/header.php';


?>
<div class="H" id="top">
    <h1>Cart</h1>
    <?php if(!isset($_SESSION['cart'])):?>
    <p>The cart is empty!</p>
</div>
    <a href="shop.php" class="btn">Go to the shop to fill it up!</a>
    <?php else:?>
    <p>Here is what you've got!</p>
</div>
<section>
        <table>
            <caption>Items in the cart:</caption>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>svg</td>
                    <td>Package</td>
                    <td>$750</td>
                    <td>2 X</td>
                    <td>$1500</td>
                </tr>
            </tbody>
        </tbale>
</section>


<?php
    endif;
    include_once './parts/footer.php';
?>
