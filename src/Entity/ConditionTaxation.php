<?php

namespace App\Entity;

use App\ExtractData\ExtractData;
use Exception;

class ConditionTaxation
{
    private array $taxes;
    private int $idClient;
    private bool $useTaxePortDuGenerale;
    private int $taxePortDu;
    private bool $useTaxePortPayeGenerale;
    private int $taxePortPaye;

    public function __construct()
    {
        try {
            $this->taxes = ExtractData::dataToArray("conditiontaxation");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getConditionById(int $id): ?array
    {
        if ($id === 0) {
            $taxe = $this->taxes[0];
            return $taxe;
        }
        foreach ($this->taxes as $taxe) {
            if ($taxe['idClient'] == $id) {
                return $taxe;
            }
        }
        return null;
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
    public function getTaxePortDu(): int
    {
        return $this->taxePortDu;
    }
    public function setTaxePortDu(int $taxePortDu): void
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
    public function getTaxePortPaye(): int
    {
        return $this->taxePortPaye;
    }
    public function setTaxePortPaye(int $taxePortPaye): void
    {
        if ($taxePortPaye > 0 && $taxePortPaye !== null) {
            $this->taxePortPaye = $taxePortPaye;
        }
    }
}
