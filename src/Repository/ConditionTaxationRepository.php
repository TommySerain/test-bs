<?php

namespace App\Repository;

use App\ExtractData\ExtractData;
use Exception;

class ConditionTaxationRepository
{
    private array $taxes;

    public function __construct()
    {
        try {
            $this->taxes = ExtractData::dataToArray("conditiontaxation");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getAllTaxes():array
    {
        return $this->taxes;
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
}
