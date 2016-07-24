<?php
include_once '/app/php/apiServices/sabre/workflow/ApiRequests.php';
include_once '/app/php/apiServices/sabre/activities/CheapestFaresForDestinationActivity.php';
include_once '/app/php/apiServices/sabre/activities/TopCitiesFlightsEstimates.php';

class integration {
	
	private $request;
	
	public function __contruct($request) {
		$this->request = $request;
	}
	
	public function getTopCitiesFlightEstimates() {
		echo $this->request;
		$destination = $this->request[0]->destination;
		$origins = $this->request[0]->origins;
		$startDate = $this->request[0]->startDate;
		$endDate = $this->request[0]->endDate;
		echo $destination;
		echo $origins;
		echo $startDate;
		echo $endDate;
		$workflow = new ApiRequests(new TopCitiesFlightsEstimates($destination, $origins, $startDate, $endDate));
		return $workflow->runWorkflow();
	}
}

?>