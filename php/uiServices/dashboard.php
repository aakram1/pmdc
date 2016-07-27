<?php
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
			$request = array("destination" => "SFO", "origins" => ["LAX", "ORD"], "startDate" => "2016/12/12", "endDate" => "2016/12/16");
			var_dump($request);
			$integration = new integration($request);
			$result = $integration->getTopCitiesFlightEstimates();
			var_dump($result);
		?>
				
		<script type="text/javascript">
			var result = JSON.parse( '<?php echo json_encode($result); ?>' );
			var out = "<table>";

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