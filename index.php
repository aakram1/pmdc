<?php
/**
 * Yelp API v2.0 code sample.
 *
 * This program demonstrates the capability of the Yelp API version 2.0
 * by using the Search API to query for businesses by a search term and location,
 * and the Business API to query additional information about the top result
 * from the search query.
 * 
 * Please refer to http://www.yelp.com/developers/documentation for the API documentation.
 * 
 * This program requires a PHP OAuth2 library, which is included in this branch and can be
 * found here:
 *      http://oauth.googlecode.com/svn/code/php/
 * 
 * Sample usage of the program:
 * `php sample.php --term="bars" --location="San Francisco, CA"`
 */
echo "Top of the php";
// Enter the path that the oauth library is in relation to the php file
require_once('lib/OAuth.php');
// Set your OAuth credentials here  
// These credentials can be obtained from the 'Manage API Access' page in the
// developers documentation (http://www.yelp.com/developers)
$CONSUMER_KEY = '_z2cSKBCDv-MSckuAeBSYw';
$CONSUMER_SECRET = 'BpwBO5RjY9JqhxIME5Br_9PULl0';
$TOKEN = 'Jjc-xvqPLjN0Vv6C801Wka9yq_5J8G9E';
$TOKEN_SECRET = 'v2REHLblYBxVR5VXD0p7Evo_bo4';
$API_HOST = 'api.yelp.com';
$DEFAULT_TERM = 'dinner';
$DEFAULT_LOCATION = 'San Francisco, CA';
$SEARCH_LIMIT = 3;
$SEARCH_PATH = '/v2/search/';
$BUSINESS_PATH = '/v2/business/';
/** 
 * Makes a request to the Yelp API and returns the response
 * 
 * @param    $host    The domain host of the API 
 * @param    $path    The path of the APi after the domain
 * @return   The JSON response from the request      
 */
function request($host, $path) {
    $unsigned_url = "https://" . $host . $path;
    // Token object built using the OAuth library
    $token = new OAuthToken($GLOBALS['TOKEN'], $GLOBALS['TOKEN_SECRET']);
    // Consumer object built using the OAuth library
    $consumer = new OAuthConsumer($GLOBALS['CONSUMER_KEY'], $GLOBALS['CONSUMER_SECRET']);
    // Yelp uses HMAC SHA1 encoding
    $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
    $oauthrequest = OAuthRequest::from_consumer_and_token(
        $consumer, 
        $token, 
        'GET', 
        $unsigned_url
    );
    
    // Sign the request
    $oauthrequest->sign_request($signature_method, $consumer, $token);
    
    // Get the signed URL
    $signed_url = $oauthrequest->to_url();
    
    // Send Yelp API Call
    try {
        $ch = curl_init($signed_url);
        if (FALSE === $ch)
            throw new Exception('Failed to initialize');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        if (FALSE === $data)
            throw new Exception(curl_error($ch), curl_errno($ch));
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (200 != $http_status)
            throw new Exception($data, $http_status);
        curl_close($ch);
    } catch(Exception $e) {
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    }
    
    return $data;
}
/**
 * Query the Search API by a search term and location 
 * 
 * @param    $term        The search term passed to the API 
 * @param    $location    The search location passed to the API 
 * @return   The JSON response from the request 
 */
function search($term, $location) {
    $url_params = array();
    
    $url_params['term'] = $term ?: $GLOBALS['DEFAULT_TERM'];
    $url_params['location'] = $location?: $GLOBALS['DEFAULT_LOCATION'];
    $url_params['limit'] = $GLOBALS['SEARCH_LIMIT'];
    $search_path = $GLOBALS['SEARCH_PATH'] . "?" . http_build_query($url_params);
    
    return request($GLOBALS['API_HOST'], $search_path);
}
/**
 * Query the Business API by business_id
 * 
 * @param    $business_id    The ID of the business to query
 * @return   The JSON response from the request 
 */
function get_business($business_id) {
    $business_path = $GLOBALS['BUSINESS_PATH'] . urlencode($business_id);
    
    return request($GLOBALS['API_HOST'], $business_path);
}
/**
 * Queries the API by the input values from the user 
 * 
 * @param    $term        The search term to query
 * @param    $location    The location of the business to query
 */
function query_api($term, $location) {     
    $response = json_decode(search($term, $location));
    $business_id = $response->businesses[0]->id;
    
    print sprintf(
        "%d businesses found, querying business info for the top result \"%s\"\n\n",         
        count($response->businesses),
        $business_id
    );
    
    $response = get_business($business_id);
    
    print sprintf("Result for business \"%s\" found:\n", $business_id);
    print "$response\n";
}
/**
 * User input is handled here 
 */
$longopts  = array(
    "term::",
    "location::",
);
/*    
$options = getopt("", $longopts);
$term = $options['term'] ?: '';
$location = $options['location'] ?: '';
query_api($term, $location);
*/
/*query_api("projector", "San Francisco");*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : PlainDisplay 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140309

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">PlainDisplay</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>
				<li><a href="#" accesskey="2" title="">Our Customers</a></li>
				<li><a href="#" accesskey="3" title="">About Us</a></li>
				<li><a href="#" accesskey="4" title="">Careers</a></li>
				<li><a href="#" accesskey="5" title="">Contact Us</a></li>
			</ul>
		</div>
	</div>
	</div>
	<div id="banner">
		<div class="container">
			<div class="title">
				<h2>Phajja Din Muhammad Cola</h2>
				<span class="byline">Especial Edition</span> </div>
			<ul class="actions">
				<li><a href="#" class="button">Enter Cheema Now</a></li>
			</ul>
		</div>
	</div>
	<div id="extra" class="container">
		<div class="title">
			<h2>Praesent scelerisquet</h2>
			<span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue</span> </div>
		<div id="three-column">
			<div class="boxA">
				<div class="box"> <span class="fa fa-cloud-download"></span>
					<p>Simplify Group Travel. erwess aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
				</div>
			</div>
			<div class="boxB">
				<div class="box"> <span class="fa fa-user"></span>
					<p>Personalize attendee experience with world class...</p>
				</div>
			</div>
			<div class="boxC">
				<div class="box"> <span class="fa fa-cogs"></span>
					<p> Control event budget with dynamic cost updates</p>
				</div>
			</div>
		</div>
		<ul class="actions">
			<li><a href="#" class="button">Etiam posuere</a></li>
		</ul>
	</div>
	<div id="featured">
		<div class="container">
			<div class="title">
				<h2>Fusce ultrices fringilla metus</h2>
				<span class="byline">Donec leo, vivamus fermentum nibh in augue praesent a lacus at urna congue</span> </div>
			<p>This is <strong>PlainDisplay</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
		</div>
		<ul class="actions">
			<li><a href="#" class="button">Etiam posuere</a></li>
		</ul>
	</div>
	<div id="page" class="container">
		<div class="title">
			<h2>Nulla luctus eleifend</h2>
			<span class="byline">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span> </div>
		<p> Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum. Nulla enim eros nibh. Duis enim nulla, luctus eu, dapibus lacinia, venenatis id, quam. Vestibulum imperdiet, magna nec eleifend rutrum, nunc lectus vestibulum velit, euismod lacinia quam nisl id lorem. Quisque erat. Vestibulum pellentesque, justo mollis pretium suscipit, justo nulla blandit libero, in blandit augue justo quis nisl. Fusce mattis viverra elit. Fusce quis tortor.</p>
		<ul class="actions">
			<li><a href="#" class="button">Etiam posuere</a></li>
		</ul>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>