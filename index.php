<?php

require_once "vendor/autoload.php";

use App\Entity\Client;
use App\Entity\Localite;
use App\ExtractData\ExtractData;

try {

    // $clients= new Client();
    // $client=$clients->getClientById(6);
    // // $client=$clients->getClientByName("VINS DU MACONNAIS");

    // echo "<pre>";
    // print_r($client);
    // echo "</pre>";

    $localites= new Localite();
    // $localite=$localites->getLocaliteByZipCode("69");
    // $localite=$localites->getLocaliteByCity("AMPUIS");
    $localite=$localites->getLocaliteByZone(2);

    echo "<pre>";
    print_r($localite);
    echo "</pre>";

}catch(Exception $e){
    echo $e->getMessage();
};
