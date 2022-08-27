<?php

namespace Ml\DpdApi\DPDMethods;

use Ml\DpdApi\DPDController;
use Ml\DpdApi\DPDDataStructures\AuthDataV1;

class InfoServices extends DPDController    {

    public function __construct(AuthDataV1 $AuthDataV1) {
        $this->ProductionURL = 'https://dpdinfoservices.dpd.com.pl/DPDInfoServicesObjEventsService/DPDInfoServicesObjEvents?wsdl';
        parent::__construct($AuthDataV1);
    }

    /**
     * @param string $Waybill Waybill number
     * @param bool $eventsSelectTypeALL specifies if all events should be returned or only the last ones (default: ALL [true]) [false = only last event]
     * @return object
     */
    public function getEventsForWaybill(string $Waybill, bool $eventsSelectTypeALL = true): object    {
        return $this->SoapClient->__soapCall('getEventsForWaybillV1', array(
            'parameters' => array (
                'waybill' => $Waybill,
                'eventsSelectType' => $eventsSelectTypeALL ? 'ALL' : 'ONLY_LAST',
                'language' => $this->Language,
                'authDataV1' => $this->AuthDataV1
            )
        ));
    }
}
