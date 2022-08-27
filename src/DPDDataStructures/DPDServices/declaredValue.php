<?php

namespace Ml\DpdApi\DPDDataStructures\DPDServices;

class declaredValue
{
    public int $amount;
    public string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }
}
