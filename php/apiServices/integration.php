<?php
include_once 'sabre/workflow/ApiRequests.php';
include_once 'sabre/activities/CheapestFaresForDestinationActivity.php';

$destination1 = $_GET["city"];
$destination = "SFO";
$countryCode = "US";
$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];
$numGuests = $_GET["numguests"];

$workflow = new ApiRequests(new CheapestFaresForDestinationActivity($countryCode, $destination));
echo "HERE";
$result = $workflow->runWorkflow();
echo "HERE 2";
ob_start();
var_dump($result);
$dump = ob_get_clean();
echo $dump;
echo $destination1;
echo $startdate;
echo $enddate;
echo $numGuests;
flush();
?>