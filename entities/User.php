<?php
//User.php
declare(strict_types=1);


class User {

    private $id;
    private $naam;
    private $email;
    private $wachtwoord;


    public function __construct($id = null, $naam = null, $email = null, $wachtwoord = null) {

        $this->id = $id;
        $this->naam = $naam;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getWachtwoord() {
        return $this->wachtwoord;
    }

    public function setId($id) { 
        $this->id = $id;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException();
        }
        $this->email = $email;
    }

    public function setWachtwoord($wachtwoord, $herhaalwachtwoord) {
        if ($wachtwoord !== $herhaalwachtwoord) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }

}