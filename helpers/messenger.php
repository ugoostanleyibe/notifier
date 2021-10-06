<?php

require "vendor/autoload.php";

use Twilio\Rest\Client;

class Messenger {

	private const ACCOUNT_SID = "ACd4466ea393dc6283368c41bf0ff11771";
	private const AUTH_TOKEN = "a0e127721e216c628b5184556bec698d";
	private const NUMBER = "+18663380544";

	private function __clone() {
		
	}

	private function __construct() {
		
	}

	public static function sendSMS($to, $body) {
		$client = new Client(self::ACCOUNT_SID, self::AUTH_TOKEN);
		$client->messages->create($to, [
			"from" => self::NUMBER,
			"body" => $body,
		]);
	}
}

?>