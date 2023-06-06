<?php

namespace App\Entity;

class Calcul{

    public function __construct(private float $montant, private float $taxes){
    }

    public Function calculateTotal(): float{
        return round($this->montant + (($this->taxes*$this->montant)/100), 2);
    }
}