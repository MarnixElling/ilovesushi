<?php
require_once('connect.php');

if (isset($_POST['delete'])) {

        $sql ="DELETE FROM staff WHERE id=".$_POST['id']." LIMIT 1";

        $result = $conn->query($sql);

        header("Location: ../staff.php");
        exit();
} else {
    header("Location: ../staff.php");
    exit();
}
$conn->close();
?>