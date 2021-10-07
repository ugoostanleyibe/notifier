<?php

require "vendor/autoload.php";

define("TWILIO_ACCOUNT_SID", "ACd4466ea393dc628"."3368c41bf0ff11771");
define("TWILIO_AUTH_TOKEN", "a7e54328b43c3199"."af1b975dd8a42e07");
define("TWILIO_NUMBER", "+18663380544");

final class Messenger {

	private static $client;

	private function __clone() {
		
	}

	private function __construct() {
		
	}

	private static function getClient() {
		self::$client ??= new Twilio\Rest\Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
		return self::$client;
	}

	public static function registerNumber($number) {
		self::getClient()->validationRequests->create($number, [
			"friendlyName" => "Feline",
		]);
	}

	public static function sendSMS($to, $body) {
		self::getClient()->messages->create($to, [
			"from" => TWILIO_NUMBER,
			"body" => $body,
		]);
	}
}

?>