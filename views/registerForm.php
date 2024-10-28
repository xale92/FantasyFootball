<h1>Registreren</h1>
<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" >
    Naam: <input type="text" name="txtNaam"><br>
    E-mailadres: <input type="email" name="txtEmail"><br>
    Wachtwoord: <input type="password" name="txtWachtwoord"><br>
    Herhaal wachtwoord: <input type="password" name="txtWachtwoordHerhaal"><br>
    <input type="submit" value="Inloggen" name="btnRegistreer" id="submit">
</form>