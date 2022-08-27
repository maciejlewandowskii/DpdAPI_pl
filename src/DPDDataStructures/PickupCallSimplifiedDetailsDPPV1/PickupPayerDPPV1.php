<?php

namespace Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;

class PickupPayerDPPV1
{
    public int $payerNumber;
    public string $payerName;
    public string $payerCostCenter;

    public function __construct($PayerNumber, $PayerName, $PayerCostCenter) {
        $this->payerNumber = $PayerNumber;
        $this->payerName = $PayerName;
        $this->payerCostCenter = $PayerCostCenter;
    }
}
