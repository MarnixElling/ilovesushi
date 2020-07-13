<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require('common/connect.php');
    require('common/links.php');
    require('common/category.php');
    require('common/shoppingcart.php');

    if(!isset($_SESSION['category'])) {
        $_SESSION["category"] = "'vipboxen'";
    } else {
        $_SESSION["category"] = $category;
    }

    $home = 'active-page';
    $order = '';
    $about = '';
    $contact = '';
    ?>
    <title>iLoveSushi Zeist</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">
            <?php require('header.php'); ?>
        </div>
        <div class="row welcome">
            <div class="col-lg-2 col-md-2">
                <!-- leftside -->
            </div>
            <div class="col-lg-8 col-md-8">
                <hr>
                <div class="welcome-info d-flex">
                    <div class="col-lg-3 col-md-3 welcome-options">
        	            <div class="row">
                            <h4>BESTEL ONLINE</h4>
                        </div>
                        <div class="row d-flex menu">
                            <div class="welcome-button">
                                BEKIJK MENUKAART
                            </div>
                            <div class="welcome-button-icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-list"></i>
                            </div>
                        </div>
                        <div class="row">
                            <h4>BESTEL TELEFONISCH</h4>
                        </div>
                        <div class="row d-flex">
                            <div class="welcome-button">
                                0612345678
                            </div>
                            <div class="welcome-button-icon d-flex justify-content-center align-items-center">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <img src="media/coronapatient.png" alt="girl">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h2>Welkom bij I Love Sushi Zeist</h2>
                        Bestel de beste sushi van Nederland, ook om af te halen. Wij wensen je alvast smakelijk eten!
                        <div class="alert alert-danger corona">I.V.M. CORONA(COVID-19) KUNNEN WIJ MOMENTEEL ALLEEN BEZORGEN.</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2">
                <!-- rightside -->
            </div>
        </div>
        <?php
        require('footer.php');
        $conn->close(); ?>
    </div>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>