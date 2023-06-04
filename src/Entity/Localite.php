<?php

namespace App\Entity;

use App\ExtractData\ExtractData;
use Exception;

class Localite
{
    private array $localites;
    private string $zipCode;
    private string $city;
    private int $zone;

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

    public function getZipCode(): string
    {
        return $this->zipCode;
    }
    public function setZipCode(string $zipCode): void
    {
        if ($zipCode !== null) {
            $this->zipCode = $zipCode;
        }
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity(string $city): void
    {
        if ($city !== null) {
            $this->city = $city;
        }
    }
    public function getZone(): int
    {
        return $this->zone;
    }
    public function setZone(int $zone): void
    {
        if ($zone !== null) {
            $this->zone = $zone;
        }
    }
}
