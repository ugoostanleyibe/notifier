<?php

require "vendor/autoload.php";

use Twilio\Rest\Client;

class Messenger {

	private function __clone() {
		
	}

	private function __construct() {
		
	}

	public static function sendSMS($to, $body) {
		$client = new Client("ACd4466ea393dc628"."3368c41bf0ff11771", "a7e54328b43c3199"."af1b975dd8a42e07");
		$client->messages->create($to, [
			"from" => "+18663380544",
			"body" => $body,
		]);
	}
}

?>