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

    echo "<pre>";
    print_r($client);
    echo "</pre>";

    $localites = new Localite();
    // $localite=$localites->getLocaliteByZipCode("71");
    $localite = $localites->getLocaliteByCity("MACON");
    // $localite=$localites->getLocaliteByZone(2);

    echo "<pre>";
    print_r($localite);
    echo "</pre>";

    $conditions = new ConditionTaxation();
    $condition = $conditions->getConditionById(1);

    echo "<pre>";
    print_r($condition);
    echo "</pre>";

    $tarifs = new Tarif();
    $tarif = $tarifs->getTarifByCodeDepartement(71);

    echo "<pre>";
    print_r($tarif);
    echo "</pre>";
} catch (Exception $e) {
    echo $e->getMessage();
};
