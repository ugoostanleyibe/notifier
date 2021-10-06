<?php

class MessageModel extends Model {

	public function create($sender, $content) {
		try {
			return $this->db->create("message", [
				":content" => $content,
				":sender" => $sender,
			])->execute();
		} catch (PDOException $bug) {
			die ($bug->getMessage());
		}
	}

	public function getAll() {
		$data = $this->db->select("*")
			->from("message")
			->fetch();

		return $data ?? [];
	}
}

?>