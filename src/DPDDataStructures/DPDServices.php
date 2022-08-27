<?php

namespace Ml\DpdApi\DPDDataStructures;

use Ml\DpdApi\DPDDataStructures\DPDServices\cod;
use Ml\DpdApi\DPDDataStructures\DPDServices\declaredValue;
use Ml\DpdApi\DPDDataStructures\DPDServices\guarantee;

class DPDServices
{
    public array $services;

    public function addInsurance(declaredValue $declaredValue): void
    {
        $this->services['declaredValue'] = $declaredValue;
    }

    public function addPaymentOnDelivery(cod $cod): void
    {
        $this->services['cod'] = $cod;
    }

    public function addOther(guarantee $guarantee): void
    {
        $this->services['guarantee'] = $guarantee;
    }
}
