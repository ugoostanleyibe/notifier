<?php

class MessageController extends Controller {

	protected $messageModel, $userModel;

	public function __construct() {
		$this->messageModel = new MessageModel();
		$this->userModel = new UserModel();
		parent::__construct();
	}

	public function index() {
		redirect();
	}

	public function send() {
		if (allIsSet("sender", "content")) {
			try {
				extract(Sanitizer::cleanArray($_POST));

				$user = $this->userModel->getById($sender);

				if (isset($user)) {
					$recipients = $this->userModel->getAllPhoneNumbers();

					foreach ($recipients as $recipient) {
						Messenger::sendSMS($recipient, $content);
					}

					$this->messageModel->create($sender, $content);
					exit (json_encode([
						"recipients" => count($recipients),
						"okay" => true,
					]));
				}

				throw new Exception("Incorrect Sender ID");
			} catch (Exception $bug) {
				die (json_encode([
					"message" => $bug->getMessage(),
					"okay" => false,
				]));
			}
		}

		redirect();
	}

	public function all() {
		try {
			$data = $this->messageModel->getAll();
			exit (json_encode([
				"data" => $data,
				"okay" => true,
			]));
		} catch (Exception $bug) {
			die (json_encode([
				"message" => $bug->getMessage(),
				"okay" => false,
			]));
		}
	}
}

return new MessageController();

?>