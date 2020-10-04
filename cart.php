<?php
    $HeaderLogo = 'yes';
    $page = 'Cart';
    $styles = '<link rel="stylesheet" href="./styles/cart.css">';

    include_once './parts/header.php';
    require './functions/db.php'

?>
<div class="H">
    <h1>Cart</h1>
    <?php if(!isset($_SESSION['cart'])):?>
    <p>Your cart is empty!</p>
</div>
    <a href="shop.php" class="btn">Go to the shop to fill it up!</a>
    <?php
        elseif($db):
    ?>
    <p>Here's what you've got!</p>
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
        <?php
            $total = 0;
            foreach(array_keys($_SESSION['cart']) as $key){
                $stmt = mysqli_stmt_init($db);
                $queri = "SELECT * FROM `services` WHERE `id`=?";
                mysqli_stmt_prepare($stmt,$queri);
                mysqli_stmt_bind_param($stmt,'s',$key);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $qty = $_SESSION['cart'][$key];
                        echo '<tr>';
                        echo '<td>'.$row['svg'].'</td>';
                        echo '<td><a href="service.php?id='.$row['id'].'">'.$row['title'].'</a></td>';
                        echo '<td><div class="num price">';
                        if($row['discount'] == null){
                            echo '<span aria-label="New Price" class="newPrice">$<span class="itPrice">'.$row['price'].'</span></span>';
                            $total = $total + ($qty*$row['price']);
                            echo '</div></td>';
                            echo '<td class="num">x<input class="qty" name="qty" min="0" type="number" value="'.$qty.'"></td>';
                            echo '<td class="num">= $<span class="subTtl">'.$qty*$row['price'].'</span></td>';
                        }else{
                            $price = $row['price'];
                            $discount = $row['discount'];
                            $DisPrice = $price - (($discount/100)*$price);
                            echo '<span aria-label="Old Price" class="oldPrice">$'.$price.'</span>';
                            echo '<span aria-label="New Price" class="newPrice">$<span class="itPrice">'.$DisPrice.'</span></span>';
                            echo '<span aria-label="Discount" class="discount">-'.$discount.'%</span>';
                            $total = $total + ($qty*$DisPrice);
                            echo '</div></td>';
                            echo '<td class="num">x<input class="qty" name="qty" min="0" type="number" value="'.$qty.'"></td>';
                            echo '<td class="num">= $<span class="subTtl">'.$qty*$DisPrice.'</span></td>';
                        }
                        ?>
                            <td style="opacity:1 !important">
                                <button type="button" class="remAdd icon">
                                    <svg overflow="visible" role="img" width="10" stroke-width="2" stroke-linecap="round"  viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path transform="rotate(0)" stroke="var(--ac)" d="M0 0L10 10 M0 10L10 0">
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php
                    }
                }else{
                    echo '<p role="alert">Something whent wrong</p>';
                };
            }
        ?>
    </tbody>
    <tfoot>
    <tr>
        <td id="totalT" colspan="4">Total:</td>
        <td id="totalN" class="num">$<span id="ttl"><?php echo $total;?></span></td>
        <td>
            <button type="button" class="remAddAll icon">
                <svg overflow="visible" role="img" width="10" stroke-width="2" stroke-linecap="round"  viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path transform="rotate(0)" stroke="var(--aclt)" d="M0 0L10 10 M0 10L10 0">
                </svg>
            </button>
        </td>
    </tr>
  </tfoot>
</table>
<?php
        mysqli_close($db);
    else:
        echo '<p role="alert">Coud not connect to the database</p>';
    endif;
    include_once './parts/footer.php';
?>
<script type="text/javascript" src="./scripts/cart.js"></script>
