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
            <th>Qty</th>
            <th>Subtotal</th>
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
                        echo '<td>'.$row['title'].'</td>';
                        echo '<td>';
                        if($row['discount'] == null){
                            echo '<span aria-label="New Price" class="newPrice">$'.$row['price'].'</span>';
                            $total = $total + ($qty*$row['price']);
                            echo '</td>';
                            echo '<td>'.$qty.'</td>';
                            echo '<td>$'.$qty*$row['price'].'</td>';
                        }else{
                            $price = $row['price'];
                            $discount = $row['discount'];
                            $DisPrice = $price - (($discount/100)*$price);
                            echo '<span aria-label="Old Price" class="oldPrice">$'.$price.'</span>';
                            echo '<span aria-label="New Price" class="newPrice">$'.$DisPrice.'</span>';
                            echo '<span aria-label="Discount" class="discount">-'.$discount.'%</span>';
                            $total = $total + ($qty*$DisPrice);
                            echo '</td>';
                            echo '<td>'.$qty.'</td>';
                            echo '<td>$'.$qty*$DisPrice.'</td>';
                        }
                        echo '</tr>';
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
      <td id="totalN">$<?php echo $total;?></td>
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
