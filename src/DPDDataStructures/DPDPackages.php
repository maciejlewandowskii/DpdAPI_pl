<?php

namespace Ml\DpdApi\DPDDataStructures;

class DPDPackages
{
    public DPDParcels $parcels;
    public string $payerType;
    public int $thirdPartyFID;
    public DPDReceiver $receiver;
    public DPDSender $sender;
    public string $ref1;
    public string $ref2;
    public string $ref3;
    public array $services;

    public function __construct(DPDParcels $Parcels, string $PayerType, int $ThirdPartyFID, DPDReceiver $Receiver, DPDSender $Sender, string $Ref1, string $Ref2, string $Ref3, DPDServices $Services)
    {
        $this->parcels = $Parcels;
        $this->payerType = $PayerType;
        $this->thirdPartyFID = $ThirdPartyFID;
        $this->receiver = $Receiver;
        $this->sender = $Sender;
        $this->ref1 = $Ref1;
        $this->ref2 = $Ref2;
        $this->ref3 = $Ref3;
        $this->services = $Services->services;
    }
}
