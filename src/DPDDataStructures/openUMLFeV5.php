<?php

namespace Ml\DpdApi\DPDDataStructures;

class openUMLFeV5
{
    public DPDPackages $packages;

    public function __construct(DPDPackages $Packages)
    {
        $this->packages = $Packages;
    }
}
