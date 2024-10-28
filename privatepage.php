<?php
// privatepage.php
declare(strict_types=1);
session_start();


require_once "./business/footballService.php";
include "./views/header.php";

$footballService = new footballService();

if (isset($_GET['action']) && ($_GET['action'] === 'delete')) {
    $footballService->deletePlayer($_GET['id']); 
    header('Location: privatepage.php');
   exit();
}

if (!isset($_SESSION["gebruiker"])) {
    header('Location: login.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['team_id'])) {
    $_SESSION['team_id'] = (int)$_POST['team_id'];
}


if (isset($_POST['change_team'])) {
    unset($_SESSION['team_id']); 
}


if (isset($_SESSION['team_id'])) {
    $team_id = $_SESSION['team_id'];
    $players = $footballService->getPlayersByTeam($team_id);
    
    
    $team = $footballService->getTeamById($team_id); 
} else {
    $players = []; 
}


if (!isset($_SESSION['team_id'])) {
    $teams = $footballService->getAllTeams();
    include "./views/selecteerTeamForm.php"; 
} else {
    include "./views/playersForm.php"; 
}

include "./views/footer.php";
