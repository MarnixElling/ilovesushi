<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    $_SESSION["category"] = "";
    $category = $_SESSION["category"];
    require('common/connect.php');
    require('common/links.php');
    require('common/shoppingcart.php');
    require('common/category.php');
    ?>
    <title>iLoveSushi Zeist</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <?php require('header.php'); ?>
        </div>
        <div class="row content-top">
            <div class="col-lg-2 col-md-2"><!-- leftside --></div>
            <div class="col-lg-1 col-md-1">categorieën</div>
            <?php
                $string = $category;
                $categoryName = preg_replace("/'/", "", $string);
            ?>
            <div class="col-lg-5 col-md-5"><?php echo $categoryName; ?></div>
            <div class="col-lg-2 col-md-2">winkelwagen</div>
            <div class="col-lg-2 col-md-2"><!-- rightside --></div>
        </div>
        <div class="row content-middle">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-1 col-md-1">
                <form method="post" action="">
                    <ul>
                        <li><button class="active-category" type="submit" name="vipboxen">Vip Boxen</button></li>
                        <li><button type="submit" name="appetizers">Appetizers</button></li>
                        <li><button type="submit" name="nigiri">Nigiri</button></li>
                        <li><button type="submit" name="hosomaki">Hosomaki</button></li>
                        <li><button type="submit" name="softshell">Soft Shell rolls</button></li>
                        <li><button type="submit" name="temaki">Temaki handroll</button></li>
                        <li><button type="submit" name="uramaki">Uramaki</button></li>
                        <li><button type="submit" name="outsidecrispyrolls">Outside Crispy rolls</button></li>
                        <li><button type="submit" name="friedcrispyrolls">Fried Crispy rolls</button></li>
                        <li><button type="submit" name="pokebowls">Poke Bowls</button></li>
                        <li><button type="submit" name="sashimi">Sashimi</button></li>
                        <li><button type="submit" name="dranken">Dranken</button></li>
                    </ul>
                </form>
            </div>
            <div class="col-lg-5 col-md-5 d-flex flex-wrap">
                <?php
                $sql = "SELECT * FROM product WHERE category=" . $category;
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="product">
                                <img src="<?php echo $row['image']; ?>" alt="foto"><br>
                                <div class="information">
                                    <span><?php echo $row['name'] ?></span>
                                    <hr>
                                    <form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
                                        <input type="number" name="quantity" min="1" value="1">
                                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                        <button type="submit" name="add_to_cart"><i class="fas fa-cart-plus"></i></button>
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