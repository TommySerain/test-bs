<?php

require_once "vendor/autoload.php";

use App\Entity\Client;
use App\Entity\ConditionTaxation;
use App\Entity\Localite;
use App\Entity\Tarif;
use App\ExtractData\ExtractData;

try {

    // $clients= new Client();
    // $client=$clients->getClientById(6);
    // $city=$client['ville'];
    // // $client=$clients->getClientByName("VINS DU MACONNAIS");

    // echo "<pre>";
    // print_r($client);
    // echo "</pre>";

    // $localites= new Localite();
    // $localite=$localites->getLocaliteByZipCode("69");
    // $localite=$localites->getLocaliteByCity("AMPUIS");
    // $localite=$localites->getLocaliteByZone(2);

    // echo "<pre>";
    // print_r($localite);
    // echo "</pre>";

    // $conditions= new ConditionTaxation();
    // $condition=$conditions->getConditionById(1);
    // $localite=$localites->getLocaliteByCity("AMPUIS");
    // $localite=$localites->getLocaliteByZone(2);

    // echo "<pre>";
    // print_r($condition);
    // echo "</pre>";

    $tarifs= new Tarif();
    $tarif=$tarifs->getTarifByCodeDepartement(70);

    echo "<pre>";
    print_r($tarif);
    echo "</pre>";

}catch(Exception $e){
    echo $e->getMessage();
};
