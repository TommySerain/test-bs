<?php

namespace App\Entity;

use App\Repository\LocaliteRepository;

class Localite{

    private string $zipCode;
    private string $city;
    private int $zone;

    public function __construct($city)
    {
        $localite = new LocaliteRepository();
        $localite = $localite->getLocaliteByCity($city);
        $this->zipCode = $localite['codePostal'];
        $this->city = $city;
        $this->zone = $localite['zone'];
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