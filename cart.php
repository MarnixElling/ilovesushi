<!DOCTYPE html>
<html>
<head>
    <?php require('common/links.php'); ?>
    <title>Winkelwagen</title>
</head>
<body>
    <?php
    session_start();
    require('common/connect.php');
    require('common/shoppingcart.php');
    require('header.php');
    ?>
    <table>
        <tr>
            <th>Product Naam</th>
            <th>Product Aantal</th>
            <th>Product Prijs</th>
            <th>Product Totaal</th>
        </tr>
        <?php
        if (!empty($_SESSION["shopping_cart"])) {
            $total = 0;
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td><?php echo $values["item_price"]; ?></td>
                    <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fas fa-times"></i></a></td>
                </tr>
            <?php
                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                }
                ?>
            <tr>
                <td colspan="3">Totaal</td>
                <td><?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php require('footer.php');
    $conn->close(); ?>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>