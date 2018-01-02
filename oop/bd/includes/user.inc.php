<?php

class User extends Dbh {	

	protected function getAllUsers() {
		$sql = "SELECT * FROM users";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0) {
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}

	protected function getFirstUsers() {
		$sql = "SELECT * FROM users WHERE id = 1";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0) {
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}

	protected function getLastUsers() {
		$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0) {
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
	}

}

?>