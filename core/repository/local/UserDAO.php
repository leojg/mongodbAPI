<?php

class UserDAO implements BaseDAO {
	
	private $client;

	function __construct() {
		$this->client = DBProvider::getInstance();
	}


	public function findOne($userLogin) {
		return $this->client->dbTest->users->findOne(array("username"=>$userLogin->username));
	}

	public function find($userLogin) {

	}

	public function save($input) {

	}

	public function update($input) {

	}

	public function delete($input) {

	}

}

?>