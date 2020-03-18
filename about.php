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


    $home = '';
    $order = '';
    $about = 'active-page';
    $contact = '';
    ?>
