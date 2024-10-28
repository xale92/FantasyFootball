<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
    <h1>Login</h1>
        E-mailadres: <input type="email" name="txtEmail"><br>
        Wachtwoord: <input type="password" name="txtWachtwoord"><br>
        <input type="submit" value="Inloggen" name="btnLogin" id="submit">
    </form>