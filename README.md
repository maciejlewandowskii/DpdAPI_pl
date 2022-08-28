
# DpdAPI_pl

Simple PHP Lib for using Polish version of DPD API, you can track or send parcels.


## Usage/Examples

```php
<?php

use Ml\DpdApi\DPD;
use Ml\DpdApi\DPDDataStructures\AuthDataV1;
use Ml\DpdApi\DPDDataStructures\DPDParcels;
use Ml\DpdApi\DPDDataStructures\DPDReceiver;
use Ml\DpdApi\DPDDataStructures\DPDSender;

require 'vendor/autoload.php';

$AuthDataV1 = new AuthDataV1(
    "",
    "",
    "",
);

$waybill = '1000452444028U';


    $DPD = new DPD($AuthDataV1, 0000, 'FIRMA1', 'Oddział 2');
    $DPD->setPackages(
        new DPDParcels(10, 10, 10, 10, 'TEST', 'NIE NADAWAĆ NIC', 'TEST DPD', 'TO TYLKO TEST'),
        new DPDReceiver('', '', '', '', 'PL', '', '', ''),
        new DPDSender('', '', '', '', 'PL', '', '', ''),
        'TEST ZAMAWIANIA KURIERA DPD ZA POBRANIEM',
        99.99
    );

    $result = $DPD->getPackagesNumbers();
    //$result = $DPD->getLabel();
    //$result = $DPD->getProtocol();
   // $DPD->orderCourier(new DateTime('2022-08-30'), 9, 17);

    print_r($DPD->WayBill);


```

