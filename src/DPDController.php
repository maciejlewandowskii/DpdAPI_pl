<?php

namespace Ml\DpdApi;

use Exception;
use Ml\DpdApi\DPDDataStructures\AuthDataV1;
use SoapClient;

abstract class DPDController {

   protected SoapClient $SoapClient;
   protected string $ProductionURL;
   protected AuthDataV1 $AuthDataV1;
   protected string $Language = 'PL';

   public function __construct(AuthDataV1 $AuthDataV1) {
       try {
           if(isset($this->ProductionURL) && !empty($this->ProductionURL)) {
               $this->SoapClient = new SoapClient($this->ProductionURL, ['features' => SOAP_SINGLE_ELEMENT_ARRAYS]);
               $this->AuthDataV1 = $AuthDataV1;
           } else throw new Exception('Production URL is not set');
       }
       catch (Exception) {
           exit(0);
       }
   }
}
