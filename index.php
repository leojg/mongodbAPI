<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
function autoload($class, $dir = null) {
	if (is_null($dir)) {	
		$dir = __DIR__."/";
	}
	foreach (scandir($dir) as $file) {
		// directory?
		if (is_dir($dir.$file) && substr($file, 0, 1) !== '.') {
			autoload($class, $dir.$file.'/');
		}
		// php file?
		if (substr($file, 0, 2) !== '._' && preg_match("/.php$/i", $file)) {
			// filename matches class?
			if (str_replace('.php', '', $file) == $class || str_replace('.class.php', '', $file) == $class) {
				include $dir . $file;
			}
		}
	}
}
spl_autoload_register('autoload');


$router = new AltoRouter();
$router->setBasePath("/mongoapi");
$router->map('GET', '/login', function() {
	$data = json_decode(file_get_contents('php://input'));
	$loginResource = new LoginResource(new LoginService(new LoginUseCase(new UserDAO)));
	$result = $loginResource->login($data->username, $data->password);
	if (is_null($result)) {
		header($_SERVER["SERVER_PROTOCOL"].' 401 Unauthorized');
		return;	
	} else {
		echo $result;
	}
}, "login");

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
	call_user_func_array($match["target"], $match["params"]);
} else {
	header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');
}

?>