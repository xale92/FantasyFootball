<?php
// managePlayer.php
declare(strict_types=1);


require_once "./business/footballService.php";

session_start();

include "./views/header.php";

$footballService = new footballService();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];
    $rol = $_POST['rol'];
    $shirtNr = $_POST['shirtNr'];
    $team_id = $_POST['team_id'];

    $footballService->addPlayer($naam, $rol, $shirtNr, $team_id); 
    header('Location: privatepage.php');
   
    exit();
}


include "./views/addPlayersForm.php";


include "./views/footer.php";