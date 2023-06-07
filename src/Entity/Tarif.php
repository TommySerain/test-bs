<?php

namespace App\Entity;

use App\Repository\TarifRepository;

class Tarif {

    private int $idClient;
    private int|array $idClientHeritage;
    private int $codeDepartement;
    private int $zone;
    private float $montant;

    public function __construct($zone, $id, $codeDepartement)
    {
        $tarif = new TarifRepository;
        $tarif = $tarif->getTarifByZoneAndIdClientAndDepartement($zone, $id, $codeDepartement);
        $this->idClient = $id;
        $this->idClientHeritage = $tarif['idClientHeritage'];
        $this->codeDepartement = $codeDepartement;
        $this->zone = $zone;
        $this->montant = $tarif['montant'];
    }

    public function getIdClient(): int
    {
        return $this->idClient;
    }
    public function getIdClientHeritage(): int|array
    {
        return $this->idClientHeritage;
    }
    public function getCodeDepartement(): int
    {
        return $this->codeDepartement;
    }
    public function getZone(): int
    {
        return $this->zone;
    }
    public function getMontant(): float
    {
        return $this->montant;
    }
}