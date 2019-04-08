<?php

class LoginUseCase extends UseCase {
	
	private $userDao;

	function __construct($userDao) {
		$this->userDao = $userDao;
	}

	function run($userLogin) {
		return $this->userDao->findOne($userLogin);
	}

}

?>