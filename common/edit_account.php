<?php
require_once('connect.php');

if (isset($_POST['submit_account'])) {
    if ($_POST['superadmin']==0) {

        $nameUsers = mysqli_real_escape_string($conn,$_POST['nameUsers']);
        $emailUsers = mysqli_real_escape_string($conn,$_POST['emailUsers']);
        $idUsers = $_POST['idUsers'];
    
        $sql ="UPDATE `users` SET 
        `nameUsers` = '".$nameUsers."', 
        `emailUsers` = '".$emailUsers."'
        WHERE `users`.`idUsers` = '".$idUsers."'";

        $result = $conn->query($sql);

        if ($conn->query($sql) === true) {
        require_once('../succes.php');
        header( "refresh:3; url=../signup.php" );
        } else {
        echo 'Error updating record: '.$conn->error;
        }
    } else {
        require_once('../denied.php');
        header( "refresh:3; url=../signup.php" );
    }
}
$conn->close();
