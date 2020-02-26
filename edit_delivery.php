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
            <div class="row">
                <?php
                    $sql = "SELECT * FROM bezorg_gebied WHERE id =" . $_GET['id'];
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="container-fluid">
                                <div class="row panel edit">
                                    <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                                        <form action="common/edit_delivery.php" method="post">
                                            <h1>Postcode bewerken</h1><br>
                                                Postcode<br><input name="postcode" type="text" value="<?php echo $row['postcode']; ?>"><br><br>
                                                Extra kosten?<br>
                                                <select name="extra_kosten">
                                                    <option value="1">Ja</option>
                                                    <option value="0">Nee</option>
                                                </select>
                                                <br><br>
                                                <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
                                            <button type="submit" name="submit_delivery">Opslaan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        echo "FOUTMELDING: Er is iets misgegaan tijdens het ophalen van de informatie over het account.";
                    }
                    ?>
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