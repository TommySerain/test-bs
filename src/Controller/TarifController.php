<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Localite;
use App\Entity\Tarif;

class TarifController
{
    private Client $client;
    private Localite $localites;
    private Tarif $tarifs;


    public function __construct(private int $clientId)
    {
        $this->client = new Client($clientId);
        $this->localites = new Localite();
        $this->tarifs = new Tarif();
    }

    public function getTarif():float
    {
        $localite = $this->localites->getLocaliteByCity($this->client->getCity());
        $clientZone = intval($localite['zone']);
        $clientCodePostal = intval($this->client->getZipCode());
        $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientZone, $this->clientId, $clientCodePostal);
        if (empty($tarif)) {
            $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientZone, 0, $clientCodePostal);
            $montant = $tarif['montant'];
        } else if (is_array($tarif['idClientHeritage'])) {
            $montant = $tarif['montant'];
        } else {
            $idClientHeritage = intval($tarif['idClientHeritage']);
            $clientHeritage = new Client($idClientHeritage);
            $localiteHeritage = $this->localites->getLocaliteByCity($clientHeritage->getCity());
            $clientHeritageZone = intval($localiteHeritage['zone']);
            $clientHeritageCodePostal = intval($clientHeritage->getZipCode());
            $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientHeritageZone, $idClientHeritage, $clientHeritageCodePostal);
            $montant = $tarif['montant'];
        }
        return $montant;
    }
}
