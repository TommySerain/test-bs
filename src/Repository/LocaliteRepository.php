<?php

namespace App\Repository;

use App\ExtractData\ExtractData;
use Exception;

class LocaliteRepository
{
    private array $localites;

    public function __construct()
    {
        try {
            $this->localites = ExtractData::dataToArray("localite");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getAllLocalites(): array{
        return $this->localites;
    }

    public function getLocaliteByZipCode(string $zipCode): ?array
    {
        $arrayLocalites = [];
        foreach ($this->localites as $localite) {
            if ($localite["codePostal"] === $zipCode) {
                $arrayLocalites[] = $localite;
            }
        }
        if (!empty($arrayLocalites)) {
            return $arrayLocalites;
        }
        return null;
    }

    public function getLocaliteByCity(string $city): ?array
    {
        foreach ($this->localites as $localite) {
            if ($localite["ville"] === $city) {
                return $localite;
            }
        }
        return null;
    }

    public function getLocaliteByZone(int $zone): ?array
    {
        $arrayLocalites = [];
        foreach ($this->localites as $localite) {
            if (intval($localite["zone"]) === $zone) {
                $arrayLocalites[] = $localite;
            }
        }
        if (!empty($arrayLocalites)) {
            return $arrayLocalites;
        }
        return null;
    }
}
