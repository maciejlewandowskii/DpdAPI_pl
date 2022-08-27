<?php

namespace Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;

class packagesParams
{
    public bool $dox;
    public int $doxCount;
    public bool $pallet;
    public int $palletMaxHeight;
    public int $palletMaxWeight;
    public int $palletsCount;
    public int $palletsWeight;
    public int $parcelMaxDepth;
    public int $parcelMaxHeight;
    public int $parcelMaxWeight;
    public int $parcelMaxWidth;
    public int $parcelsCount;
    public int $parcelsWeight;
    public bool $standardParcel;

    public function __construct($dox, $doxCount, $pallet, $palletMaxHeight, $palletMaxWeight, $palletCount, $palletsWeight, $parcelMaxDepth, $parcelMaxHeight, $parcelMaxWeight, $parcelMaxWidth, $parcelsCount, $parcelsWeight, $standardParcel) {
        $this->dox = $dox;
        $this->doxCount = $doxCount;
        $this->pallet = $pallet;
        $this->palletMaxHeight = $palletMaxHeight;
        $this->palletMaxWeight = $palletMaxWeight;
        $this->palletsCount = $palletCount;
        $this->palletsWeight = $palletsWeight;
        $this->parcelMaxDepth = $parcelMaxDepth;
        $this->parcelMaxHeight = $parcelMaxHeight;
        $this->parcelMaxWeight = $parcelMaxWeight;
        $this->parcelMaxWidth = $parcelMaxWidth;
        $this->parcelsCount = $parcelsCount;
        $this->parcelsWeight = $parcelsWeight;
        $this->standardParcel = $standardParcel;
    }
}
