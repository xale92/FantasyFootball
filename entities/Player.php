<?php
//Player.php
declare(strict_types=1);


class Player {
    private int $id;
    private string $naam;
    private string $rol;
    private int $shirtNr;
    private int $team_id;

    public function __construct(int $id, string $naam, string $rol, int $shirtNr, int $team_id) {
        $this->id = $id;
        $this->naam = $naam;
        $this->rol = $rol;
        $this->shirtNr = $shirtNr;
        $this->team_id = $team_id;
    }

    
    public function getId(): int {
        return $this->id;
    }

    public function getNaam(): string {
        return $this->naam;
    }

    public function getRol(): string {
        return $this->rol;
    }

    public function getShirtNr(): int {
        return $this->shirtNr;
    }

    public function getTeam_Id(): int {
        return $this->team_id;
    }

    
    public function setNaam(string $naam)  {
        $this->naam = $naam;
    }

    public function setRol(string $rol)  {
        $this->rol = $rol;
    }

    public function setShirtNr(int $shirtNr) {
        $this->shirtNr = $shirtNr;
    }

    public function setTeam_Id(int $team_id)  {
        $this->team_id = $team_id;
    }
}
