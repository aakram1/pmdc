<?php

// make into class
$headers = 'From: noreply@baarei.com';
$Message = "Test";
$ToEmail = "omeraftab235@gmail.com";
$subject = "Test";
mail($ToEmail, $subject, $Message, $headers);
echo "Email sent to ".$ToEmail." with subject ".$subject;

?>