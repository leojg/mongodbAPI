<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
require 'vendor/autoload.php';

$cli = new MongoDB\Client("mongodb://localhost:27017");

$col = $cli->dbTest->letest;

$c = $col->find();

foreach ($c as $d) {
	echo $d["test"];
}
*/


include_once 'core/api/Request.php';
include_once 'core/api/Router.php';

$r = new Router(new Request);
$r->get("/mongoapi", function() {
	echo "get";
});
$r->put("/mongoapi", function() {
	echo "put";
});

?>