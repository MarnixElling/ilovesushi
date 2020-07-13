<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require('common/connect.php');
    require('common/links.php');
    require('common/category.php');
    require('common/shoppingcart.php');

    if(!isset($_SESSION['category'])) {
        $_SESSION["category"] = "'vipboxen'";
    } else {
        $_SESSION["category"] = $category;
    }

    $curpage = 'index';
    $home = '';
    $order = 'active-page';
    $about = '';
    $contact = '';
    ?>
    <title>iLoveSushi Zeist</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <?php require('header.php'); ?>
        </div>
        <div class="row content-top">
            <div class="col-lg-2 col-md-2">
                <!-- leftside -->
            </div>
            <div class="col-lg-1 col-md-1">categorieën</div>
            <?php
            $string = $category;
            $categoryName = preg_replace("/'/", "", $string);
            ?>
            <div class="col-lg-5 col-md-5"><?php echo $categoryName; ?></div>
            <div class="col-lg-2 col-md-2">winkelwagen</div>
            <div class="col-lg-2 col-md-2">
                <!-- rightside -->
            </div>
        </div>
        <div class="row content-middle">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-1 col-md-1">
                <?php
                $categories = ['vipboxen', 'appetizers', 'nigiri', 'hosomaki', 'softshellrolls', 'temakihandroll', 'uramaki', 'outsidecrispyrolls', 'friedcrispyrolls', 'pokebowl', 'sashimi', 'dranken'];

                foreach ($categories as $ar) {
                    if ($ar == $categoryName) {
                        $$ar = 'active-category';
                    }
                }
                ?>
                <form method="post" action="">
                    <ul>
                        <li><button class="<?php echo $vipboxen; ?>" type="submit" name="vipboxen">Vip Boxen</button></li>
                        <li><button class="<?php echo $appetizers; ?>" type="submit" name="appetizers">Appetizers</button></li>
                        <li><button class="<?php echo $nigiri; ?>" type="submit" name="nigiri">Nigiri</button></li>
                        <li><button class="<?php echo $hosomaki; ?>" type="submit" name="hosomaki">Hosomaki</button></li>
                        <li><button class="<?php echo $softshellrolls; ?>" type="submit" name="softshell">Soft Shell rolls</button></li>
                        <li><button class="<?php echo $temakihandroll; ?>" type="submit" name="temaki">Temaki handroll</button></li>
                        <li><button class="<?php echo $uramaki; ?>" type="submit" name="uramaki">Uramaki</button></li>
                        <li><button class="<?php echo $outsidecrispyrolls; ?>" type="submit" name="outsidecrispyrolls">Outside Crispy rolls</button></li>
                        <li><button class="<?php echo $friedcrispyrolls; ?>" type="submit" name="friedcrispyrolls">Fried Crispy rolls</button></li>
                        <li><button class="<?php echo $pokebowl; ?>" type="submit" name="pokebowls">Poke Bowls</button></li>
                        <li><button class="<?php echo $sashimi; ?>" type="submit" name="sashimi">Sashimi</button></li>
                        <li><button class="<?php echo $dranken; ?>" type="submit" name="dranken">Dranken</button></li>
                    </ul>
                </form>
            </div>
            <div class="col-lg-5 col-md-5 d-flex flex-wrap">
                <?php
                $sql = "SELECT * FROM product WHERE category=" . $_SESSION['category'];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="product">
                                <img src="<?php echo $row['image']; ?>" alt="foto"><br>
                                <div class="information">
                                    <span><?php echo $row['name'] ?></span>
                                    <span class="price">€ <?php echo $row['price']; ?></span>
                                    <hr>
                                    <form method="post" action="order.php?action=add&id=<?php echo $row['id']; ?>">
                                        <div class="amount d-flex ">
                                            <button class="minus">-</button>
                                            <input type="number" name="quantity" min="1" value="1">
                                            <button class="plus">+</button>
                                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                            <input type="hidden" name="current-category" value="<?php echo $category; ?>">
                                            <button class="add-to-cart" type="submit" name="add_to_cart"><i class="fas fa-cart-plus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    echo "Sorry this product is sold out.";
                }
                ?>
            </div>
            <div class="colg-lg-2 col-md-2 cart">
                <?php require('common/cart.php'); ?>
                <button onclick="window.location.href = 'checkout.php';" class="proceed-checkout">Afrekenen</button>
            </div>
        </div>
        <?php
        require('footer.php');
        $conn->close(); ?>
    </div>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>