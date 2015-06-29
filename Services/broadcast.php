<?php
require 'Services/Twilio.php';
require 'storenumbers.php';

// Twilio REST API version
$version = '2010-04-01';

// Set our AccountSid and AuthToken
$sid = 'AXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$token = 'YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY';

// Outgoing Caller ID you have previously validated with Twilio
$number = 'NNNNNNNNNN';

// File Location for use in REST URL
$urlbase = 'http://www.example.com/php/';

// Instantiate a new Twilio Rest Client
$client = new Services_Twilio($sid, $token, $version);

// @start snippet
if (empty($_REQUEST['RecordingUrl'])) {

	// Warn the caller if we didn't find a recording URL
	$response = 'Error: No URL';

} else if (isset($_REQUEST['number'])) {

	// Attempt to retrieve contacts
	$contacts = getNumbers($_REQUEST['number']);

	if (empty($contacts)) {
		// Warn the caller if we didn't find any contacts
		$response = 'No Contacts could be found';

	} else {

		// Call each contact
		foreach ($contacts as $output) {
			try {
				$url = $urlbase . '/play.php?url=' . $_REQUEST['RecordingUrl'];
				$client->account->calls->create($number, $output, $url);
			} catch (Exception $e) {
				// log error
			}
		}

		$response = 'Your message has been broadcasted';
	}
}
// Render TwiML
header('content-type: text/xml');
print $response;
// @end snippet
?>