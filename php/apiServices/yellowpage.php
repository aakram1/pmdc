<?php


//make class
$zipcode = '94080';
$term = 'projector';
$radius = '5';
$listingcount = '10';
$apikey='tq6j8nz7b8';

$url = 'http://api2.yp.com/listings/v1/search?searchloc='.$zipcode.'&term='.$term.'&format=json&sort=distance&radius='.$radius.'&listingcount='.$listingcount.'&key='.$apikey;
echo $url;

// create a new cURL resource
$ch = curl_init();
// set URL and other appropriate options
$timeout = 5; // set to zero for no timeout
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$file_contents = curl_exec($ch);
curl_close($ch);

$RawJason = $file_contents;
echo $RawJason;
//http://api2.yp.com/listings/v1/search?searchloc=94080&term=projector&format=json&sort=distance&radius=5&listingcount=10&key=tq6j8nz7b8
//ob_start();
//var_dump($result);
//$dump = ob_get_clean();


$CodedJason = json_encode($RawJason,JSON_FORCE_OBJECT); 
echo $CodedJason;

?>



<script type="text/javascript">
			var result = JSON.parse( '<?php echo $CodedJason; ?>' );
			var out = "<table>";
			debugger;
		    for(i = 0; i < arr.length; i++) {
		        out += "<tr><td>" +
		        arr[i].SearchListings +
		        "</td><td>" +
		        arr[i].City +
		        "</td><td>" +
		        arr[i].Country +
		        "</td></tr>";
		    }
		    out += "</table>";
		    document.getElementById("resultsTable").innerHTML = out;
	  	</script>
