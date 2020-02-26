<?php
require_once('connect.php');

if (isset($_POST['delete'])) {
    if ($_POST['superadmin']==0) {

        $sql ="DELETE FROM users WHERE idUsers=".$_POST['id']." LIMIT 1";

        $result = $conn->query($sql);

        header("Location: ../signup.php");
        exit();
    } else {
        require_once('../denied.php');
        header( "refresh:3; url=../signup.php" );
    }
} else {
    header("Location: ../signup.php");
    exit();
}
$conn->close();
?>