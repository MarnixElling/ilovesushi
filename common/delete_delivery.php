<?php
require_once('connect.php');

if (isset($_POST['delete'])) {

        $sql ="DELETE FROM bezorg_gebied WHERE id=".$_POST['id']." LIMIT 1";

        $result = $conn->query($sql);

        header("Location: ../delivery.php");
        exit();
} else {
    header("Location: ../delivery.php");
    exit();
}
$conn->close();
?>