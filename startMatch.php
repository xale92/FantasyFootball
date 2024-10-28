<?php
// startMatch.php
declare(strict_types=1);
session_start();

require_once "./business/footballService.php";

if (!isset($_SESSION["gebruiker"]) || !isset($_SESSION['team_id'])) {
    header('Location: login.php');
    exit();
}


$footballService = new footballService();
$team_id = $_SESSION['team_id'];
$team = $footballService->getTeamById($team_id);
$players = $footballService->getPlayersByTeam($team_id);
$players = array_slice($players, 0, 11); 

$randomTeam = $footballService->getRandomTeam($team_id);
$randomPlayers = $footballService->getPlayersByTeam($randomTeam->getId());
$randomPlayers = array_slice($randomPlayers, 0, 11); 


$yourTeamScores = [];
$randomTeamScores = [];


$isMatchStarted = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_match'])) {
    
    foreach ($players as $player) {
        $yourTeamScores[] = rand(0, 10);
    }

   
    foreach ($randomPlayers as $player) {
        $randomTeamScores[] = rand(0, 10);
    }

    $isMatchStarted = true;
}

include "./views/header.php"; 



if ($isMatchStarted) {
    $yourTotalScore = array_sum($yourTeamScores);
    $randomTotalScore = array_sum($randomTeamScores);
    if ($yourTotalScore > $randomTotalScore) {
        include "./views/win.php";

    } elseif ($yourTotalScore < $randomTotalScore) {
        include "./views/lose.php";
        
    } else {
        include "./views/draw.php";
    }
}

include "./views/startMatchForm.php";

include "./views/footer.php";
