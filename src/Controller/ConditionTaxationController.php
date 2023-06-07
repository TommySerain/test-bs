<?php

namespace App\Controller;


use App\Entity\ConditionTaxation;
use App\Repository\ConditionTaxationRepository;

class ConditionTaxationController
{

    private ConditionTaxationRepository $conditionTaxation;

    public function __construct()
    {
        $this->conditionTaxation = new ConditionTaxationRepository();
    }

    public function getTaxes(): float
    {
        $sender = intval($_POST['sender']);
        $recipient = intval($_POST['recipient']);
        $clientPayant = intval($_POST['taxes']);
        $payedBySender = $this->conditionTaxation->getConditionById($sender);
        $payedByRecipient = $this->conditionTaxation->getConditionById($recipient);
        if ($clientPayant === 1) {
            if ($payedBySender === null || $payedBySender['useTaxePortPayeGenerale'] === "true") {
                $taxes = new ConditionTaxation(0);
                $montantTaxes = $taxes->getTaxePortPaye();
            } else {
                $taxes = new ConditionTaxation($sender);
                $montantTaxes = $taxes->getTaxePortPaye();
            }
        } else {
            if ($payedByRecipient === null || $payedByRecipient['useTaxePortDuGenerale'] === "true") {
                $taxes = new ConditionTaxation(0);
                $montantTaxes = $taxes->getTaxePortDu();
            } else {
                $taxes = new ConditionTaxation($recipient);
                $montantTaxes = $taxes->getTaxePortDu();
            }
        }


        return $montantTaxes;
    }
}
