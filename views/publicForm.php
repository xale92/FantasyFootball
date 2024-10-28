<h1>Openbare pagina</h1>
<h2>Dit zijn onze teams</h2>


<?php 
foreach ($teams as $team) {
    $naam = $team->getNaam();
     ?>
<h2> <?php echo $naam; ?> </h2>

<?php  $players = $footballService->getPlayersByTeam($team->getId()); ?>
<ul>
    <?php 
    foreach ($players as $player) {
        $naam = $player->getNaam();
        $rol = $player->getRol();
        $shirtNr = $player->getShirtNr();
        ?>
        <li> <?php echo $naam . " - " . $rol . " - " . " Nr: " . $shirtNr ?></li>
    <?php
    }
    ?>
</ul>
<?php
}
?>
