<?php

require 'vendor/autoload.php';

$basic  = 'new /sms_app/vendor/vonage/Client/Credentials'/Basic("5d62e7d4", "RSPwlNBp9qEnXYbx");
$client = 'new /sms_app/vendor/vonage/client'($basic);

$response = $client->sms()->send(
  'new /sms_app/vendor/vonage/SMS/Message/SMS'("94751441764", "BRAND_NAME", "A text message sent using the Nexmo SMS API")
);

$message = $response->current();

if ($message->getStatus() == 0) {
  echo "The message was sent successfully\n";
} else {
  echo "The message failed with status: " . $message->getStatus() . "\n";
}

?>