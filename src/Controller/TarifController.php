<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Localite;
use App\Entity\Tarif;

class TarifController
{
    private Client $clients;
    private Localite $localites;
    private Tarif $tarifs;


    public function __construct(private int $clientId)
    {
        $this->clients = new Client();
        $this->localites = new Localite();
        $this->tarifs = new Tarif();
    }

    public function getTarif():float
    {
        $client = $this->clients->getClientById($this->clientId);
        $localite = $this->localites->getLocaliteByCity($client['ville']);
        $clientZone = intval($localite['zone']);
        $clientCodePostal = intval($client['codePostal']);
        $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientZone, $this->clientId, $clientCodePostal);
        if (empty($tarif)) {
            $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientZone, 0, $clientCodePostal);
            $montant = $tarif['montant'];
        } else if (is_array($tarif['idClientHeritage'])) {
            $montant = $tarif['montant'];
        } else {
            $idClientHeritage = intval($tarif['idClientHeritage']);
            $clientHeritage = $this->clients->getClientById($idClientHeritage);
            $localiteHeritage = $this->localites->getLocaliteByCity($clientHeritage['ville']);
            $clientHeritageZone = intval($localiteHeritage['zone']);
            $clientHeritageCodePostal = intval($clientHeritage['codePostal']);
            $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientHeritageZone, $idClientHeritage, $clientHeritageCodePostal);
            $montant = $tarif['montant'];
        }
        return $montant;
    }
}
