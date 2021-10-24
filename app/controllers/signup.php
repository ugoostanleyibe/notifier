<?php

class SignUpController extends Controller {

	protected $userModel;

	public function __construct() {
		$this->userModel = new UserModel();
		parent::__construct();
	}

	public function index() {
		if (allIsSet("phone", "password", "admin")) {
			try {
				extract(Sanitizer::cleanArray($_POST));

				if ($this->userModel->userExists($phone)) {
					throw new Exception("$phone Is Already In Use");
				}

				$id = $this->userModel->create($phone, Auth::hash($password), $admin);
				exit (json_encode([
					"user_id" => $id,
					"okay" => true,
				]));
			} catch (Exception $bug) {
				die (json_encode([
					"message" => $bug->getMessage(),
					"okay" => false,
				]));
			}
		}

		redirect();
	}
}

return new SignUpController();

?>