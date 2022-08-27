<?php

namespace Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;

class PickupSenderDPPV1
{
    public string $senderName;
    public string $senderFullName;
    public string $senderAddress;
    public string $senderCity;
    public string $senderPostalCode;
    public string $senderPhone;

    public function __construct($SenderName, $SenderFullName, $SenderAddress, $SenderCity, $SenderPostalCode, $SenderPhone) {
        $this->senderName = $SenderName;
        $this->senderFullName = $SenderFullName;
        $this->senderAddress = $SenderAddress;
        $this->senderCity = $SenderCity;
        $this->senderPostalCode = $SenderPostalCode;
        $this->senderPhone = $SenderPhone;
    }
}
