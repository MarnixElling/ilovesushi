<!DOCTYPE html>
<html>
<head>
    <?php session_start();
    require('common/connect.php');
    require('common/links.php');
    require('common/shoppingcart.php');

    $curpage = 'order';
    $home = '';
    $order = 'active-page';
    $about = '';
    $contact = '';
    ?>
    <title>Afrekenen</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <?php require('header.php'); ?>
        </div>
        <form action="common/delivery_area.php" method="post">
            <?php
            $sql = "SELECT * FROM bezorg_gebied";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $postcodes[] = $row['postcode'] . '-' . $row['extra_kosten'];
                }
                $postcodes = json_encode($postcodes);
                ?>
                <input type="hidden" name="available" value='<?= $postcodes ?>'>
            <?php
            } else {
                echo "Something went wrong while fetching zipcode data.";
            }
            ?>
            <input type="text" name="postcode" maxlength="4" placeholder="Postcode">
            <button type="submit">Volgende</button>
        </form>
        <?php require('common/cart.php'); ?>
        <?php require('footer.php');
        $conn->close(); ?>
    </div>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>