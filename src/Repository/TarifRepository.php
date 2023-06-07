<?php

namespace App\Repository;

use App\ExtractData\ExtractData;
use Exception;

class TarifRepository
{
    private array $tarifs;

    public function __construct()
    {
        try {
            $this->tarifs = ExtractData::dataToArray("tarif");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getTarifByZoneAndIdClientAndDepartement(int $zone, int $idClient, int $codeDepartement): ?array
    {
        $tarifs = $this->getTarifByZone($zone);

        $arrayTarifs = $this->findTarif($tarifs, $codeDepartement, $idClient);
        if (empty($arrayTarifs)) {
            $tarifs = $this->getTarifByZone($zone - 1);
            $arrayTarifs = $this->findTarif($tarifs, $codeDepartement, $idClient);
        }

        return $arrayTarifs;
    }

    private function findTarif(array $tarifs, int $codeDepartement, int $idClient): ?array
    {
        foreach ($tarifs as $tarif) {
            if (intval($tarif['codeDepartement']) === $codeDepartement && intval($tarif['idClient']) === $idClient) {
                return $tarif;
            }
        }

        foreach ($tarifs as $tarif) {
            if (intval($tarif['codeDepartement']) === $codeDepartement && intval($tarif['idClient']) === 0) {
                return $tarif;
            }
        }

        return null;
    }

    public function getTarifByZone(int $zone): ?array
    {
        $arrayTarifs = [];
        foreach ($this->tarifs as $tarif) {
            if (intval($tarif["zone"]) === $zone) {
                $arrayTarifs[] = $tarif;
            }
        }
        return $arrayTarifs;
    }
}
