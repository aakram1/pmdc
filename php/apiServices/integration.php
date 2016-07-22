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

//$workflow2 = new ApiRequests(new TopCitiesFlightsEstimates("LAX",["SFO","ORD"], "2016-12-13", "2016-12-16"));
//$result2 = $workflow2->runWorkflow();

//ob_start();
//var_dump($result2);
//$dump2 = ob_get_clean();
//echo $dump2;


ob_start();
var_dump($result);
//$jasonbhai = print_r(json_decode($result));
$dump = ob_get_clean();

$jasonpa = $json_encode($dump);
echo $jasonpa;


/*
$jasonbhai = explode(" ", $dump);
//$jasonbhai = json_decode($result);
for ($i = 0; $i <= 1000; $i++) {
echo $jasonbhai[$i]."<br>";
}
*/
//var_dump(json_decode($dump, true));
//var_dump($jasonbhai);
//echo $jasonbhai[0];

flush();




?>