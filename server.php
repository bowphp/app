<?php

$uri = urldecode(
	parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)
);

if ($uri !== "/" && file_exists(__DIR__."/public".$uri)) {
	return false;
}

require_once __DIR__."/public/index.php";
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
    $information = sprintf("\033[0;34mAT\033[00m: [%s] - \033[0;34mSTAT\033[00m: %s - \033[0;34mMETHOD\033[00m: \033[0;3{$c}m%s\033[00m - \033[0;34mPATH\033[00m: %s\n", date("Y-m-d H:i:s", $_SERVER["REQUEST_TIME"]), $code, $_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
    fwrite($stderr, $information);
}
// fermeture de la resource.
fclose($stderr);
