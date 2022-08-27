<?php

namespace Ml\DpdApi\DPDDataStructures;

use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\packagesParams;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupCustomerDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupPayerDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupSenderDPPV1;

class PickupCallSimplifiedDetailsDPPV1
{
    public PickupPayerDPPV1 $pickupPayer;
    public PickupCustomerDPPV1 $pickupCustomer;
    public PickupSenderDPPV1 $pickupSender;
    public packagesParams $packagesParams;

    public function __construct($PickupPayer, $PickupCustomer, $PickupSender, $PackagesParams) {
        $this->pickupPayer = $PickupPayer;
        $this->pickupCustomer = $PickupCustomer;
        $this->pickupSender = $PickupSender;
        $this->packagesParams = $PackagesParams;
    }
}
