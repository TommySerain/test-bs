<?php

use App\Controller\ConditionTaxationController;
use App\Controller\TarifController;
use App\Entity\Calcul;
use App\Repository\ClientRepository;

require_once __DIR__ . '/src/Template/header.php';
require_once "vendor/autoload.php";

$allClients = new ClientRepository();
$allClients = $allClients->getAllClients();
?>

<section class="container">
    <h1 class="text-center mt-5">Calcul du tarif d'expédition</h1>
    <?php require_once __DIR__ . "/src/Template/form.php" ?>
</section>

<?php
if (!empty($_POST)) {
    $montant = new TarifController($_POST['recipient']);
    $montant = $montant->getTarif();
    $taxes = new ConditionTaxationController();
    $taxes = $taxes->getTaxes();
    $total = new Calcul($montant, $taxes);
    $total = $total->calculateTotal();
?>

    <section class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-6 d-flex flex-column align-items-center">
                <p class="fs-5 fw-bold">Montant : <?php echo $montant . "€" ?></p>
                <p class="fs-5 fw-bold">Conditions de Taxation : <?php echo $taxes . "%" ?></p>
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
