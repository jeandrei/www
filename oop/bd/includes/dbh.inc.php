<?php
//MODEL DEAL WITH ALL CONNECTIONS TO THE DATABASE
class Dbh {

	private $servername;
	private $usernama;
	private $password;
	private $dbname;

	protected function connect() {
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "rootadm";
		$this->dbname = "ooptutorial";

		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		return $conn;
	}

}

?>