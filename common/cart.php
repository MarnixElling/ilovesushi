<?php $shippingprice = 5; ?>
<table>
    <tr>
        <td>Naam</td>
        <td>Aantal</td>
        <td>Prijs (x1)</td>
        <td>Totaal</td>
        <td></td>
    </tr>
    <?php
    if (!empty($_SESSION["shopping_cart"])) {
        $total = 0;
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            ?>
            <tr>
                <td><?php echo $values["item_name"]; ?></td>
                <td class="quantity">x<?php echo $values["item_quantity"]; ?></td>
                <td>€ <?php echo $values["item_price"]; ?></td>
                <td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                <?php
                if ($curpage == 'index') {
                    ?> <td><a href="index.php?actionhome=delete&id=<?php echo $values["item_id"]; ?>"><i class="fas fa-times"></i></a></td> <?php
                } else {
                    ?> <td><a href="index.php?actionorder=delete&id=<?php echo $values["item_id"]; ?>"><i class="fas fa-times"></i></a></td> <?php
                }
                ?>
                
            </tr>
        <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]) + 0.1 + $shippingprice;
            }
            ?>
        <tr class="extra">
            <td>Tasje</td>
            <td></td>
            <td></td>
            <td>+ € 0,10</td>
            <td></td>
        </tr>
        <tr class="alert alert-danger">
            <td colspan="3">Bezorgkosten verschilt per postcode!</td>
            <td>+ € 5,00</td>
            <td></td>
        </tr>
        <tr>
            <th colspan="3">Totaal</th>
            <th>€ <?php echo number_format($total, 2); ?></th>
            <td></td>
        </tr>
    <?php
    }
    ?>
</table>