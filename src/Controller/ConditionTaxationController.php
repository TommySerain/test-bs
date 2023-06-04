<?php

namespace App\Controller;


use App\Entity\ConditionTaxation;

class ConditionTaxationController
{

    private ConditionTaxation $conditionTaxation;

    public function __construct()
    {
        $this->conditionTaxation = new ConditionTaxation();
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
                $taxes = $this->conditionTaxation->getConditionById(0);
                $montantTaxes = $taxes['taxePortPaye'];
            } else {
                $taxes = $this->conditionTaxation->getConditionById($sender);
                $montantTaxes = $taxes['taxePortPaye'];
            }
        } else {
            if ($payedByRecipient === null || $payedByRecipient['useTaxePortDuGenerale'] === "true") {
                $taxes = $this->conditionTaxation->getConditionById(0);
                $montantTaxes = $taxes['taxePortDu'];
            } else {
                $taxes = $this->conditionTaxation->getConditionById($sender);
                $montantTaxes = $taxes['taxePortDu'];
            }
        }


        return $montantTaxes;
    }
}
