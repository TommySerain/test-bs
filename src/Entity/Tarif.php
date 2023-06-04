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

    // public function getTarifByZoneAndIdClient(int $zone, int $idClient): ?array
    // {
    //     $arrayTarifs = [];

    //     foreach ($this->tarifs as $tarif) {
    //         if (intval($tarif['zone']) === $zone && intval($tarif['idClient']) === $idClient) {
    //             $arrayTarifs[] = $tarif;
    //         }
    //     }
    //     if (!empty($arrayTarifs)) {
    //         return $arrayTarifs;
    //     }
    //     return null;
    // }

    public function getTarifByZoneAndIdClientAndDepartement(int $zone, int $idClient, int $codeDepartement): ?array
    {
        $arrayTarifs = [];
        $tarifs = $this->getTarifByZone($zone);
        foreach ($tarifs as $tarif) {
            if (intval($tarif['codeDepartement']) === $codeDepartement && intval($tarif['idClient']) === $idClient) {
                $arrayTarifs = $tarif;
            }
        }
        if (empty($arrayTarifs)) {
            foreach ($tarifs as $tarif) {
                if (intval($tarif['codeDepartement']) === $codeDepartement && intval($tarif['idClient']) === 0) {
                    $arrayTarifs = $tarif;
                }
            }
        }
        if (empty($arrayTarifs)) {
            
        }
        return $arrayTarifs;
    }

    public function getTarifByZone(int $zone): ?array
    {
        $arrayTarifs = [];
        foreach ($this->tarifs as $tarif) {
            if (intval($tarif["zone"]) === $zone) {
                $arrayTarifs[] = $tarif;
            }
        }
        if (empty($arrayTarifs)) {
            foreach ($this->tarifs as $tarif) {
                if (intval($tarif["zone"]) === $zone-1) {
                    $arrayTarifs[] = $tarif;
                }
            }
        }
        return $arrayTarifs;
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
