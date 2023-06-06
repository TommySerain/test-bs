<?php

namespace App\Repository;

use App\ExtractData\ExtractData;
use Exception;

class ClientRepository
{
    private array $clients;
    // private int $id;
    // private string $compName;
    // private string $zipCode;
    // private string $city;
    public function __construct()
    {
        try {
        $this->clients = ExtractData::dataToArray("client");
        } catch (Exception $e) {
        echo $e->getMessage();
        }
    }
    public function getAllClients():array
    {
        return $this->clients;
    }

    public function getClientById(int $id): ?array
    {
        foreach ($this->clients as $client) {
            if (intval($client['idClient']) === $id) {
                return $client;
            }
        }
        return null;
    }

    public function getClientByName(string $compagnyName): ?array
    {
        foreach ($this->clients as $client) {
            if ($client['raisonSociale'] === $compagnyName) {
                return $client;
            }
        }
        return null;
    }


    // public function getId(): int
    // {
    //     return $this->id;
    // }
    // public function getCompName(): string
    // {
    //     return $this->compName;
    // }
    // public function setCompName(string $name): void
    // {
    //     if ($name !== null) {
    //         $this->compName = $name;
    //     }
    // }
    // public function getZipCode(): string
    // {
    //     return $this->zipCode;
    // }
    // public function setZipCode(string $zipCode): void
    // {
    //     if ($zipCode !== null) {
    //         $this->zipCode = $zipCode;
    //     }
    // }
    // public function getCity(): string
    // {
    //     return $this->city;
    // }
    // public function setCity(string $city): void
    // {
    //     if ($city !== null) {
    //         $this->city = $city;
    //     }
    // }
}
