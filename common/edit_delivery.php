<?php
require_once('connect.php');

if (isset($_POST['submit_delivery'])) {

    $postcode = mysqli_real_escape_string($conn,$_POST['postcode']);
    $extra_kosten = $_POST['extra_kosten'];
    $id = $_POST['id'];
    
    $sql ="UPDATE `bezorg_gebied` SET 
    `postcode` = '".$postcode."', 
    `extra_kosten` = '".$extra_kosten."'
    WHERE `bezorg_gebied`.`id` = '".$id."'";

    $result = $conn->query($sql);

    if ($conn->query($sql) === true) {
    require_once('../succes.php');
    header( "refresh:3; url=../delivery.php" );
    } else {
    echo 'Error updating record: '.$conn->error;
    }
}
$conn->close();
