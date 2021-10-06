<?php

class UserModel extends Model {

	public function create($phoneNumber, $password, $admin) {
		try {
			return $this->db->create("user", [
				":phone_number" => $phoneNumber,
				":password" => $password,
				":is_admin" => $admin,
			])->execute();
		} catch (PDOException $bug) {
			die ($bug->getMessage());
		}
	}

	public function getAllPhoneNumbers() {
		return array_map(function($user){return $user["phone_number"];}, $this->getAll());
	}

	public function getAll() {
		return $this->db->select("*")->from("user")
			->fetch() ?? [];
	}

	protected function get($column, $value) {
		$data = $this->db->select("*")->from("user")
			->where("$column = $value")
			->fetch();

		if (!empty($data)) return $data[0];
	}

	public function userExists($phone) {
		return is_array($this->getByPhone($phone));
	}

	public function getByPhone($phone) {
		return $this->get("phone_number", $phone);
	}

	public function getById($id) {
		return $this->get("user_id", $id);
	}

	public function getCount() {
		return $this->db->select("COUNT(user_id)")->from("user")
			->fetch(true)[0][0];
	}
}

?>