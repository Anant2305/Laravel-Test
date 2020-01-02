<?php

class User extends Db_object {

	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
	public $id;
	public $username;
	public $first_name;
	public $last_name;
	public $password;


	public static function verify_user($username, $password) {
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * from " . self::$db_table ." where ";
		$sql .= "username = '{$username}' ";
		$sql .= "and password = '{$password}' ";
		$sql .= "LIMIT 1";

		$the_result_array = self::find_this_query($sql);

		return !empty($the_result_array) ? array_shift($the_result_array) : false;

	}

	protected function propertise() {

		$propertise = array();

		foreach(self::$db_table_fields as $db_field){

			if(property_exists($this, $db_field)){

				$propertise[$db_field] = $this ->$db_field;

			}

		}

		return $propertise;
	}


	protected function clean_propertise() {
		global $database;

		$clean_propertise = array();

		foreach($this->propertise() as $key => $value){

			$clean_propertise[$key] = $database->escape_string($value);

		}

		return $clean_propertise;
	}



	public function save() {

		return isset($this->id) ? $this->update() : $this->create();

	}



	public function create() {
		global $database;

		$propertise = $this->clean_propertise();

		$sql = "INSERT INTO " . self::$db_table . " (" . implode(",", array_keys($propertise)) .") ";
		$sql .= "VALUES ('" . implode("','", array_values($propertise)) . "')";


		if($database->query($sql)){
			$this->id = $database->the_insert_id();
			return true;
		}else{
			return false;
		}

	}// end Create Method

	public function update() {
		global $database;

		$propertise = $this->clean_propertise();

		$propertise_pairs = array();

		foreach ($propertise as $key => $value){
			$propertise_pairs[] = "{$key}='{$value}'";
		}

		$sql = "UPDATE " . self::$db_table ." SET ";
		$sql .= implode(", ", $propertise_pairs);
		$sql .= " Where id= " . $database->escape_string($this->id);

		$database->query($sql);
		return (mysqli_affected_rows($database->connection) == 1) ? true : false;

	}// END Update Method


	public function delete() {
		global $database;

		$sql = "DELETE FROM " . self::$db_table . " ";
		$sql .= "WHERE id=" . $database->escape_string($this->id);
		$sql .= " LIMIT 1";

		$database->query($sql);
		return (mysqli_affected_rows($database->connection) == 1)? true : false;

	}

}
?>
