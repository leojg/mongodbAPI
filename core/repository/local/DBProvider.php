<?php

/**
TODO: Pass auth arguments
*/

use MongoDB\Client as Mongo;

class DBProvider {

	private static $INSTANCE;

	public static function getInstance() {
		if (is_null(DBProvider::$INSTANCE)) {
			$INSTANCE = new Mongo("mongodb://localhost:27017");
		}
		return $INSTANCE;
	}

}

?>