<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Localite;
use App\Entity\Tarif;

class TarifController
{
    private Client $client;


    public function __construct(private int $clientId)
    {
        $this->client = new Client($clientId);
    }

    public function getTarif():float
    {
        $localite = new Localite($this->client->getCity());
        $clientZone = intval($localite->getZone());
        $clientCodePostal = intval($this->client->getZipCode());
        $tarif = new Tarif($clientZone, $this->clientId, $clientCodePostal);

        if (empty($tarif)) {
            $tarif = new Tarif($clientZone, 0, $clientCodePostal);
            $montant = $tarif->getMontant();

        } else if (is_array($tarif->getIdClientHeritage())) {
            $montant = $tarif->getMontant();

        } else {
            $idClientHeritage = intval($tarif->getIdClientHeritage());
            $clientHeritage = new Client($idClientHeritage);
            $localiteHeritage = new Localite($clientHeritage->getCity());
            $clientHeritageZone = intval($localiteHeritage->getZone());
            $clientHeritageCodePostal = intval($clientHeritage->getZipCode());
            $tarif = new Tarif($clientHeritageZone, $idClientHeritage, $clientHeritageCodePostal);
            $montant = $tarif->getMontant();
        }
        return $montant;
    }
}
