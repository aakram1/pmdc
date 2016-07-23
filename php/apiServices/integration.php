<?php
include_once 'sabre/workflow/ApiRequests.php';
include_once 'sabre/activities/CheapestFaresForDestinationActivity.php';
include_once 'sabre/activities/TopCitiesFlightsEstimates.php';

$destination = $_GET["city"];
$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];
$numGuests = $_GET["numguests"];

$destination1 = "SFO";
$countryCode = "US";

$workflow = new ApiRequests(new CheapestFaresForDestinationActivity($countryCode, $destination1));
$result = $workflow->runWorkflow();

ob_start();
var_dump($result);
$dump = ob_get_clean();

//$jasonbhai = print_r(json_decode($result));
$jasonpa = json_encode($dump2,JSON_FORCE_OBJECT);
$jasonbhai = explode(" ", $jasonpa);
$jasonbhai2 = array_filter($jasonbhai);
//$jasonbhai = json_decode($result);
print_r($jasonbhai2);


/*
$workflow2 = new ApiRequests(new TopCitiesFlightsEstimates("LAX",["SFO","ORD"], "2016-12-13", "2016-12-16"));
$result2 = $workflow2->runWorkflow();

ob_start();
var_dump($result2);
$dump2 = ob_get_clean();


$jasonpa2 = json_encode($dump2,JSON_FORCE_OBJECT);
//echo $jasonpa;

$jasonbhai2 = explode(" ", $jasonpa2);
$jasonbhai2a = array_filter($jasonbhai2);
//$jasonbhai = json_decode($result);
print_r($jasonbhai2a);

for ($i = 0; $i <= 25; $i++) {
	echo $jasonbhai[$i]."<br>";
	}
	
*/

flush();




?>