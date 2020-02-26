<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php require('common/links.php'); ?>
    <title>Admin login</title>
</head>
<body>
<?php require('common/connect.php') ?>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '<li><form action="common/logout.php" method="post">
                <button type="submit" name="logout-submit">Log uit</button>
              </form></li>';
    } else {
        echo '<li><form action="common/login.php" method="post">
                    <input type="text" name="name" placeholder="Gebruikersnaam">
                    <input type="password" name="password" placeholder="Wachtwoord">
                    &nbsp;  <button type="submit" name="login-submit">Log in</button>
                  </form>
              </li>';
    }
    ?>
    <?php $conn->close(); ?>
    <!-- LINKS START -->
    <?php require('common/scripts.php'); ?>
    <!-- LINKS END -->
</body>
</html>