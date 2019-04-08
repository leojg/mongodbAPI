<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

class LoginResource {

	private $loginService;

	function __construct($loginService) {
		$this->loginService = $loginService;
	}

	public function login($username, $password) {
		$token = $this->loginService->validateAndGenerateToken(new UserLogin($username, $password));
		if (is_null($token)) {
			return null;
		} else {
			return json_encode(array("token"=>$token));
		}
	}

}


?>