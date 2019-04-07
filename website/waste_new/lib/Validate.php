<?php

class Validate {
	
	private $db = null;
	private $errors = array();

	public function __construct() {
		$this->db = DB::getInstance();
	}

	public function validation($params = array()) {
		foreach ($params as $param_name => $param_value) {
			if (empty($param_value)) {
				$this->errors[] = $param_name . " can not be empty";
			} else if (strlen($param_value) < 4) {
				$this->errors[] = $param_name . ' can not be less than four character';
			} else if (preg_match("/^[0-9]+$/", $param_value) != 1) {
				$this->errors[] = $param_name . ' must be numeric character';
			} else if ($this->db->select("SELECT * FROM addbin WHERE dustbinid=$param_value")) {
				$this->errors[] = $param_name . ' already exists';
			} else {}
		}
		return empty($this->get_errors()) ? true : false;
	}

	public function get_errors() {
		return $this->errors;
	}
}
