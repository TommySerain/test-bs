<?php

namespace App\Entity;

use App\Repository\ConditionTaxationRepository;

class ConditionTaxation{

    private int $idClient;
    private bool $useTaxePortDuGenerale;
    private float $taxePortDu;
    private bool $useTaxePortPayeGenerale;
    private float $taxePortPaye;

    public function __construct($id)
    {
        $conditionTaxations = new ConditionTaxationRepository;
        $conditionTaxation = $conditionTaxations->getConditionById($id);
        $this->idClient = $id;
        $this->useTaxePortDuGenerale = $conditionTaxation['useTaxePortDuGenerale'];
        $this->taxePortDu = $conditionTaxation['taxePortDu'];
        $this->useTaxePortPayeGenerale = $conditionTaxation['useTaxePortPayeGenerale'];
        $this->taxePortPaye = $conditionTaxation['taxePortPaye'];
    }

    public function getIdClient(): int
    {
        return $this->idClient;
    }
    public function getUseTaxePortDuGenerale(): bool
    {
        return $this->useTaxePortDuGenerale;
    }
    public function setUseTaxePortDuGenerale(bool $useTaxePortDu): void
    {
        $this->useTaxePortDuGenerale = $useTaxePortDu;
    }
    public function getTaxePortDu(): float
    {
        return $this->taxePortDu;
    }
    public function setTaxePortDu(float $taxePortDu): void
    {
        if ($taxePortDu > 0 && $taxePortDu !== null) {
            $this->taxePortDu = $taxePortDu;
        }
    }
    public function getUseTaxePortPayeGenerale(): bool
    {
        return $this->useTaxePortPayeGenerale;
    }
    public function setUseTaxePortPayeGenerale(bool $useTaxePortPaye): void
    {
        $this->useTaxePortPayeGenerale = $useTaxePortPaye;
    }
    public function getTaxePortPaye(): float
    {
        return $this->taxePortPaye;
    }
    public function setTaxePortPaye(float $taxePortPaye): void
    {
        if ($taxePortPaye > 0 && $taxePortPaye !== null) {
            $this->taxePortPaye = $taxePortPaye;
        }
    }
}