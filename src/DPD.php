<?php

namespace Ml\DpdApi;

use DateTime;
use Ml\DpdApi\DPDDataStructures\AuthDataV1;
use Ml\DpdApi\DPDDataStructures\DPDPackages;
use Ml\DpdApi\DPDDataStructures\DPDParcels;
use Ml\DpdApi\DPDDataStructures\DPDReceiver;
use Ml\DpdApi\DPDDataStructures\DPDSender;
use Ml\DpdApi\DPDDataStructures\DPDServices\cod;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\packagesParams;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupCustomerDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupPayerDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupSenderDPPV1;
use Ml\DpdApi\DPDMethods\DPDServices;
use Ml\DpdApi\DPDMethods\InfoServices;

class DPD   {

    protected AuthDataV1 $AuthDataV1;

    public DPDPackages $DPDPackages;
    protected DPDServices $DPDServices;
    protected InfoServices $InfoServices;
    public string $WayBill;
    public string $SessionID;

    public function __construct(AuthDataV1 $AuthDataV1) {
        $this->AuthDataV1 = $AuthDataV1;
        $this->DPDServices = new DPDServices($this->AuthDataV1);
        $this->InfoServices = new InfoServices($this->AuthDataV1);
    }

    public function trackPackagebyWaybill(string $waybill, bool $eventsSelectTypeALL = true): array {
        return (array) $this->InfoServices->getEventsForWaybill($waybill, $eventsSelectTypeALL);
    }

    public function setPackages(DPDParcels $DPDParcels, DPDReceiver $DPDReceiver, DPDSender $DPDSender, string $LabelText, float $PayByReceiver = 0): void    {
        $DPDServices = new DPDDataStructures\DPDServices;
        if($PayByReceiver != 0) $DPDServices->addPaymentOnDelivery(new cod($PayByReceiver, 'PLN'));
        $ref1 = substr($LabelText, 0, 30);
        $ref2 = substr($LabelText, 30, 30);
        $ref3 = substr($LabelText, 60, 30);
        $this->DPDPackages = new DPDPackages($DPDParcels, 'THIRD_PARTY', $this->AuthDataV1->masterFid, $DPDReceiver, $DPDSender, $ref1, $ref2, $ref3, $DPDServices);
    }

    public function getPackagesNumbers(): array {
        $openUMLFeV5 =  new DPDDataStructures\openUMLFeV5($this->DPDPackages);
        $result = $this->DPDServices->generatePackagesNumbers($openUMLFeV5, 1);
        $this->WayBill = $result->return->Packages->Package[0]->Parcels->Parcel[0]->Waybill;
        $this->SessionID = $result->return->SessionId;
        return (array) $result;
    }

    public function getLabel(): string {
        $result = $this->DPDServices->generateSpedLabels($this->WayBill, 'PDF', 'A4', 1);
        if(!empty($result->return->documentData)) return $result->return->documentData;
        else return 'Error';
    }

    public function getProtocol(): string {
        $result = $this->DPDServices->generateProtocol($this->SessionID, 'PDF', 'A4', 1);
        if(!empty($result->return->documentData)) return $result->return->documentData;
        else return 'Error';
    }

    public function orderCourier(DateTime $PickupDate, int $PickupHourFrom, int $PickupHourTo):void  {
        $PickupDateFrom = date('H:i', strtotime(date("0-0-0 $PickupHourFrom:0:0")));
        $PickupDateTo = date('H:i', strtotime(date("0-0-0 $PickupHourTo:0:0")));
        $this->DPDServices->packagesPickupCall($PickupDate, $PickupDateFrom, $PickupDateTo, new PickupCallSimplifiedDetailsDPPV1(
            new PickupPayerDPPV1('', '', ''),
            new PickupCustomerDPPV1($this->DPDPackages->receiver->company, $this->DPDPackages->receiver->name, $this->DPDPackages->receiver->phone),
            new PickupSenderDPPV1($this->DPDPackages->sender->company, $this->DPDPackages->sender->name, $this->DPDPackages->sender->address, $this->DPDPackages->sender->city, $this->DPDPackages->sender->postalCode, $this->DPDPackages->sender->phone),
            new packagesParams(false, 0, false, 0, 0, 0, 0, $this->DPDPackages->parcels->sizeZ, $this->DPDPackages->parcels->sizeX, $this->DPDPackages->parcels->weight, $this->DPDPackages->parcels->sizeY, 1, $this->DPDPackages->parcels->weight, true)
        ));
    }
}
