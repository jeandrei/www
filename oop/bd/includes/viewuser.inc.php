<?php

//VIEW SHOW INFORMATION TO USER

class ViewUser extends User {	

	public function showAllUsers() {
		$datas = $this->getAllUsers();
		foreach ($datas as $data) {
			echo $data['uid']."</br>";
			echo $data['pwd']."</br>";
		}
	}

	public function showFirstUser() {
		$datas = $this->getFirstUsers();
		foreach ($datas as $data) {
			echo "O primeiro registro do banco é:</br>" . $data['uid']."</br>";
			echo $data['pwd']."</br>";
		}
	}

	public function showLastUser() {
		$datas = $this->getLastUsers();
		foreach ($datas as $data) {
			echo "O último registro do banco é:</br>" . $data['uid']."</br>";
			echo $data['pwd']."</br>";
		}
	}

}

?>