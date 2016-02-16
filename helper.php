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

			if (method_exists(Database::class, $method)) {
				return Database::$method($sql, $data);
			}

			return null;
		}
	}

	if (!function_exists("last_insert_id")) {
		/**
		 * Retourne le dernier ID suite a une requete INSERT sur un table dont ID est
		 * auto_increment.
		 */
		function last_insert_id() {
			return Database::lastInsertId();
		}
	}

	if (!function_exists("query_response")) {
		function query_response($method, $param) {
			global $response;

			if (method_exists($response, $method)) {
				return call_user_func_array([$response, $method], array_slice(func_get_args(), 1));
			}

			return null;
		}
	}

	if (!function_exists("get_last_db_error")) {
		/**
		 * Retourne les informations de la dernière requete
		 * @return array
		 */
		function get_last_db_error() {
			return Database::getLastErreur();
		}
	}

	if (!function_exists("select")) {
		/**
		 * statement lance des requete SQL de type SELECT
		 * @param string $sql
		 * @param array $data
		 * @return integer
		 */
		function select($sql, array $data = []) {
			return query_maker($sql, $data, "select");
		}
	}

	if (!function_exists("insert")) {
		/**
		 * statement lance des requete SQL de type INSERT
		 * @param string $sql
		 * @param array $data
		 * @return integer
		 */
		function insert($sql, array $data = []) {
			return query_maker($sql, $data, "insert");
		}
	}

	if (!function_exists("delete")) {
		/**
		 * statement lance des requete SQL de type DELETE
		 * @param string $sql
		 * @param array $data
		 * @return integer
		 */
		function delete($sql, array $data = []) {
			return query_maker($sql, $data, "delete");
		}
	}

	if (!function_exists("update")) {
		/**
		 * update lance des requete SQL de type UPDATE
		 * @param string $sql
		 * @param array $data
		 * @return integer
		 */
		function update($sql, array $data = []) {
			return query_maker($sql, $data, "update");
		}
	}

	if (!function_exists("statement")) {
		/**
		 * statement lance des requete SQL de type CREATE TABLE|ALTER TABLE|RENAME|DROP TABLE
		 * @param string $sql
		 * @param array $data
		 * @return integer
		 */
		function statement($sql, array $data = []) {
			return query_maker($sql, $data, "statement");
		}
	}

	if (!function_exists("kill")) {
		/**
		 * kill c'est une alias de die, sauf le fait qu'il peut logger
		 * le message que vous lui donnée.
		 * @param string $message
		 * @param boolean $log=false
		 */
		function kill($message = null, $log = false) {
			if ($log === true) {
				log($message);
			}
			die($message);
		}
	}

	if (!function_exists("slugify")) {
		/**
		 * slugify, transforme un chaine de caractere en slug
		 * eg. la chaine "58 comprendre bow framework" -> "58-comprendre-bow-framework"
		 * @param string $str
		 * @return string
		 */
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
		function json($data, $code = 200) {
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
		/**
		 * modifie les entêtes HTTP
		 * @param string $key le nom de l'entête http
		 * @param string $value la valeur à assigner
		 */
		function setheader($key, $value) {
			query_response("setHeader", $key, $value);
		}
	}

	if (!function_exists("sendfile")) {
		/**
		 * sendfile c'est un alias de require, mais vas chargé les fichiers contenu dans
		 * la vie de l'application. Ici <code>sendfile</code> résoue le problème de scope.
		 * @param string $filename le nom du fichier
		 * @param array $bind les donnees la exporter
		 */
		function sendfile($filename, $bind = []) {
			query_response("sendFile", $filename, $bind);
		}
	}

	if (!function_exists("send")) {
		function send($data) {
			query_response("send", $data);
		}
	}

	if (!function_exists("c_sql")) {
		/**
		 * Execute des requetes sql customisé
		 * @return array
		 */
		function c_sql(array $option) {
			return Database::query($option);
		}
	}

	if (!function_exists("switch_to")) {
		/**
		 * switch to, permet de changer de base de donnée.
		 * @param string $name nom de l'entré
		 * @param callable $cb fonction de callback
		 */
		function switch_to($name, $cb = null) {
			Database::switchTo($name, $cb);
		}
	}

	if (!function_exists("curl")) {
		/**
		 * curl lance un requete vers une autre source de resource
		 * @param string $url
		 */
		function curl($url) {
			$ch = curl_init($url);
			if (! curl_setopt($ch, CURLOPT_RETURNTRANSFER, true)) {
				curl_close($ch);
				return null;
			}
			$data = curl_exec($ch);
			curl_close($ch);
			return json_encode($data);
		}
	}

	if (!function_exists("url")) {
		/**
		 * url retourne l'url courant
		 * @return string $url
		 */
		function url() {
			global $requeste;
			return $requeste->url();
		}
	}
}
