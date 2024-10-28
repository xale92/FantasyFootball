<?php
// publicpage.php
declare(strict_types=1);
require_once "./business/footballService.php";

include "./views/header.php";


$footballService = new footballService();
$teams = $footballService->getAllTeams();

include "./views/publicForm.php";

include "./views/footer.php";
