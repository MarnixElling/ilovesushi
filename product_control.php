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
            <div class="row panel">
                <div class="col-lg-7 col-md-7 tabel">
                    <table>
                        <tr class="top">
                            <th>ID</th>
                            <th>categorie</th>
                            <th>naam</th>
                            <th>Bewerken</th>
                            <th>Verwijderen</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM product ORDER BY `category`";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <th><?php echo $row['id']; ?></th>
                                <th><?php echo $row['category']; ?></th>
                                <th><?php echo $row['name']; ?></th>
                                <th><a href="edit_product.php?id=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a></th>
                                <th>
                                    <form action="common/delete_product.php" method="post">
                                        <button type="submit" name="delete"><i class="far fa-trash-alt"></i></i></button>
                                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                        <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    </form>
                                </th>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "Something went wrong while fetching all account data.";
                            }
                        ?>
                    </table>
                </div>
                <div class="col-lg-3 col-md-3 add">
                    <div class="formulier">
                        <h3>Product - Toevoegen</h3><br>
                        <a href="product_add.php">
                            <i class="far fa-plus-square"></i>
                        </a>
                    </div>
                </div>
                <div class="row back">
                    <form action="cpanel.php">
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