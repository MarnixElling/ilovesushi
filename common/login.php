<?php
if (isset($_POST['login-submit'])) {

    require 'connect.php';

    $username = $_POST['name'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: ../admin.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE nameUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../admin.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['passwordUsers']);
                if ($passwordCheck == false) {
                    header("Location: ../admin.php?error=wrongpassword");
                    exit();
                } else if ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userName'] = $row['nameUsers'];
                    $_SESSION['userAdmin'] = $row['adminUsers'];
                    header("Location: ../cpanel.php?login=succes");
                    exit();
                } else {
                    header("Location: ../admin.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("Location: ../admin.php?error=nouser");
                exit();
            }
        }
    }

} else {
    header("Location: ../index.php");
    exit();
}