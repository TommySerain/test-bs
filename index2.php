<?php

require_once "vendor/autoload.php";

use App\Entity\Client;
use App\Entity\ConditionTaxation;
use App\Entity\Localite;
use App\Entity\Tarif;


try {

    $clients = new Client();
    $client = $clients->getClientById(6);
    // $city=$client['ville'];
    // // $client=$clients->getClientByName("VINS DU MACONNAIS");
    echo "<p>client</p>";
    echo "<pre>";
    print_r($client);
    echo "</pre><br>";

    $localites = new Localite();
    // $localite=$localites->getLocaliteByZipCode("71");
    $localite = $localites->getLocaliteByCity("GUEUGNON");
    // $localite=$localites->getLocaliteByZone(2);
    echo "<p>localité</p>";
    echo "<pre>";
    print_r($localite);
    echo "</pre><br>";

    $conditions = new ConditionTaxation();
    $condition = $conditions->getConditionById(2);
    echo "<p>condition taxes</p>";
    echo "<pre>";
    print_r($condition);
    echo "</pre><br>";

    $tarifs = new Tarif();
    $tarif = $tarifs->getTarifByZoneAndIdClientAndDepartement(2,0,71);
    echo "<p>tarif</p>";
    echo "<pre>";
    print_r($tarif);
    echo "</pre><br>";
} catch (Exception $e) {
    echo $e->getMessage();
};
