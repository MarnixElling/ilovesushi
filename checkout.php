<!DOCTYPE html>
<html>
<head>
    <?php require('common/links.php'); ?>
    <title>Afrekenen</title>
</head>
<body>
    <?php require('common/connect.php') ?>
    <?php require('header.php'); ?>
    <form action="common/delivery_area.php" method="post">
        <?php
        $sql = "SELECT * FROM bezorg_gebied";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $postcodes[] = $row['postcode'].'-'.$row['extra_kosten'];
            }
            $postcodes = json_encode($postcodes);
            ?>
                <input type="hidden" name="available" value='<?= $postcodes ?>'>
            <?php
        } else {
            echo "Something went wrong while fetching employees data.";
        }
        ?>
        <input type="text" name="postcode" maxlength="4" placeholder="Postcode">
        <button type="submit">Volgende</button>
    </form>
    <?php require('footer.php');
    $conn->close(); ?>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>