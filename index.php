<?php

$conn = mysqli_connect("localhost","root","Pakistan23","testdb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>PDMC</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="description"
 content="Married not to idea but us">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body onload="checkbrowser()">


<p>Event Start Date: <input type="text" id="datepicker"></p>
<p>End Date: <input type="text" id="datepicker2"></p>
<p>Location: <input type="text"></p>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  
   <script>
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  </script>


<?php
echo "Scene is AWWWN.";
 
for ($i = 1; $i < 6; $i++) 
	{
		echo $i;
			} 
			
//phpinfo();

?>
