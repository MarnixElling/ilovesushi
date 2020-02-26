<?php
if (isset($_POST['signup-submit'])) {

require 'connect.php';

$username = $_POST['name'];
$email = $_POST['mail'];
$password = $_POST['password'];
$passwordRepeat = $_POST['password-repeat'];
$admin = $_POST['admin'];

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&name=".$username."&mail=".$email);
    exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidmailname=");
    exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&name=".$username);
    exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidname&mail=".$email);
    exit();
    } else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&name=".$username."&mail=".$email);
    exit();
    } else {

        $sql = "SELECT nameUsers FROM users WHERE nameUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            } else {

                $sql = "INSERT INTO users (nameUsers, emailUsers, passwordUsers, adminUsers) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedpassword, $admin);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}