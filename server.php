<?php
function print_http_request_message()
{
	/**
	 * @var Resource
	 */
	$stderr = fopen("php://stderr", "w");

	if ($stderr) {
		// code d'erreur.
		$code = http_response_code();

		if ($code >= 200 && $code <= 299) {
			$c = "2";
		} else if ($code >= 400 && $code <= 599) {
			$c = "1";
		} else {
			$c = "3";
		}

		// ecrire du log.
		fwrite($stderr, sprintf("\033[0;34mAT\033[00m: [%s] - \033[0;34mSTAT\033[00m: %s - \033[0;34mMETHOD\033[00m: \033[0;3{$c}m%s\033[00m - \033[0;34mPATH\033[00m: %s\n", date("Y-m-d H:i:s", $_SERVER["REQUEST_TIME"]), $code, $_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]));
	}

	// fermeture de la resource.
	fclose($stderr);
}

// Changement du non du serveur.
header("Server: Bow Server (" . PHP_OS . ")");

$uri = urldecode(
	parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)
);

if ($uri !== "/" && file_exists(__DIR__."/public".$uri)) {
	print_http_request_message();
	return false;
}

require_once __DIR__."/public/index.php";
print_http_request_message();
