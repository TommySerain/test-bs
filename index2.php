<?php

use App\Controller\ConditionTaxationController;
use App\Controller\TarifController;
use App\Entity\Calcul;
use App\Entity\Client;


require_once __DIR__ . '/src/Template/header.php';
require_once "vendor/autoload.php";

$client = new Client(3); 


// echo "<pre>";
// print_r($client);
// echo "</pre><br>";

// $clients = new Client();
// $client = $clients->getClientById(1);

// echo "<pre>";
// print_r($client);
// echo "</pre><br>";