<?php
require_once('connect.php');

if (isset($_POST['staff-submit'])) {

    $naam = mysqli_real_escape_string($conn,$_POST['naam']);
    $achternaam = mysqli_real_escape_string($conn,$_POST['achternaam']);
    $functie = mysqli_real_escape_string($conn,$_POST['functie']);
    
    $sql ="INSERT INTO `staff` (`naam`, `achternaam`, `functie`) VALUES (
        '".$naam."',
        '".$achternaam."',
        '".$functie."')";

    $result = $conn->query($sql);

    if ($result === true) {
    header("Location: ../staff.php");
    } else {
    echo 'Error creating record: '.$conn->error;
    }
}
$conn->close();
?>