<?php
//playerDAO.php
declare(strict_types=1);

require_once "./data/DBConfig.php";
require_once "./entities/Player.php";


class playerDAO {


    public function getPlayersByTeam($team_id) {
        $sql = "select * from player where team_id = :team_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':team_id', $team_id, PDO::PARAM_INT);
        $stmt->execute();
        $players = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $players[] = new Player($row['id'], $row['naam'], $row['rol'], $row['shirtNr'], $row['team_id']);
        }
    
        return $players;
    }
    

    public function addPlayer($naam, $rol, $shirtNr, $team_id) {
        $sql = "insert into player (naam, rol, shirtNr, team_id) values (:naam, :rol, :shirtNr, :team_id)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":naam", $naam);
        $stmt->bindValue(":rol", $rol);
        $stmt->bindValue(":shirtNr", $shirtNr);
        $stmt->bindValue(":team_id", $team_id);
        $stmt->execute();
        $dbh = null;
    } 


    public function deletePlayer($id) {
        $sql = "delete from player where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $dbh = null;
    }
}



