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
		$destination = $request->destination;
		$origins = $request->origins;
		$startDate = $request->startDate;
		$endDate = $request->endDate;
		echo $destination;
		echo $origins;
		echo $startDate;
		echo $endDate;
		$workflow = new ApiRequests(new TopCitiesFlightsEstimates($destination, $origins, $startDate, $endDate));
		return $workflow->runWorkflow();
	}
}

?>