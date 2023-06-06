<?php

namespace App\Repository;

use App\ExtractData\ExtractData;
use Exception;

class ClientRepository
{
    private array $clients;
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
}
