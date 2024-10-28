<h2>Voeg een nieuwe speler toe</h2>
<form method="post">
Naam: <input class="border" type='text' name='naam'><br>
Rol: <input class="border" type='text' name='rol'><br>
Shirtnummer: <input class="border" type='text' name='shirtNr'><br>
<input type='hidden' name='team_id' value="<?php echo $_SESSION['team_id']; ?>"><br>
<input type='submit' value='Toevoegen' id="submit">
</form>
<br>

<form action="privatepage.php">
    <input type="submit" value="Ga terug" id="submit1">
</form>




