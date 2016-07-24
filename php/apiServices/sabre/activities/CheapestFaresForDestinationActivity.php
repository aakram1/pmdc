<?php
include_once 'app/php/apiServices/sabre/workflow/Activity.php';
include_once 'app/php/apiServices/sabre/restServices/RestClient.php';
class CheapestFaresForDestinationActivity implements Activity {
    private $destination, $countryCode;
    
    public function __construct($countryCode, $destination) {
        $this->countryCode = $countryCode;
        $this->destination = $destination;
    }
    
    public function run(&$sharedContext) {
        $sharedContext->addResult("pointofsalecountry", $this->countryCode);
        $sharedContext->addResult("destination", $this->destination);
        $call = new RestClient();
        $result = $call->executeGetCall("/v1/shop/flights/cheapest/fares/" . $this->destination, $this->getRequest($this->countryCode));
        $sharedContext->addResult("LowestFares", $result);
    }
    
    private function getRequest($countryCode) {
        $request = array(
                "pointofsalecountry" => $countryCode
        );
        return $request;
    }
}

?>