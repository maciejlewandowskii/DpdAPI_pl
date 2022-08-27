<?php

namespace Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;

class PickupPackagesParamsDPPV1
{
    public bool $DOX;
    public bool $StandardParcel;
    public bool $Pallet;
    public int $ParcelsCount;
    public int $PalletsCount;
    public int $DOXCount;
    public int $ParcelsWeight;
    public float $ParcelMaxWeight;
    public float $ParcelMaxHeight;
    public float $ParcelMaxWidth;
    public float $ParcelMaxDepth;
    public float $PalletsWeight;
    public float $PalletMaxWeight;
    public float $PalletMaxHeight;

    public function __construct($DOX, $StandardParcel, $Pallet, $ParcelsCount, $PalletsCount, $DOXCount, $ParcelsWeight, $ParcelMaxWeight, $ParcelMaxHeight, $ParcelMaxWidth, $ParcelMaxDepth, $PalletsWeight, $PalletMaxWeight, $PalletMaxHeight) {
        $this->DOX = $DOX;
        $this->StandardParcel = $StandardParcel;
        $this->Pallet = $Pallet;
        $this->ParcelsCount = $ParcelsCount;
        $this->PalletsCount = $PalletsCount;
        $this->DOXCount = $DOXCount;
        $this->ParcelsWeight = $ParcelsWeight;
        $this->ParcelMaxWeight = $ParcelMaxWeight;
        $this->ParcelMaxHeight = $ParcelMaxHeight;
        $this->ParcelMaxWidth = $ParcelMaxWidth;
        $this->ParcelMaxDepth = $ParcelMaxDepth;
        $this->PalletsWeight = $PalletsWeight;
        $this->PalletMaxWeight = $PalletMaxWeight;
        $this->PalletMaxHeight = $PalletMaxHeight;
    }
}
