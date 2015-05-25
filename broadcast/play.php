<?php 

header("content-type: text/xml");
if ($_REQUEST['url']) {
	$response = new Services_Twilio_Twiml();
	$response->play($_REQUEST['url']);
	print $response;
}
