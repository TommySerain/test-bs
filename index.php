<?php

require_once "vendor/autoload.php";

use App\ExtractData\ExtractData;

try {
$clients=ExtractData::dataToArray("client.xml");
$condition=ExtractData::dataToArray("conditiontaxation.xml");
$localite=ExtractData::dataToArray("localite.xml");
$tarif=ExtractData::dataToArray("tarif.xml");

echo "<pre>";
print_r($clients);
echo "</pre>";
echo "<pre>";
print_r($condition);
echo "</pre>";
echo "<pre>";
print_r($localite);
echo "</pre>";
echo "<pre>";
print_r($tarif);
echo "</pre>";
}catch(Exception $e){
    echo $e->getMessage();
};
