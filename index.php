<?php

use App\Controller\ConditionTaxationController;
use App\Controller\TarifController;
use App\Entity\Calcul;
use App\Entity\Client;

require_once __DIR__ . '/src/Template/header.php';
require_once "vendor/autoload.php";

$clients = new Client();
$allClients = $clients->getAllClients();

?>

<section class="container">
    <h1 class="text-center mt-5">Calcule du tarif d'expédition</h1>
    <form class="row mt-5" action="" method="POST">
        <div class="col-6 mx-auto mt-4">
            <label for="sender">Expéditeur</label>
            <select name="sender" id="sender" class="form-control border-2 border-danger rounded-2 bg-success text-white" required>
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
            <select name="recipient" id="recipient" class="form-control border-2 border-danger rounded-2 bg-success text-white" required>
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
            <input class="form-control border-2 border-danger rounded-2 bg-success text-white" type="number" name="number" id="number" required>
        </div>
        <div class="col-4 mt-4">
            <label for="weight">Poids de l'expédition</label>
            <input class="form-control border-2 border-danger rounded-2 bg-success text-white" type="number" name="weight" id="weight" required>
        </div>
        <div class="col-4 mt-auto">
            <div>
                <label for="taxes-sender">Taxes payées par l'expéditeur</label>
                <input type="radio" name="taxes" id="taxes-sender" value="1" required>
            </div>
            <div>
                <label for="taxes-recipient">Taxes payées par le destinataire</label>
                <input type="radio" name="taxes" id="taxes-recipient" value="2" required>
            </div>
        </div>
        <input class="btn btn-success mt-4 col-3 mx-auto border-2 border-danger" type="submit" value="Calculer">
    </form>
</section>
<?php
// var_dump($_POST);
if (!empty($_POST)) {
    $montant = new TarifController($_POST['recipient']);
    $montant = $montant->getTarif();
    // var_dump($montant);
    $taxes = new ConditionTaxationController();
    $taxes = $taxes->getTaxes();
    // var_dump($taxe);
    $total = new Calcul($montant, $taxes);
    $total = $total->calculateTotal();
?>
    <section class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-6 d-flex flex-column align-items-center">
                <p class="fs-5 fw-bold">Montant : <?php echo $montant . "€" ?></p>
                <p class="fs-5 fw-bold">Conditions de Taxation : <?php echo $taxes . "%"?></p>
            </div>
            <div class="col-6 d-flex flex-column align-items-center">
                <p class="fs-5 fw-bold">Calcul : <?php echo $montant . " + " . $taxes . "%" ?></p>
                <p class="fs-3 fw-bold">Total : <?php echo $total . "€" ?></p>
            </div>
        </div>
    </section>
<?php
}
require_once __DIR__ . '/src/Template/footer.php';
