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

$data = json_decode($dump, true);
//echo $testicle['FareInfo'];
//print_r($testicle);


class FareInfo
{
	public $id;
	public $city;
	public $coords;
	public $destinationRank; /* optional */
	public $currencyCode;
	public $theme; /* optional */
	public $fares = array();
}

class Geo {
	public $latitude;
	public $longitude;
	public function __construct($latitude, $longitude)
	{
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}
}
class Fare
{
	public $lowestFare;
	public $lowestNonStopFare;
	public $departureDateTime;
	public $returnDateTime;
}

 if (isset($data['FareInfo'])) {
            $fares = $data['FareInfo'];
            foreach ($fares as $fare) {
                $fareInfo = new FareInfo();
                $airPortCode = $fare['DestinationLocation'];
                if ($list->keyExists($airPortCode)) {
                    $fareInfo = $list->getItem($airPortCode);
                } else {
                    $geo = $this->translate($airPortCode);
                    $fareInfo->id = $airPortCode;
                    $fareInfo->coords = new Geo($geo['latitude'], $geo['longitude']);
                    $fareInfo->city = $geo['city'];
                    $fareInfo->currencyCode = $fare['CurrencyCode'];
                    if (isset($fare['DestinationRank'])) {
                        $fareInfo->destinationRank = $fare['DestinationRank'];
                    }
                    if (isset($fare['Theme'])) {
                        $fareInfo->theme = $fare['Theme'];
                    }
                    $list->addItem($fareInfo, $airPortCode);
                }
                $fareObj = new Fare();
                $fareObj->lowestFare = $fare['LowestFare'];
				$fareObj->lowestNonStopFare = $fare['LowestNonStopFare'];
                $fareObj->departureDateTime = $fare['DepartureDateTime'];
                $fareObj->returnDateTime = $fare['ReturnDateTime'];
                $fareInfo->fares[] = $fareObj;
            }
        }
        print_r(json_encode(array_values($list->items)));
 

/*
//$jasonbhai = print_r(json_decode($result));
$jasonpa = json_encode($dump,JSON_FORCE_OBJECT);
$jasonbhai = explode(" ", $jasonpa);
$jasonwf1 = array_filter($jasonbhai);
$jasonwf1a = array_values($jasonwf1);
//$jasonbhai = json_decode($result);


$j=0;

for ($i = 0; $i <= 1000; $i++) {
	
	if (stripos($jasonwf1a[$i], "Fare")) {
		$cleaned[$j] = $jasonwf1a[$i+1];
		$j++; 
	}
}

print_r($cleaned);
print_r($jasonwf1a);
flush();



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

/*
for ($i = 0; $i <= 25; $i++) {
	(preg_match("/php/i"
	echo $jasonbhai[$i]."<br>";
	}
*/	


flush();




?>