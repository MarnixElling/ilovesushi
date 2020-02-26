<?php
require_once('connect.php');

if (isset($_POST['postcode-submit'])) {

    $postcode = mysqli_real_escape_string($conn,$_POST['postcode']);
    $extra_kosten = $_POST['extra_kosten'];
    
    $sql ="INSERT INTO `bezorg_gebied` (`postcode`, `extra_kosten`) VALUES (
        '".$postcode."',
        '".$extra_kosten."')";

    $result = $conn->query($sql);

    if ($result === true) {
    header("Location: ../delivery.php");
    } else {
    echo 'Error creating record: '.$conn->error;
    }
}
$conn->close();
?>