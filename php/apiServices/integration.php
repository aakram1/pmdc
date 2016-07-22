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


//ob_start();
print_r($result);
//$dump = ob_get_clean();

//$jasonbhai = json_decode($result);
for ($i = 0; $i <= 100; $i++) {
	echo $result[$i].'<br>';
}

//$jasonbhai =;
//var_dump(json_decode($dump, true));
//var_dump($jasonbhai);
//echo $jasonbhai[0];

//flush();




?>