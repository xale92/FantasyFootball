<?php
//userService.php
declare(strict_types=1);

require_once "./data/userDAO.php";


class userService {

    public function emailReedsInGebruik($email) {
        $emailReeds = new userDAO();
        return $emailReeds->emailReedsInGebruik($email);
    }

    public function register($naam,$email,$wachtwoord) {
        $register = new userDAO();
        return $register->register($naam, $email, $wachtwoord);
    }

    public function login( $email, $wachtwoord) {
        $login = new userDAO();
        return $login->login( $email, $wachtwoord);
    }

    
}