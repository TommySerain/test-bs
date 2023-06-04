<?php

use App\Entity\Client;
use App\Entity\Localite;
use App\Entity\Tarif;

require_once __DIR__ . '/src/Template/header.php';
require_once "vendor/autoload.php";

$clients = new Client();
$localites = new Localite();
$tarifs = new Tarif();
$allClients = $clients->getAllClients();

?>

<section class="container">
    <form class="row mt-5" action="" method="POST">
        <div class="col-6 mx-auto mt-4">
            <label for="sender">Expéditeur</label>
            <select name="sender" id="sender" class="form-control border-2 border-danger rounded-2 bg-success text-white">
                <?php
                foreach ($allClients as $client) { ?>
                    <option value="<?php echo $client['idClient'] ?>"><?php echo $client['raisonSociale'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-6 mx-auto mt-4">
            <label for="recipient">Destinataire</label>
            <select name="recipient" id="recipient" class="form-control border-2 border-danger rounded-2 bg-success text-white">
                <?php
                foreach ($allClients as $client) { ?>
                    <option value="<?php echo $client['idClient'] ?>"><?php echo $client['raisonSociale'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-4 mt-4">
            <label for="number">Nombre de colis</label>
            <input class="form-control border-2 border-danger rounded-2 bg-success text-white" type="number" name="number" id="number">
        </div>
        <div class="col-4 mt-4">
            <label for="weight">Poids de l'expédition</label>
            <input class="form-control border-2 border-danger rounded-2 bg-success text-white" type="number" name="weight" id="weight">
        </div>
        <div class="col-4 mt-auto">
            <div>
                <label for="taxes-sender">Taxes payées par l'expéditeur</label>
                <input type="radio" name="taxes" id="taxes-sender" value="1">
            </div>
            <div>
                <label for="taxes-recipient">Taxes payées par le destinataire</label>
                <input type="radio" name="taxes" id="taxes-recipient" value="2">
            </div>
        </div>
        <input class="btn btn-success mt-4 col-3 mx-auto border-2 border-danger" type="submit" value="Calculer">
    </form>
</section>
<?php
// var_dump($_POST);
$clientId = intval($_POST['recipient']);
$client = $clients->getClientById($clientId);
$localite = $localites->getLocaliteByCity($client['ville']);
$clientZone = intval($localite['zone']);
$clientCodePostal = intval($client['codePostal']);
$tarif = $tarifs->getTarifByZoneAndIdClientAndDepartement($clientZone, $clientId, $clientCodePostal);
if (empty($tarif)){
    $tarif = $tarifs->getTarifByZoneAndIdClientAndDepartement($clientZone, 0, $clientCodePostal);
} else if (is_array($tarif['idClientHeritage'])) {
    $montant = $tarif['montant'];
} else {
    $idClientHeritage = intval($tarif['idClientHeritage']);
    $clientHeritage = $clients->getClientById($idClientHeritage);
    $localiteHeritage = $localites->getLocaliteByCity($clientHeritage['ville']);
    $clientHeritageZone = intval($localiteHeritage['zone']);
    $clientHeritageCodePostal = intval($clientHeritage['codePostal']);
    $tarif = $tarifs->getTarifByZoneAndIdClientAndDepartement($clientHeritageZone, $idClientHeritage, $clientHeritageCodePostal);
}
// $tarif=$tarif[0];
// var_dump($client);
var_dump($clientCodePostal);
var_dump($clientZone);
// var_dump($localite);
// echo "<p>tarif</p>";
echo "<pre>";
print_r($tarif);
echo "</pre><br>";
var_dump($tarif['montant']);
?>
<?php
require_once __DIR__ . '/src/Template/footer.php';
