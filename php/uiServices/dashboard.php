<?php
use function GuzzleHttp\json_decode;

include_once ('/app/php/apiServices/integration.php');

$destination = $_GET["city"];
$startdate = $_GET["startdate"];
$enddate = $_GET["enddate"];
$numGuests = $_GET["numguests"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>baarei</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

	</head>
	<body class="landing">
		<header id="header">
			<h1><a href="../../../index.php">baaREI</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.html">About Us</a></li> <!-- Meet Asad & Omer, Vision Values, Careers, Contact us -->
					<li><a href="generic.html">Customers</a></li>
					<li><a href="elements.html">Partners</a></li>
					<li><a href="#">Log In</a></li>
					<li><button class="button special" data-toggle="modal" data-target="#myModal">Sign Up</button></li>
				</ul>
			</nav>
		</header>
		<?php 
			$request = array("destination" => "SFO", "origins" => ["LAX", "ORD"], "startDate" => "2016-12-12", "endDate" => "2016-12-16");
			$my_int = new integration();
			$sharedContext = $my_int->getTopCitiesFlightEstimates($request);
			$result = $sharedContext->getResult("LAX");
			$decoded_data = json_decode($result);
			print_r($decoded_data);
		?>
				
		<script type="text/javascript">
			var result = JSON.parse( '<?php echo $result ?>' );
			
			var out = "<table>";

		    out += "</table>";
		    document.getElementById("resultsTable").innerHTML = out;
	  	</script>
	
		<section id="banner">
			<h2>Fights are being searched..</h2>
			<div id="resultsTable"></div>
		</section>
	</body>
</html>