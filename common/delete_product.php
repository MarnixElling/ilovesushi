<?php
require_once('connect.php');

$name = $_POST['name'];
$category = $_POST['category'];
$file_pointer = "../media/$category/$name.png";

if (isset($_POST['delete'])) {

    !unlink($file_pointer);

    $sql = "DELETE FROM product WHERE id=" . $_POST['id'] . " LIMIT 1";

    $result = $conn->query($sql);

    header("Location: ../product_control.php");
    exit();
} else {
    header("Location: ../product_control.php");
    exit();
}
$conn->close();
?>