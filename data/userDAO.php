<?php
//userDAO.php
declare(strict_types=1);

require_once "./data/DBConfig.php";
require_once "./entities/User.php";
require_once "./exceptions/exceptions.php";


class userDAO {

    public function emailReedsInGebruik($email) {
        $sql = "select * from users where email = :email";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }


    public function register($naam, $email, $wachtwoord) {
        $rowCount = $this->emailReedsInGebruik($email);
        if ($rowCount > 0) {
            throw new GebruikerBestaatAlException();
        }
        $user = new User(null,$naam, $email, null);
        $user->setWachtwoord($wachtwoord, $wachtwoord);
        $sql = "insert into users (naam, email, wachtwoord) values
        (:naam, :email, :wachtwoord)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":naam", $naam);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":wachtwoord", $user->getWachtwoord());
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
         
    $user->setId($laatsteNieuweId); 
    return $user; 

        
    }


    public function login( $email, $wachtwoord) {
        $rowCount = $this->emailReedsInGebruik($email);
        if ($rowCount == 0) {
            throw new GebruikerBestaatNietException();
        }
        $sql = "select id, naam, wachtwoord from users where email = :email";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $isWachtwoordCorrect = password_verify($wachtwoord, $resultSet["wachtwoord"]);

    if (!$resultSet) {
        throw new GebruikerBestaatNietException();
    }

        if (!$isWachtwoordCorrect) {
            throw new WachtwoordIncorrectException();
        }
        return new User($resultSet["id"], $resultSet["naam"], $email, $resultSet["wachtwoord"]);
       
    }

    
}