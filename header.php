<?php
date_default_timezone_set("Europe/Amsterdam");

$curdate = date("D");
$curtime = date("G");
$monday = "Mon";
$tuesday = "Tue";
$wednesday = "Wed";
$open = "open";
$closed = "closed";

if($curdate == $monday || $curdate == $tuesday || $curdate == $wednesday) { // Kijkt of het weekend is
    if($curtime >= 12 && $curtime < 21) {                                   // Zo niet dan voert het deze code uit
        $takeopen = "open";                                                 // Beide Codes kijken of bezorgen en/of afhalen al mogelijk is
        if($curtime >= 17 && $curtime < 21) {
            $deliveropen = "open";
        } else {
            $deliveropen = "closed";
        }
    } else {
        $takeopen = "closed";
        $deliveropen = "closed";
    }
} else {                                                                    // Als het wel weekend is voert het deze code uit
    if($curtime >= 12 && $curtime < 22) {
        $takeopen = "open"; 
        if($curtime >= 17 && $curtime < 22) {
            $deliveropen = "open";
        } else {
            $deliveropen = "closed";
        }
    } else {
        $takeopen = "closed";
        $deliveropen = "closed";
    }
}
?>
<header class="col-lg-12 col-md-12">
    <div class="row header-top">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8">
            <div class="logo">
                <img src="media/logo.png" alt="I Love Sushi">
            </div>
            <div class="franchise">ZEIST</div>
        </div>
    </div>
    <div class="row d-flex justify-content-space-evenly header-middle">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-3 col-md-3">
            <h2>T: 0303040050</h2>
        </div>
        <div class="col-lg-3 col-md-3">
            <h1>I Love Sushi & Poke Bowl - Zeist</h1>
        </div>
        <div class="col-lg-2 col-md-2 top-right">
            <h1>Sushi bestellen <span>&</span> Sushi bezorgen</h1>
        </div>
    </div>
    <div class="row header-nav">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-4 col-md-4">
            <nav>
                <ul>
                    <li class="active-page">home</li>
                    <li>bestellen</li>
                    <li>over ons</li>
                    <li>contact</li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-2 col-md-2 opening-status d-flex justify-content-center align-items-center">
            <?php
                if($takeopen == $closed && $deliveropen == $closed) {
                    echo '<span>momenteel gesloten</span>';
                } else if($takeopen == $open) {
                    echo '<div class="takeaway"><br>afhalen: open</div>';
                    if($deliveropen == $open) {
                        echo 'bezorgen: open';
                    } else {
                        echo 'bezorgen vanaf 17:00';
                    }
                }
            ?>
        </div>
    </div>
</header>