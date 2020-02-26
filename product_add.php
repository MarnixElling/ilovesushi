<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Nunito+Sans&display=swap" rel="stylesheet">
    <link href="css/cpanel.min.css" rel="stylesheet">
    <?php require('common/links.php'); ?>
    <title>Control Panel</title>
</head>
<body>
    <?php
    if (isset($_SESSION['userId'])) {
        require('common/connect.php')
        ?>
        <div class="row brand d-flex justify-content-center">
            <h1>MyINITIATIVE</h1>
        </div>
        <div class="container-fluid">
            <div class="row panel d-flex">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6 productadd">
                    <h2>Product Toevoegen</h2><br>
                    <form action="common/add_product.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="naam">
                        <select name="category">
                            <option value="invalid">- categorie -</option>
                            <option value="nigiri">nigiri</option>
                            <option value="hosomaki">hosomaki</option>
                            <option value="outside_crispy_rolls">outside crispy rolls</option>
                            <option value="fried_crispy_rolls">fried crispy rolls</option>
                            <option value="soft_shell_rolls">soft shell rolls</option>
                            <option value="appetizers">appetizers</option>
                            <option value="temaki_handroll">temaki handroll</option>
                            <option value="uramaki">uramaki</option>
                            <option value="vip_boxen">vip boxen</option>
                            <option value="sashimi">sashimi</option>
                            <option value="poké_bowl">poké bowl</option>
                            <option value="dranken">dranken</option>
                        </select><br><br>
                        Beschrijving<br><textarea name="description"></textarea><br><br>
                        <span class="textbox">
                            €
                            <input type="number" name="price">
                        </span><br><br>
                        Foto<br><input type="file" name="image" accept="image/png"><br><br>
                        <button class="add-product" type="submit" name="submit-product">Toevoegen</button>
                    </form>
                </div>
                <div class="row back">
                    <form action="product_control.php">
                        <button type="submit">Terug</button>
                    </form>
                </div>
            </div>
        </div>
        <?php $conn->close(); ?>
    <?php
    } else {
        require_once('denied.php');
        header( "refresh:3; url=index.php" );
    }
    ?>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <script src="common/cpanel.js"></script>
    <!-- LINKS END -->
</body>
</html>