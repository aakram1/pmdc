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
		print_r($this->request);
		$destination = $this->request["destination"];
		$origins = $this->request["origins"];
		$startDate = $this->request["startDate"];
		$endDate = $this->request["endDate"];
		echo $destination;
		$workflow = new ApiRequests(new TopCitiesFlightsEstimates($destination, $origins, $startDate, $endDate));
		return $workflow->runWorkflow();
	}
}

?>