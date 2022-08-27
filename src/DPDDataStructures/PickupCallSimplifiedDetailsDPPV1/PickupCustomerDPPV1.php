<?php

namespace Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;

class PickupCustomerDPPV1
{
    public string $customerName;
    public string $customerFullName;
    public string $customerPhone;

    public function __construct($CustomerName, $CustomerFullName, $CustomerPhone) {
        $this->customerName = $CustomerName;
        $this->customerFullName = $CustomerFullName;
        $this->customerPhone = $CustomerPhone;
    }

}
