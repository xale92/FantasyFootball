<?php
//register.php
declare(strict_types=1);
session_start();

require_once "./business/userService.php";
require_once "./exceptions/exceptions.php";


$error = "";
if (isset($_POST["btnRegistreer"])) {
    $naam = "";
    $email = "";
    $wachtwoord = "";
    $herhaalwachtwoord = "";

    if (!empty($_POST["txtNaam"])) {
        $naam = $_POST["txtNaam"];
    } else {
        $error .= "Het naam moet ingevuld worden.";
    }


    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.";
    }


    if (!empty($_POST["txtWachtwoord"]) && !empty(["txtWachtwoordHerhaal"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
        $herhaalwachtwoord = $_POST["txtWachtwoordHerhaal"];
    } else {
        $error .= "Beide wachtwoordvelden moeten ingevuld worden.";
    }



    if ($error == "") {
        try {
            $gebruiker = new userService();
            $user = $gebruiker->register($naam,$email,$wachtwoord);
            $_SESSION["gebruiker"] = serialize($user);
        } catch (OngeldigEmailadresException $e) {
            $error.= "Het ingevulde e-mailadres is geen geldig emailadres.";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.";
        } catch (GebruikerBestaatAlException $e) {
            $error .= "Er bestaat al een gebruiker met dit emailadres.";
        } 
    }
}

include "./views/header.php";

if ($error == "" && isset($_SESSION["gebruiker"])) {
    
    include "./views/toonBericht.php";
   
} else if ($error != "") {
    $fout = $error;
    include "./views/toonFout.php";
}


if (!isset($_SESSION["gebruiker"])) {
    
 include "./views/registerForm.php";
}

include "./views/footer.php";

