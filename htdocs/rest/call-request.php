<?php
	// Include the Twilio PHP library
	require 'Services/Twilio.php';

	// Twilio REST API version
	$version = "2010-04-01";

	// Set our Account SID and AuthToken
	string sid = "***********************";
    string token = "************************";
	
	// A phone number you have previously validated with Twilio
	$phonenumber = '+306976928623';
	
	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($sid, $token, $version);

	try {
		// Initiate a new outbound call
		$call = $client->account->calls->create(
			$phonenumber, // The number of the phone initiating the call
			'+306976928623', // The number of the phone receiving call
			'http://demo.twilio.com/welcome/voice/' // The URL Twilio will request when the call is answered
		);
		echo 'Started call: ' . $call->sid;
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
