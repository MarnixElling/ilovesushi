<?php
require_once('connect.php');

if (isset($_POST['submit_staff'])) {

    $naam = mysqli_real_escape_string($conn,$_POST['naam']);
    $achternaam = mysqli_real_escape_string($conn,$_POST['achternaam']);
    $functie = mysqli_real_escape_string($conn,$_POST['functie']);
    $id = $_POST['id'];
    
    $sql ="UPDATE `staff` SET 
    `naam` = '".$naam."', 
    `achternaam` = '".$achternaam."',
    `functie` = '".$functie."'
    WHERE `staff`.`id` = '".$id."'";

    if ($conn->query($sql) === true) {
    require_once('../succes.php');
    header( "refresh:3; url=../staff.php" );
    } else {
    echo 'Error updating record: '.$conn->error;
    }
}
$conn->close();
