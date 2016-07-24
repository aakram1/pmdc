<?php
include 'sabre/workflow/ApiRequests.php';
include 'sabre/activities/CheapestFaresForDestinationActivity.php';
include 'sabre/activities/TopCitiesFlightsEstimates.php';

class integration {
	
	private $request;
	
	public function __contruct($request) {
		$this->request = $request;
	}
	
	public function getTopCitiesFlightEstimates() {
		$destination = $request[0]->destination;
		$origins = $request[0]->origins;
		$startDate = $request[0]->startDate;
		$endDate = $request[0]->endDate;
		$workflow = new ApiRequests(new TopCitiesFlightsEstimates($destination, $origins, $startDate, $endDate));
		return $workflow->runWorkflow();
	}
}

?>