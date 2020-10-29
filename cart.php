<?php
    $HeaderLogo = 'yes';
    $page = 'Cart';
    $styles = '<link rel="stylesheet" href="./styles/cart.css">';

    include_once './parts/header.php';
?>
<div>
    <div class="H">
        <h1>Cart</h1>
        <p id='cartP'></p>
    </div>
    <a href="shop.php" id="fillItUpBtn" class="btn hid">Go to the shop to fill it up!</a>
</div>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Price</th>
            <th class="thqty">Qty</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td id="totalT" colspan="4">Total:</td>
        <td id="totalN" class="num">$<span id="ttl"></span></td>
        <td>
            <button aria-label="Remove All the Items from the cart." type="button" class="remAddAll icon">
                <svg overflow="visible" role="img" width="10" stroke-width="2" stroke-linecap="round"  viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path transform="rotate(0)" stroke="var(--aclt)" d="M0 0L10 10 M0 10L10 0">
                </svg>
            </button>
        </td>
    </tr>
  </tfoot>
</table>
<form  id="cartUpdate" method="post" action="">
    <input name="cartItems" type="hidden" value="">
    <input name="qtys" type="hidden" value="">
    <button id="btnSave" type="button" class="btnlt">Save changes</button>
    <button id="btnShop" type="button" class="btnlt">Return to shop</button>
    <button id="btnRequest" type="button" class="btn">Request services</button>
</form>
<?php include_once './parts/footer.php';?>
<script type="text/javascript" src="./scripts/cart.js"></script>
