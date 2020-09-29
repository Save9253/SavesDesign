<?php
    $page = "Shop";
    $styles = '<link rel="stylesheet" href="./styles/shop.css">';
    $HeaderLogo = 'yes';

    include_once './parts/header.php';
    require './functions/db.php';
?>
<div class="H" id="top">
    <h1>Shop</h1>
    <p>Enjoy clear prices! All taxes are already included!</p>
</div>
<?php
    if($db):
    $result = mysqli_query($db,"SELECT * FROM `services` WHERE `category` = 'Packages' ORDER BY `price` ASC");
    if (mysqli_num_rows($result) > 0) {
?>
    <section aria-label="Packages">
        <div class="H">
            <h2>Packages</h2>
            <p class="underH">Get a <span class="discount">10%</span> discount bying a package!</p>
        </div>
        <div aria-label="Packages" id="packages">
            <?php while($row = mysqli_fetch_assoc($result)) {?>
                <div aria-label="<?php echo $row['title'];?>" class="service">
                    <h3><?php echo $row['title'];?></h3>
                    <?php if($row['svg']!=null){echo $row['svg'];}?>
                    <hr>
                    <div aria-label="Description" class="description">
                        <p><?php if($row['description']!=null){echo $row['description'];}?></p>
                        <?php
                            if($row['includes']!=null){
                                echo '<ul class="includes" aria-label="Includes"><span>Includes:</span>';
                                echo $row['includes'];
                                echo '</ul>';
                            }
                            if($row['requires']!=null){
                                echo '<ul class="requires" aria-label="Requires"><span>Requires:</span>';
                                echo $row['requires'];
                                echo '</ul>';
                            }
                        ?>
                    </div>
                    <hr>
                    <div aria-label="price" class="price">
                        <?php if($row['discount']!=null){
                                $price = $row['price'];
                                $discount = $row['discount'];
                                $DisPrice = $price - (($discount/100)*$price);
                                echo '<span aria-label="Old Price" class="oldPrice">$'.$price.'</span>';
                                echo '<span aria-label="New Price" class="newPrice">$'.$DisPrice.'</span>';
                                echo '<span aria-label="Discount" class="discount">-'.$discount.'%</span>';
                            }else{
                                echo '<span aria-label="New Price" class="newPrice">$'.$row['price'].'</span>';
                            }
                        ?>
                    </div>
                <button aria-label="Add to Cart <?php echo $row['title'];?>" type="submit" class="addTCart">Add to Cart</button>
                </div>
            <?php }; ?>
        </div>
    </section>
<?php }; ?>
<section id="all" aria-label="All Services">
    <div class="H">
        <h2>All the services</h2>
        <p>Pay only for what you need!</p>
    </div>
</section>
<?php
    mysqli_close($db);
    endif;
    include_once './parts/footer.php';
?>
