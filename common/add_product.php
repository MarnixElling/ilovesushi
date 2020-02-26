<?php
require_once('connect.php');

$invalid = 'invalid';
$category = $_POST['category'];
$target_dir = "../media/$category/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST['submit-product'])) {
    if ($category == $invalid) {
        echo 'invalid category';
    } else {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            header("refresh:3; url=../product_add.php");
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            header("refresh:3; url=../product_control.php");
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $category = $_POST['category'];
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $price = $_POST['price'];

                $sql = "INSERT INTO `product` (`name`, `category`, `description`, `price`, `image`) VALUES (
                        '" . $name . "',
                        '" . $category . "',
                        '" . $description . "',
                        '" . $price . "',
                        '" . $target_file . "')";

                $result = $conn->query($sql);

                if ($result === true) {
                    // header("Location: ../product_control.php");
                } else {
                    echo 'Error creating record: ' . $conn->error;
                }
                require_once('../succes.php');
                header("refresh:3; url=../product_control.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
