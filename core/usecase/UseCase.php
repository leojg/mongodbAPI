<?php

abstract class UseCase {

	abstract function run($input);

	function execute($input) {
		return $this->run($input);
	}

}


?>	