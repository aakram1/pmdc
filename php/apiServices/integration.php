<?php
include_once 'sabre/workflow/ApiRequests.php';
include_once 'sabre/activities/CheapestFaresForDestinationActivity.php';

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

//$jasonbhai = json_decode($result);
for ($i = 1; $i <= 10; $i++) {
	echo $dump[$i].'<br>';
}

//$jasonbhai =;
//var_dump(json_decode($dump, true));
//var_dump($jasonbhai);
//echo $jasonbhai[0];

flush();




?>