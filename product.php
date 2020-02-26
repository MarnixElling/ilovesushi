<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require('common/connect.php');
    require('common/links.php');
    require('common/shoppingcart.php');
    ?>
</head>
<body>
    <?php require('header.php'); ?>
    <?php
    $sql = "SELECT * FROM product WHERE id=" . $_GET['id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <div class="details">
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
        <?php echo $row['name']; ?>
        <?php echo $row['description']; ?>
        <?php echo $row['price']; ?>
        <form method="post" action="index.php?action=add&id=<?php echo $row['id']; ?>">
            <input type="number" name="quantity" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
            <button type="submit" name="add_to_cart" class="buy">Add to Cart</button>
        </form>
    </div>
    <title>iLoveSushi Zeist - <?php echo $row['name']; ?></title>
    <?php
        }
    } else {
        echo "Sorry this product is sold out.";
    }
    $conn->close();
    ?>
    <?php require('footer.php'); ?>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>