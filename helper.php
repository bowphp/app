<?php

/*------------------------------------------------
| 
|	HELPER
|	======
|	Définir des liens symbolique de l'ensemble des
|	fonctions de Bow.
|
*/

use Bow\Support\Util;
use Bow\Support\Logger;
use Bow\Support\Security;
use Bow\Support\Resource;
use Bow\Database\Database;
use Bow\Core\AppConfiguration;

if (file_exists(__DIR__ . "/vendor/bow/framework/src/BowAutoload.php")) {

	require_once __DIR__ . "/vendor/bow/framework/src/BowAutoload.php";
	\Bow\BowAutoload::register();

	define("SELECT", Database::SELECT);
	define("INSERT", Database::INSERT);
	define("UPDATE", Database::UPDATE);
	define("DELETE", Database::DELETE);

	global $response;
	global $request;

	AppConfiguration::configure(require "config/application.php");
	$response = \Bow\Http\Response::configure(AppConfiguration::takeInstance());
	$request  = \Bow\Http\Request::configure();

	Database::configure(require "config/database.php");
	Resource::configure(require "config/resource.php");

	if (!function_exists("configuration")) {
		/**
		 * Application configuration
		 * @return AppConfiguration
		 */
		function configuration() {
			return AppConfiguration::takeInstance();
		}
	}

	if (!function_exists("db")) {
		/**
		 * @return Database, the Database reference
		 */
		function db() {
			return Database::class;
		}
	}

	if (!function_exists("view")) {
		/**
		 * view
		 * @param string $template
		 * @param array $data
		 * @return interger $code=200
		 */
		function view($template, $data = [], $code = 200) {
			global $response;
			$response->view($template, $data, $code);
		}
	}

	if (!function_exists("table")) {
		/**
		 * @param string $tableName, le nom d'un table.
		 * @return mixed
		 */
		function table($tableName) {
			return Database::table($tableName);
		}
	}

	if (!function_exists("query_maker")) {
		function query_maker($sql, $data, $method) {
			$db = db();

			if (method_exists($db, $method)) {
				return Database::$method($sql, $data);
			}

			return null;
		}
	}

	if (!function_exists("last_insert_id")) {
		function last_insert_id() {
			$db = db();

			return $Database::lastInsertId();
		}
	}

	if (!function_exists("query_response")) {
		function query_response($method, $param) {
			global $response;
			$param = array_slice(func_get_args(), 1);

			if (method_exists($response, $method)) {
				return call_user_func_array([$response, $method], $param);
			}

			return null;
		}
	}

	if (!function_exists("get_last_db_error")) {
		function get_last_db_error() {
			return Database::getLastErreur();
		}
	}

	if (!function_exists("select")) {
		function select($sql, array $data = []) {
			return query_maker($sql, $data, "select");
		}
	}

	if (!function_exists("insert")) {
		function insert($sql, array $data = []) {
			return query_maker($sql, $data, "insert");
		}
	}

	if (!function_exists("delete")) {
		function delete($sql, array $data = []) {
			return query_maker($sql, $data, "delete");
		}
	}

	if (!function_exists("update")) {
		function update($sql, array $data = []) {
			return query_maker($sql, $data, "update");
		}
	}

	if (!function_exists("statement")) {
		function statement($sql, array $data = []) {
			return query_maker($sql, $data, "statement");
		}
	}

	if (!function_exists("kill")) {
		function kill($message = null, $log = false, $code = 200) {
			if ($log === true) {
				log($message);
			}
			statuscode($code);
			die($message);
		}
	}

	if (!function_exists("slugify")) {
		function slugify($str) {
			return Util::slugify($str);
		}
	}

	if (!function_exists("body")) {
		/**
		 * body, fonction de type collection
		 * manipule la varible global $_POST
		 */
		function body() {
	        global $request;
	        return $request->body();
		}
	}

	if (!function_exists("files")) {
		/**
		 * files, fonction de type collection
		 * manipule la varible global $_FILES
		 */
		function files() {
	        global $request;
	        return $request->files();
		}
	}

	if (!function_exists("query")) {
		/**
		 * query, fonction de type collection
		 * manipule la varible global $_GET
		 */
		function query() {
	        global $request;
	        return $request->query();
		}
	}

	if (!function_exists("debug")) {
		/**
		 * debug, fonction de debug de varible
		 * Elle vous permet d'avoir un coloration
		 * synthaxique des types de donnée.
		 */
		function debug() {
			call_user_func_array([Util::class, "debug"], func_get_args());
		}
	}

	if (!function_exists("csrf")) {
		/**
		 * csrf, fonction permetant de générer un token
		 */
		function csrf() {
			return Security::generateTokenCsrf();
		}
	}

	if (!function_exists("store")) {
		/**
		 * store, effecture l'upload d'un fichier vers un repertoire
		 * @param array $file, le fichier a uploadé.
		 * @param string|null $filename nom du fichier
		 * @param string|null $dirname nom du dossier de destination.
		 * @return StdClass
		 */
		function store(array $file, $filename = null, $dirname = null) {
			if (!is_null($filename) && is_string($filename)) {
				Resource::setUploadFileName($filename);
			}
			if (!is_null($dirname)) {
				Resource::setUploadDir($dirname);
			}
			return Resource::store($file);
		}
	}

	if (!function_exists("json")) {
		/**
		 * json, permet de lance des reponses server de type json
		 * @param array $data
		 * @param integer $code=200 
		 */
		function json(array $data, $code = 200) {
			return query_response("json", $data, $code);
		}
	}

	if (!function_exists("statuscode")) {
		/**
		 * statuscode, permet de changer le code de la reponse du server
		 * @param integer $code=200 
		 */
		function statuscode($code) {
			return query_response("setCode", (int) $code);
		}
	}

	if (!function_exists("sanitaze")) {
		/**
		 * sanitaze, épure un variable d'information indésiration
		 * eg. sanitaze("j\'ai") => j'ai
		 * @param mixed $data
		 * @return mixed
		 */
		function sanitaze($data) {
			if (is_int($data) || is_string($data)) {
				return $data;
			} else {
				return Security::sanitaze($data);
			}
		}
	}

	if (!function_exists("secure")) {
		/**
		 * secure, échape les anti-slashes, les balises html
		 * eg. secure("j'ai") => j\'ai
		 * @param mixed $data
		 * @return mixed
		 */
		function secure($data) {
			if (is_int($data) || is_string($data)) {
				return $data;
			} else {
				return Security::sanitaze($data, true);
			}
		}
	}

	if (!function_exists("response")) {
		/**
		 * response, manipule une instance de Response::class 
		 * @param string $template, le message a envoyer
		 * @param integer $code, le code d'erreur
		 * @param string $type, le type mime du contenu
		 * @return Response
		 */
		function response($template = null, $code = 200, $type = "text/html") {
			global $response;
			
			if (is_null($template)) {
				return $response;
			}
			
			setHeader("Content-Type", $type);
			statuscode($code);
			query_response("send", $template);

			return $response;
		}
	}

	if (!function_exists("setheader")) {
		function setheader($key, $value) {
			query_response("setHeader", $key, $value);
		}
	}

	if (!function_exists("send")) {
		function send($data) {
			query_response("send", $data);
		}
	}

	if (!function_exists("my_query")) {
		function my_query(array $option) {
			return Database::query($option);
		}
	}

	if (!function_exists("switch_to")) {
		function switch_to($name, $cb = null) {
			Database::switchTo($name, $cb);
		}
	}

	if (!function_exists("curljson")) {
		function curljson($url, $code = 200) {
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close($ch);
			$data = json_decode($data);
			json($data, $code);
		}
	}
}
