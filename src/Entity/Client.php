<?php

namespace App\Entity;

use App\Repository\ClientRepository;

class Client
{
    private int $id;
    private string $compName;
    private string $zipCode;
    private string $city;

    public function __construct($id)
    {
        $clients = new ClientRepository();
        $client = $clients->getClientById($id);
        $this->id = $id;
        $this->compName = $client['raisonSociale'];
        $this->zipCode = $client['codePostal'];
        $this->city = $client['ville'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCompName(): string
    {
        return $this->compName;
    }
    public function setCompName(string $compName): void
    {
        if ($compName !== "") {
            $this->compName = $compName;
        }
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }
    public function setZipCode(string $zipCode): void
    {
        if ($zipCode !== "") {
            $this->zipCode = $zipCode;
        }
    }

    public function getCity(): string
    {
        return $this->city;
    }
    public function setCity(string $city): void
    {
        if ($city !== "") {
            $this->city = $city;
        }
    }
}
