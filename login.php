<?php
//login.php
declare(strict_types=1);
session_start();

require_once "./business/userService.php";
require_once "./exceptions/exceptions.php";


$error = "";
if (isset($_POST["btnLogin"])) {
    $email = "";
    $wachtwoord = "";

    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error.= "Het e-mailadres moet ingevuld worden.";
    }
    
    if (!empty($_POST["txtWachtwoord"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
    } else {
        $error .= "Het wachtwoord moet ingevuld worden.";
    }

    if ($error == "") {
        try {
            $userService = new userService();
            $user = $userService->login($email, $wachtwoord);
            
            $_SESSION["gebruiker"] = serialize($user);
        } catch (WachtwoordIncorrectException $e) {
            $error .= "Het wachtwoord is niet correct.";
        } catch (GebruikerBestaatNietException $e) {
            $error .= "Er bestaat geen gebruiker met dit e-mailadres.";
        }
    }
}

include "./views/header.php";

if ($error == "" && isset($_SESSION["gebruiker"])) {
    header('Location: index.php');
    exit();
} else if ($error != "") {
    $fout = $error;
    include "./views/toonFout.php";
}

if (!isset($_SESSION["gebruiker"])) {

    include "./views/loginForm.php";
}

include "./views/footer.php";