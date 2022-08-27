<?php

namespace Ml\DpdApi\DPDDataStructures;

class DPDReceiver
{
    public string $company;
    public string $name;
    public string $address;
    public string $city;
    public string $countryCode;
    public string $postalCode;
    public string $phone;
    public string $email;
    /* public int $fid; */

    public function __construct(string $company, string $name, string $address, string $city, string $countryCode, string $postalCode, string $phone, string $email)
    {
        $this->company = $company;
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->postalCode = $postalCode;
        $this->phone = $phone;
        $this->email = $email;
    }
}
