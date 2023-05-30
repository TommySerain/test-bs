<?php

require_once "vendor/autoload.php";

use App\Entity\Client;

try {
    $clients= new Client();
    $client=$clients->getClientById(2);
    // $client=$clients->getClientByName("VINS DU MACONNAIS");

    

    echo "<pre>";
    print_r($client);
    echo "</pre>";

// $clients=ExtractData::dataToArray("client.xml");
// $client=$clients[1];
// $nom=$client["raisonSociale"];

// $condition=ExtractData::dataToArray("conditiontaxation.xml");
// $localite=ExtractData::dataToArray("localite.xml");
// $tarif=ExtractData::dataToArray("tarif.xml");

// echo "<pre>";
// print_r($clients);
// echo "</pre>";

// echo "<pre>";
// print_r($condition);
// echo "</pre>";

// echo "<pre>";
// print_r($localite);
// echo "</pre>";

// echo "<pre>";
// print_r($tarif);
// echo "</pre>";

}catch(Exception $e){
    echo $e->getMessage();
};
