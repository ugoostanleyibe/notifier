<?php 

class Sessions {

	private function __construct() {
	}

	private function __clone() {
	}

	public static function init() {
		session_start();
	}

	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function get($key) {
		if (isset($_SESSION[$key])) return $_SESSION[$key];
	}

	public static function terminate($key) {
		if (isset($_SESSION[$key])) unset($_SESSION[$key]);
	}

	public static function terminateAll() {
		return session_destroy();
	}
}

?>