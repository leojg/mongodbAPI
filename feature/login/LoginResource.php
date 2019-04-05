<?

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

function login($username, $password) {
	return json_encode(array("hola"=>"hola"))
}

?>