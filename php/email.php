<?php

require '/app/vendor/autoload.php';
$sendgrid = new SendGrid('app52008467@heroku.com', 'asvwlyiw5947');

$email = new SendGrid\Email();
$email->addTo('omeraftab235@gmail.com')
->setFrom('noreply@baarei.com')
->setSubject('Pakistan ka matlab kya?')
->setText('Pakistan Zindabad!')
->setHtml('<strong>Pakistan Zindabad!</strong>');

$sendgrid->send($email);

// make into class
//$headers = 'From: noreply@baarei.com';
//$Message = "Test";
//$ToEmail = "omeraftab235@gmail.com";
//$subject = "Test";
//mail($ToEmail, $subject, $Message, $headers);
//echo "Email sent to ".$ToEmail." with subject ".$subject;
echo "Email sent";

?>