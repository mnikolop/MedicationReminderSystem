<?php
require "Services/Twilio.php";
require "storenumbers.php";

/* File Location for use in REST URL */
$url = 'http://www.example.com/php/';

/* Start TwiML */
header("content-type: text/xml");
$response = new Services_Twilio_Twiml();

/* Check to make sure that the user has contacts in the database */
if (getNumbers($_REQUEST['From'])) {
	$response->record(array(
		'action' => $url . 'broadcast.php?number=' . $_REQUEST['From']
	));
	$response->say('I did not receive a message');
} else {
	$response->say('You have not registered any contacts');
}
print $response;
?>
