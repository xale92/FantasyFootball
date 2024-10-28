<h1>Selecteer een team</h1>
<form action="privatepage.php" method="post">
    <select name="team_id" required>
        <option value="">---------------------</option>
        <?php
        foreach ($teams as $team) {
            $id = $team->getId();
            $naam = htmlspecialchars($team->getNaam()); 
            ?>
            <option value="<?php echo $id ?>"><?php echo $naam ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Selecteer team" id="submit">
</form>
<br>
<form action="addTeam.php">
    <input type="submit" value="Team toevoegen" id="submit1">
</form>
