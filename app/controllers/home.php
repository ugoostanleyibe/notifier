<?php

class HomeController extends Controller {

	public function index() {
		$this->renderView("Home", "home/index.php", [
			"home.js",
		]);
	}
}

return new HomeController();

?>