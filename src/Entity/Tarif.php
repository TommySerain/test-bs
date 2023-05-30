<?php

namespace App\Entity;

use App\ExtractData\ExtractData;
use Exception;

class Tarif
{
    private array $tarifs;
    private int $idClient;
    private int $idClientHeritage;
    private int $codeDepartement;
    private int $zone;
    private float $montant;

    public function __construct()
    {
        try {
            $this->tarifs = ExtractData::dataToArray("tarif");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getTarifByCodeDepartement(int $codeDepartement):?array
    {
        $arrayTarifs = [];
        foreach ($this->tarifs as $tarif) {
            if (intval($tarif["codeDepartement"]) === $codeDepartement) {
                $arrayTarifs[] = $tarif;
            }
        }
        if (!empty($arrayTarifs)) {
            return $arrayTarifs;
        }
        return null;
    }

    public function getIdClient(): int
    {
        return $this->idClient;
    }
    public function getIdClientHeritage(): int
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
