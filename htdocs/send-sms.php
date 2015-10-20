<?php
 
require "/path/to/twilio-php/Services/Twilio.php";
 
// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "ACe1eba0a045df901297dfc4ce0de51de2";
$AuthToken = "53c19ce2566b5d1f19ec8f733f98c28a";
 
$client = new Services_Twilio($AccountSid, $AuthToken);
 
$message = $client->account->messages->create(array(
    "From" => "+306976928623",
    "To" => "+306984077868",
    "Body" => "mhn troma3eis to stelnv dokimastika gia na dv an leitoyrgei kati se agapaw oso tipota ston kosmo",
));
 
// Display a confirmation message on the screen
echo "Sent message {$message->sid}";