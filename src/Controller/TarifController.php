<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Localite;
use App\Entity\Tarif;

class TarifController
{
    private Client $client;
    private Tarif $tarifs;


    public function __construct(private int $clientId)
    {
        $this->client = new Client($clientId);
        $this->tarifs = new Tarif();
    }

    public function getTarif():float
    {
        $localite = new Localite($this->client->getCity());
        $clientZone = intval($localite->getZone());
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
            $localiteHeritage = new Localite($clientHeritage->getCity());
            $clientHeritageZone = intval($localiteHeritage->getZone());
            $clientHeritageCodePostal = intval($clientHeritage->getZipCode());
            $tarif = $this->tarifs->getTarifByZoneAndIdClientAndDepartement($clientHeritageZone, $idClientHeritage, $clientHeritageCodePostal);
            $montant = $tarif['montant'];
        }
        return $montant;
    }
}
