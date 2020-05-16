<?php
    $category = $_SESSION['category'];

    if (isset($_SESSION["category"])) {
        if(isset($_POST["vipboxen"])) {
            $category = "'vipboxen'";
        } else if(isset($_POST["appetizers"])) {
            $category = "'appetizers'";
        } else if(isset($_POST["nigiri"])) {
            $category = "'nigiri'";
        } else if(isset($_POST["hosomaki"])) {
            $category = "'hosomaki'";
        } else if(isset($_POST["softshell"])) {
            $category = "'softshellrolls'";
        } else if(isset($_POST["temaki"])) {
            $category = "'temakihandroll'";
        } else if(isset($_POST["uramaki"])) {
            $category = "'uramaki'";
        } else if(isset($_POST["outsidecrispyrolls"])) {
            $category = "'outsidecrispyrolls'";
        } else if(isset($_POST["friedcrispyrolls"])) {
            $category = "'friedcrispyrolls'";
        } else if(isset($_POST["pokebowls"])) {
            $category = "'pokebowl'";
        } else if(isset($_POST["sashimi"])) {
            $category = "'sashimi'";
        } else if(isset($_POST["dranken"])) {
            $category = "'dranken'";
        } else {
            $category = "'vipboxen'";
        }
    } else {
        $category = "'vipboxen'";
    }
?>