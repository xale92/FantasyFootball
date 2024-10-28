<?php
// index.php
declare(strict_types=1);
session_start();

require_once "./business/userService.php";
include "./views/header.php";


if (isset($_SESSION["gebruiker"])) {
    $user = unserialize($_SESSION["gebruiker"]);

    include "./views/toonBerichtLogin.php";

    if ($user) {
        include "./views/welkom.php";
    }
} else {
    include "./views/home.php";
}

include "./views/footer.php";
