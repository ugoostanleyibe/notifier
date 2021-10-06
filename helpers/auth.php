<?php 

class Auth {

	private function __clone() {

	}

	private function __construct() {

	}

	public static function hash($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public static function check($password, $hash) {
		return password_verify($password, $hash);
	}
}

?>