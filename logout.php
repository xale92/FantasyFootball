<?php
//logout.php
declare(strict_types=1);

session_start();

unset($_SESSION["gebruiker"]);
unset($_SESSION['team_id']);
header('Location: login.php');
include "./views/header.php";
include "./views/logoutForm.php";
include "./views/footer.php";



