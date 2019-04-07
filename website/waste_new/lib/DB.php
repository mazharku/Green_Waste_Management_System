<?php

class DB {

	private static $instance = null;
	private $db;

	private function __construct() {
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_error()) {
			die("Failed to establish connection with database.");
		}
	}

	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new DB();
		}
		return self::$instance;
	}

	public function multiple_query($sql) {
		return $this->db->multi_query($sql);
	}

	public function select($sql) {
		$result = $this->db->query($sql);

		if ($this->db->affected_rows > 0) {
			//echo $this->db->affected_rows;
			return $result;
		}
		return false;
	}

	public function insert($sql) {
		$result = $this->db->query($sql);

		if ($this->db->affected_rows <= 0) {
			return false;
		}
		return $result;
	}

	public function update($sql) {
		$result = $this->db->query($sql);

		if ($this->db->affected_rows <= 0) {
			return false;
		}
		return $result;
	}

	public function delete($sql) {
		$result = $this->db->query($sql);

		if ($this->db->affected_rows <= 0) {
			return false;
		}
		return $result;
	}
}