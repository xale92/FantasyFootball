<?php
//teamDAO.php
declare(strict_types=1);

require_once "./data/DBConfig.php";
require_once "./entities/Team.php";


class teamDAO {


    public function getAllTeams() {
        $sql = "select * from team";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $teams = [];

        while ($row = $resultSet->fetch()) {
            $teams[] = new Team($row['id'], $row['naam']);
        }

        return $teams;
    }


    public function getTeamById(int $team_id) {
        $sql = "select * from team where id = :team_id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':team_id', $team_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Team((int)$row['id'], $row['naam']);
        } else {
            return null; 
        }
    }


    public function addTeam($naam) {
        $sql = "insert into team (naam) values (:naam)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":naam", $naam);
        $stmt->execute();
        $dbh = null;
    }

}




