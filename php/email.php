<?php

require '../vendor/autoload.php';

/* sendgrid v2
$sendgrid = new SendGrid('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');
//$sendgrid = new SendGrid('app52008467@heroku.com', 'asvwlyiw5947');
//
$email = new SendGrid\Email();

$email->addTo('omeraftab235@gmail.com')
	->setFrom('noreply@baarei.com')
	->setSubject('Pakistan ka matlab kya?')
	->setText('Pakistan Zindabad!')
	->setHtml('<strong>Pakistan Zindabad!</strong>');

$sendgrid->send($email); */


$from = new SendGrid\Email("Baarei Admin", "noreply@baarei.com");
$subject = "Pakistan ka matlab kya?";
$to = new SendGrid\Email("Omer Aftab", "omeraftab235@gmail.com");
$content = new SendGrid\Content("text/plain", "Pakistan Zindabad!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

//$apiKey = getenv('Authorization: Bearer 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');
//full access key: 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
//$apiKey = getenv('Authorization: Bearer BiyrbV__TjmEWjN2qPvhMw');
//$apiKey = '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';

$apiKey = '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';

$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();
echo "Email sent?";

// make into class
//$headers = 'From: noreply@baarei.com';
//$Message = "Test";
//$ToEmail = "omeraftab235@gmail.com";
//$subject = "Test";
//mail($ToEmail, $subject, $Message, $headers);
//echo "Email sent to ".$ToEmail." with subject ".$subject;
//echo "Email sent";

?>