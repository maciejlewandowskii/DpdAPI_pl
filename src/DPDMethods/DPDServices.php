<?php

namespace Ml\DpdApi\DPDMethods;

use DateTime;
use Ml\DpdApi\DPDController;
use Ml\DpdApi\DPDDataStructures\AuthDataV1;
use Ml\DpdApi\DPDDataStructures\openUMLFeV5;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\packagesParams;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupCustomerDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupPayerDPPV1;
use Ml\DpdApi\DPDDataStructures\PickupCallSimplifiedDetailsDPPV1\PickupSenderDPPV1;

class DPDServices extends DPDController {

    public function __construct(AuthDataV1 $AuthDataV1) {
        $this->ProductionURL = 'https://dpdservices.dpd.com.pl/DPDPackageObjServicesService/DPDPackageObjServices?WSDL';
        parent::__construct($AuthDataV1);
    }

    /**
     * @param openUMLFeV5 $openUMLFeV5
     * @param int $policyV1 0-2 [0 = STOP_ON_FIRST_ERROR, 1 = IGNORE_ERRORS, 2 = ALL_OR_NOTHING]
     * @return object
     */
    public function generatePackagesNumbers(openUMLFeV5 $openUMLFeV5, int $policyV1 = 0): object   {
        return $this->SoapClient->__soapCall('generatePackagesNumbersV6', array(
            'parameters' => array (
                'openUMLFeV5' => $openUMLFeV5,
                'policyV1' => match ($policyV1) { 1 => 'IGNORE_ERRORS', 2 => 'ALL_OR_NOTHING', default => 'STOP_ON_FIRST_ERROR'},
                'langCode' => $this->Language,
                'authDataV1' => $this->AuthDataV1
            )
        ));
    }

    /**
     * @param string $WayBill
     * @param string $DocFormat PDF, DOC
     * @param string $PageFormat A4, A5, A6
     * @param int $policyV1 0-2 [0 = STOP_ON_FIRST_ERROR, 1 = IGNORE_ERRORS, 2 = ALL_OR_NOTHING]
     * @return object
     */
    public function generateSpedLabels(string $WayBill, string $DocFormat, string $PageFormat, int $policyV1 = 0): object  {
        return $this->SoapClient->__soapCall('generateSpedLabelsV1', array(
            'parameters' => array (
                'dpdServicesParamsV1' => array(
                    'policy' => match ($policyV1) { 1 => 'IGNORE_ERRORS', 2 => 'ALL_OR_NOTHING', default => 'STOP_ON_FIRST_ERROR'},
                    'session' => array(
                        'packages' => array(
                            'parcels' => array(
                                'waybill' => $WayBill
                            )
                        ),
                        'sessionType' => 'DOMESTIC',
                    ),
                    'outputDocFormatV1' => $DocFormat,
                    'outputDocPageFormatV1' => $PageFormat,
                ),
                'authDataV1' => $this->AuthDataV1
            )
        ));
    }

    /**
     * @param string $SessionID
     * @param string $DocFormat PDF, DOC
     * @param string $PageFormat A4, A5, A6
     * @param int $policyV1 0-2 [0 = STOP_ON_FIRST_ERROR, 1 = IGNORE_ERRORS, 2 = ALL_OR_NOTHING]
     * @return object
     */
    public function generateProtocol(string $SessionID, string $DocFormat, string $PageFormat, int $policyV1 = 0): object  {
        return $this->SoapClient->__soapCall('generateProtocolV2', array(
            'parameters' => array (
                'dpdServicesParamsV1' => array(
                    'policy' => match ($policyV1) { 1 => 'IGNORE_ERRORS', 2 => 'ALL_OR_NOTHING', default => 'STOP_ON_FIRST_ERROR'},
                    'session' => array(
                        'sessionId' => $SessionID,
                        'sessionType' => 'DOMESTIC',
                    ),
                    'outputDocFormatV1' => $DocFormat,
                    'outputDocPageFormatV1' => $PageFormat,
                ),
                'authDataV1' => $this->AuthDataV1
            )
        ));
    }

    /**
     * @param DateTime $PickupDate Y-m-d
     * @param string $PickupTimeFrom H:i
     * @param string $PickupTimeTo H:i
     * @param PickupCallSimplifiedDetailsDPPV1 $PickupCallSimplifiedDetails
     * @return object
     */
    public function packagesPickupCall(DateTime $PickupDate, string $PickupTimeFrom, string $PickupTimeTo, PickupCallSimplifiedDetailsDPPV1 $PickupCallSimplifiedDetails): object {
        return $this->SoapClient->__soapCall('packagesPickupCallV4', array(
            'parameters' => array (
                'dpdPickupParamsV3' => array(
                    'operationType' => 'INSERT',
                    'orderType' => 'DOMESTIC',
                    'pickupDate' => '2022-08-30',
                    'pickupTimeFrom' => '10:00',
                    'pickupTimeTo' => '20:00',
                    'waybillsReady' => true,
                    'pickupCallSimplifiedDetails' => $PickupCallSimplifiedDetails
                ),
                'authDataV1' => $this->AuthDataV1
            )
        ));
    }
}
