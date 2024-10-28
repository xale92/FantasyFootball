<?php
//addTeam.php
declare(strict_types=1);

require_once "./business/footballService.php";

session_start();

include "./views/header.php";

$footballService = new footballService();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];

    $footballService->addTeam($naam);
    header("location: privatepage.php");
    exit();
}

include "./views/addTeamForm.php";

include "./views/footer.php";