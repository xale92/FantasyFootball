
<form action="startMatch.php" method="post">
    <table>
    <tr>
        <th>
            <h2><?php echo htmlspecialchars($team->getNaam()); ?></h2>
        </th>
        <th> </th>
    </tr>
        <tr>
            <th>Spelers in je team</th>
            <th id="score">Scoren</th>
        </tr>
        <?php foreach ($players as $index => $player) { ?>
            <tr>
                <td><?php echo htmlspecialchars($player->getNaam()); ?></td>
                <td>
                    <?php if ($isMatchStarted) {
                        echo htmlspecialchars($yourTeamScores[$index] . '');
                    } ?>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td id="voti"><strong>Totaalscore:</strong></td>
            <td id="finale">
                <?php if ($isMatchStarted) {
                    echo htmlspecialchars(array_sum($yourTeamScores) . '');
                } ?>
            </td>
        </tr>
    </table>

    
   
    <table>

        <tr>
            <th></th>
            <th>
                <h2><?php echo htmlspecialchars($randomTeam->getNaam()); ?></h2>
            </th>
        </tr>
        <tr>
         <th id="score">Scoren</th>
         <th>Willekeurige teamspelers</th>
         </tr>
         <?php foreach ($randomPlayers as $index => $player) { ?>
            <tr>
                <td>
                    <?php if ($isMatchStarted) {
                        echo htmlspecialchars($randomTeamScores[$index] . '');
                    } ?>
                </td>
                <td><?php echo htmlspecialchars($player->getNaam()); ?></td>

         </tr>
         <?php } ?>
         <tr>
        <td id="finale">
                <?php if ($isMatchStarted) {
                    echo htmlspecialchars(array_sum($randomTeamScores) . '');
                } ?>
            </td>
            <td id="voti"><strong>Totaalscore:</strong></td>
            
        </tr>
    </table>
    <br>
    <input  type='submit' name='start_match' value='<?php echo $isMatchStarted ? "Speel opnieuw" : "spel starten"; ?>'
        id="submit">
</form>
<br>

<form action="privatepage.php">
    <input type="submit" value="Ga terug" id="submit1">
</form>
