<?php

class SignInController extends Controller {

	protected $userModel;

	public function __construct() {
		$this->userModel = new UserModel();
		parent::__construct();
	}

	public function index() {
		if (allIsSet("phone", "password")) {
			try {
				extract(Sanitizer::cleanArray($_POST));
				$user = $this->userModel->getByPhone($phone);

				if (isset($user) && Auth::check($password, $user["password"])) {
					exit (json_encode([
						"user_id" => $user["user_id"],
						"okay" => true,
					]));
				}

				throw new Exception("Incorrect Phone Number Or Password");
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

return new SignInController();

?>