<?php
include_once 'workflow/ApiRequests.php';
include_once 'activities/CheapestFaresForDestinationActivity.php';

$destination1 = $_GET["city"];
$destination = "SFO";
$countryCode = "US";
$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];
$numGuests = $_GET["numGuests"];

//$origin = filter_input(INPUT_POST, "countryCode");
//$destination = filter_input(INPUT_POST, "destination");
$workflow = new Workflow(new CheapestFaresForDestinationActivity($countryCode, $destination));
$result = $workflow->runWorkflow();
ob_start();
var_dump($result);
$dump = ob_get_clean();
echo $dump;
echo $destination1;
flush();

?>