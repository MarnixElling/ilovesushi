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
        <?php 
        if (isset($_SESSION['userAdmin'])) {

            $display = 'display: none;';
        ?>
        <div class="row main-managers">
            <div class="manager account">
                <i class="fas fa-users-cog"></i></i><h2>Account Beheer</h2>
            </div>
            <div class="manager product">
                <i class="fas fa-shopping-basket"></i><h2>Producten Beheer</h2>
            </div>
        </div>
        <div class="row main-managers">
            <div class="manager delivery">
                <i class="fas fa-map-marked-alt"></i><h2>Bezorg Beheer</h2>
            </div>
            <div class="manager staff">
                <i class="fas fa-users"></i><h2>Staff Beheer</h2>
            </div>
        </div>
        <div class="row alt-managers">
            <div class="manager back-cpanel">
                <i class="fas fa-long-arrow-alt-left"></i><h2>Terug</h2>
            </div>
            <div class="manager roster">
                <i class="fas fa-calendar-alt"></i><h2>Rooster Beheer</h2>
            </div>
        </div>
        <div class="row alt-managers">
            <div class="manager staff2">
                <i class="fas fa-users"></i><h2>Staff Beheer</h2>
            </div>
        </div>
        <?php
        } else {
            $display = '';
        }
        ?>
        <div class="row main-managers staff-manager">
            <div class="manager roster2" style="<?php echo $display; ?>">
                <i class="fas fa-calendar-alt"></i><h2>Rooster Bekijken</h2>
            </div>
            <div class="manager signout">
                <form action="common/logout.php">
                    <button class="logoutbutton"><i class="fas fa-sign-out-alt"></i><h2>Uitloggen</h2></button>
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