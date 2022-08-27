<?php

namespace Ml\DpdApi\DPDDataStructures\DPDServices;

class cod
{
    public float $amount;
    public string $currency;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }
}
