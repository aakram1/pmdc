<?php
include_once 'php/apiServices/integration.php';

session_start();

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
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/popupmenu.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xsmall.css" />
			<link rel="stylesheet" href="css/style-small.css" />
			<link rel="stylesheet" href="css/style-medium.css" />
			<link rel="stylesheet" href="css/style-large.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">
		<header id="header">
			<h1><a href="index.html">baaREI</a></h1>
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
		<script type="text/javascript">
		var result = JSON.parse(<?php 
				$request = array("destintation" => "SFO", "origins" => ["LAX", "ORG"], "startDate" => "2016/12/12", "endDate" => "2016/12/16");
				$integration = new integration($request);
				$result = $integration->getTopCitiesFlightEstimates();
				echo json_encode($result);
			?> );
		var out = "<table>";

		debugger;
	    for(i = 0; i < arr.length; i++) {
	        out += "<tr><td>" +
	        arr[i].Name +
	        "</td><td>" +
	        arr[i].City +
	        "</td><td>" +
	        arr[i].Country +
	        "</td></tr>";
	    }
	    out += "</table>";
	    document.getElementById("resultsTable").innerHTML = out;
	  	</script>
	
		<section id="banner">
			<h2>Fights are being searched..</h2>
			<div id="resultsTable"></div>
		</section>
	</body>
</html>