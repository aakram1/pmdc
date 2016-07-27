<?php
include_once '/app/php/apiServices/sabre/workflow/ApiRequests.php';
include_once '/app/php/apiServices/sabre/activities/CheapestFaresForDestinationActivity.php';
include_once '/app/php/apiServices/sabre/activities/TopCitiesFlightsEstimates.php';

class integration {
	
	public function __contruct() {
	}
	
	public function getTopCitiesFlightEstimates($request) {
		print_r($request);
		$destination = $request["destination"];
		$origins = $request["origins"];
		$startDate = $request["startDate"];
		$endDate = $request["endDate"];
		$workflow = new ApiRequests(new TopCitiesFlightsEstimates($destination, $origins, $startDate, $endDate));
		return $workflow->runWorkflow();
	}
}

?>