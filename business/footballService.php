<?php
//footballService.php
declare(strict_types=1);

require_once "./data/playerDAO.php";
require_once "./data/teamDAO.php";


class footballService {

    public function getAllTeams() : array {
        $team = new teamDAO();
        $lijst = $team->getAllTeams();
        return $lijst;
    }

    public function getPlayersByTeam($team_id) : array {
        $player = new playerDAO();
        $lijst = $player->getPlayersByTeam($team_id);
        return $lijst;
    }


    
    public function getTeamById(int $team_id) {
        $teamDAO = new teamDAO();
        return $teamDAO->getTeamById($team_id);
    }


    public function addPlayer($naam, $rol, $shirtNr, $team_id) {
        $playerDAO = new playerDAO();
        $playerDAO->addPlayer($naam, $rol, $shirtNr, $team_id);
    }


    public function addTeam($naam) {
        $teamDAO = new teamDAO();
        $teamDAO->addTeam($naam);
    }


    public function deletePlayer($id) {
        $playerDAO = new playerDAO();
        $playerDAO->deletePlayer($id);
    }




 

    public function getRandomTeam(int $excludedTeamId) {
        $teamDAO = new teamDAO();
        $allTeams = $teamDAO->getAllTeams();
        
        foreach ($allTeams as $key => $team) {
            if ($team->getId() === $excludedTeamId) {
                unset($allTeams[$key]); 
            }
        }
        $allTeams = array_values($allTeams);
        return $allTeams[array_rand($allTeams)];
    }



}

