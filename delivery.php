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
                            <th>Postcode</th>
                            <th>Extra Kosten?</th>
                            <th>Bewerken</th>
                            <th>Verwijderen</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM bezorg_gebied";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                <tr>
                                    <th><?php echo $row['id']; ?></th>
                                    <th><?php echo $row['postcode']; ?></th>
                                    <th>
                                        <?php
                                            $cost = $row['extra_kosten'];
                                            $true = 'Ja';
                                            $false = 'Nee';

                                            if ($cost > 0) {
                                                $cost = $true;
                                            } else {
                                                $cost = $false;
                                            }

                                            echo $cost;
                                        ?>
                                    </th>
                                    <th><a href="edit_delivery.php?id=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a></th>
                                    <th>
                                        <form action="common/delete_delivery.php" method="post">
                                            <button type="submit" name="delete"><i class="far fa-trash-alt"></i></i></button>
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
                    <h3>Postcode - Toevoegen</h3><br>
                    <form action="common/add_delivery.php" method="post">
                        <input type="text" name="postcode" placeholder="Postcode"><br>
                        Extra kosten? &nbsp;
                        <select name="extra_kosten">
                            <option value="1">Ja</option>
                            <option value="0">Nee</option>
                        </select><br><br>
                        <button class="button" type="submit" name="postcode-submit">Toevoegen</button>
                    </form>
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
        header("refresh:3; url=index.php");
    }
    ?>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <script src="common/cpanel.js"></script>
    <!-- LINKS END -->
</body>
</html>