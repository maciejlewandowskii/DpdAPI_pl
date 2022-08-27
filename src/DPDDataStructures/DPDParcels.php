<?php

namespace Ml\DpdApi\DPDDataStructures;

class DPDParcels
{
    public int $weight;
    public int $sizeX;
    public int $sizeY;
    public int $sizeZ;
    public string $content;
    public string $customerData1;
    public string $customerData2;
    public string $customerData3;

    public function __construct(int $Weight, int $SizeX, int $SizeY, int $SizeZ, string $Content, string $CustomerData1, string $CustomerData2, string $CustomerData3)
    {
        $this->weight = $Weight;
        $this->sizeX = $SizeX;
        $this->sizeY = $SizeY;
        $this->sizeZ = $SizeZ;
        $this->content = $Content;
        $this->customerData1 = $CustomerData1;
        $this->customerData2 = $CustomerData2;
        $this->customerData3 = $CustomerData3;
    }
}
