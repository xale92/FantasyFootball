<h2><?php echo htmlspecialchars($team->getNaam()); ?></h2>
<ul>
    <?php
    foreach ($players as $player) {
        $naam = $player->getNaam();
        $rol = $player->getRol();
        $shirtNr = $player->getShirtNr();
        ?>
        <li>
            <?php echo htmlspecialchars($naam) . " - " . htmlspecialchars($rol) . " - " . htmlspecialchars($shirtNr); ?>
            - <a href="privatepage.php?action=delete&id=<?php echo $player->getId(); ?>" id="delete">Verwijderen</a>
        </li>
        <?php
    }
    ?>
</ul>

<form action="addPlayers.php">
    <input type="submit" value="Speler toevoegen" id="submit1">
</form>




<br>

<form action="startMatch.php" method="post">
    <input type="hidden" name="team_id" value="<?php echo $team->getId(); ?>">
    <input type="submit" value="spel starten" id="submit">
</form>

<br>

<form action="privatepage.php" method="post">
    <input type="submit" name="change_team" value="Verander van team" id="submit">
</form>