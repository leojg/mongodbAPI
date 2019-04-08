<?php

class LoginService {

	private $loginUseCase;

	function __construct($loginUseCase) {
		$this->loginUseCase = $loginUseCase;
	}

	function validateAndGenerateToken($userLogin) {
		$result = $this->loginUseCase->execute($userLogin);
		if (!is_null($result) && password_verify($userLogin->password, $result->password)) {
			return bin2hex(openssl_random_pseudo_bytes(16));
		}
		return null;
	}

}

?>