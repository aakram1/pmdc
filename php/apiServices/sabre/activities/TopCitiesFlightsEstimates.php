<?php
include_once '/app/php/apiServices/sabre/workflow/Activity.php';
include_once '/app/php/apiServices/sabre/restServices/RestClient.php';
class TopCitiesFlightsEstimates implements Activity {
    private $destination, $origins, $startDate, $endDate;
    
    public function __construct($destination, $origins, $startDate, $endDate) {
        $this->destination = $destination;
        $this->origins = $origins;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    
    public function run(&$sharedContext) {
        $sharedContext->addResult("origins", $this->origins);
        $sharedContext->addResult("destination", $this->destination);
        $sharedContext->addResult("startDate", $this->startDate);
        $sharedContext->addResult("endDate", $this->endDate);
        $call = new RestClient();
        echo $this->destination;
        echo $this->origins;
        foreach ($this->origins as $origin) {
        	$result = $call->executeGetCall("/v1/shop/flights/", $this->getRequest($origin, $this->destination, $this->startDate, $this->endDate));
        	$sharedContext->addResult($origin, $result);
        }
    }
    
    private function getRequest($origin, $destination, $departureDate, $returnDate) {
        $request = array(
        	"origin" => $origin,
        	"destination" => $destination,
        	"departuredate" => $departureDate,
        	"returndate" => $returnDate,
        	"limit"=> "1"
        );
        return $request;
    }
}

?>