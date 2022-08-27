<?php

namespace Ml\DpdApi\DPDDataStructures\DPDServices;

class guarantee
{
    public string $type;
    public string $value;

    /**
     * @param string $type [TIME1130 (TIME[hour:minute], delivery before this time), SATURDAY (delivery on Saturday), DPDNEXTDAY (delivery on next day), DPDTODAY (delivery on SAME DAY)]
     * @param string $value
     */
    public function __construct(string $type, string $value = '')
    {
        $this->type = $type;
        $this->value = $value;
    }
}
