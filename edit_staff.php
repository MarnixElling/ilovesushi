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
                    $sql = "SELECT * FROM staff WHERE id =" . $_GET['id'];
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <div class="container-fluid">
                                <div class="row panel edit">
                                    <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                                        <form action="common/edit_staff.php" method="post">
                                            <h1>Medewerker bewerken</h1><br>
                                                Naam<br><input name="naam" type="text" value="<?php echo $row['naam']; ?>"><br><br>
                                                Achternaam<br><input name="achternaam" type="text" value="<?php echo $row['achternaam']; ?>"><br>
                                                Functie<br><input name="functie" type="text" value="<?php echo $row['functie']; ?>"><br>
                                                <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>"><br>
                                            <button type="submit" name="submit_staff">Opslaan</button>
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