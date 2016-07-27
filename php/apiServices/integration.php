<?php
include_once '/app/php/apiServices/sabre/workflow/ApiRequests.php';
include_once '/app/php/apiServices/sabre/activities/CheapestFaresForDestinationActivity.php';
include_once '/app/php/apiServices/sabre/activities/TopCitiesFlightsEstimates.php';

class integration {
	
	private $request;
	
	public function __contruct($request) {
		$this->request = $request;
	}
	
	public function getTopCitiesFlightEstimates($request) {
		$request = array("destination" => "SFO", "origins" => ["LAX", "ORD"], "startDate" => "2016/12/12", "endDate" => "2016/12/16");
		$destination = $request->destination;
		$origins = $request->origins;
		$startDate = $request->startDate;
		$endDate = $request->endDate;
		$workflow = new ApiRequests(new TopCitiesFlightsEstimates($destination, $origins, $startDate, $endDate));
		return $workflow->runWorkflow();
	}
}

?>