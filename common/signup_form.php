<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<p>Vul alle velden in!</p>';
    } else if ($_GET['error'] == "invalidmailname") {
        echo '<p>Ongeldige gebruikersnaam en e-mail!</p>';
    } else if ($_GET['error'] == "invalidmail&name") {
        echo '<p>Ongeldige gebruikersnaam!</p>';
    } else if ($_GET['error'] == "invalidname&mail") {
        echo '<p>Ongeldige e-mail!</p>';
    } else if ($_GET['error'] == "passwordcheck") {
        echo '<p>Uw wachtwoorden komen niet overeen!';
    } else if ($_GET['error'] == "usertaken") {
        echo '<p>Deze naam is al in gebruik!</p>';
    }
}
?>
<div class="formulier">
    <h3>Account - Registreren</h3><br>
    <form action="common/signup.php" method="post" class="registreren">
        <input type="text" name="name" placeholder="Naam"><br>
        <input type="text" name="mail" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Wachtwoord"><br>
        <input type="password" name="password-repeat" placeholder="Wachtwoord herhalen"><br>
        Admin maken? <input type="checkbox" name="admin" value="1"><br>
        <button class="button" type="submit" name="signup-submit">Registreer</button>
    </form>
</div>