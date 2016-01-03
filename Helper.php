<?php


use Snoop\Database\DB;
use Snoop\Support\Util;
use Snoop\Support\Logger;
use Snoop\Support\Resource;
use Snoop\Support\Security;


if (file_exists("vendor/snoop/snoopframework/src/ApplicationAutoload.php")):

require "vendor/snoop/snoopframework/src/ApplicationAutoload.php";
\Snoop\ApplicationAutoload::register();

define("SELECT", DB::SELECT);
define("INSERT", DB::INSERT);
define("UPDATE", DB::UPDATE);
define("DELETE", DB::DELETE);

$app = \Snoop\Core\Application::loader(require "configuration/init.php");

global $response;
global $request;

$response = \Snoop\Http\Response::load($app);
$request = \Snoop\Http\Request::load($app);

DB::loadConfiguration(require "configuration/db.php");
Resource::configure(require "configuration/resource.php");


if (!function_exists("db")) {
	function db() {
		return DB::class;
	}
}

if (!function_exists("view")) {
	function view($template, $data = []) {
		global $response;
		$response->view($template, $data);
	}
}

if (!function_exists("table")) {
	function table($tableName) {
		return DB::table($tableName);
	}
}

if (!function_exists("query_maker")) {
	function query_maker($sql, $data, $method) {

		$db = db();

		if (method_exists($db, $method)) {
			return $db::$method($sql, $data);
		}

		return null;
	}
}

if (!function_exists("last_insert_id")) {
	function last_insert_id() {

		$db = db();

		return $db::lastInsertId();
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

if (!function_exists("show_last_db_error")) {
	function show_last_db_error() {
		return DB::getLastErreur();
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
			log($message, $log=0);
		}
		statuscode($code);
		die($message);
	}
}

if (!function_exists("body")) {
	function body() {
        global $request;
        return $request->body();
	}
}

if (!function_exists("files")) {
	function files() {
        global $request;
        return $request->files();
	}
}

if (!function_exists("query")) {
	function query() {
        global $request;
        return $request->query();
	}
}

if (!function_exists("log")) {
	function log($message, $type) {
		Logger::run([/** chargement de la config */]);
		switch ($type) {
			case 1:
			case "err":
				Logger::error($message);
				break;
			case 2:
			case "warn":
				Logger::warning($message);
				break;
			case 3:
			case "info":
				Logger::info($message);
				break;
			default:
				Logger::log($message);
				break;
		}
	}
}

if (!function_exists("error")) {
	function error($message) {
		 log($message, $err=1);
	}
}

if (!function_exists("warn")) {
	function warn($message) {
		 log($message, $warn=2);
	}
}

if (!function_exists("info")) {
	function info($message) {
		 log($message, $info=3);
	}
}

if (!function_exists("debug")) {
	function debug() {
		Util::debug(func_get_args());
	}
}

if (!function_exists("c_csrf")) {
	function c_csrf() {
		return Security::generateTokenCsrf();
	}
}

if (!function_exists("store")) {
	function store(array $file, $filename = null, $dirname = null) {
		if (!is_null($filename) && is_string($filename)) {
			\Snoop\Support\Resource::setUploadFileName($filename);
		}
		if (!is_null($dirname)) {
			\Snoop\Support\Resource::setUploadDir($dirname);
		}
		\Snoop\Support\Resource::store($file);
	}
}

if (!function_exists("json")) {
	function json($data, $code = 200) {
		query_response("json", $data, $code);
	}
}

if (!function_exists("statuscode")) {
	function statuscode($code) {
		query_response("setCode", (int) $code);
	}
}

if (!function_exists("sanitaze")) {
	function sanitaze($data) {
		if (is_int($data) || is_string($data)) {
			return $data;
		} else {
			return Security::sanitaze($data);
		}
	}
}

if (!function_exists("secure")) {
	function secure($data) {
		if (is_int($data) || is_string($data)) {
			return $data;
		} else {
			return Security::sanitaze($data, true);
		}
	}
}

if (!function_exists("response")) {
	function response($template = null, $data = null, $code = 200) {
		if (is_null($template)) {
			global $response;
			return $response;
		}
		statuscode($code);
		return query_response("render", $template, $data);
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
	function my_query($option) {
		return DB::query($option);
	}
}

if (!function_exists("switch_to")) {
	function switch_to($name, $cb = null) {
		DB::switchTo($name, $cb);
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

endif;