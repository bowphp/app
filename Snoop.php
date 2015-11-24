<?php

/**
 * @author diagnostic sarl, <info@diagnostic-ci.com>
 * create and maintener by diagnostic developpers teams:
 * - Etchien Boa
 * - Dakia Franck
 * - Zokora Elvis
 * @+- 10/06/2015 fast web app building
 * @package Snoope
*/

namespace System;

class Snoop
{
	/**
	 * Liste des consta
	 * @var unknown
	 */
	const SELECT = 1;
	const UPDATE = 2;
	const DELETE = 3;
	const INSERT = 4;

	/**
	 * Liste de constante d'erreur
	 * @var unknown
	 */
	const ERROR = 5;
	const SUCCESS = 7;
	const WARNING = 6;

	private static $uploadDir = "/public";
	private static $fileSize = 20000000;
	private static $uploadFileName = null;
	private static $routes = [];
	private $with = [];
	private $branch = "";

	private $withSocket = false;
	private static $db = null;

	private $sanitaze = [];
	private $views = null;
	private $root = "";
	private $public = "";
	private $currentRoot = "";
	private $fileExtension = ["png", "jpg"];

	private static $inst = null;
	private static $mail = null;

	/**
	 * Configuration de date en francais.
	 */
	private static $angMounth = [
		"Jan"  => "Jan", "Fév"  => "Feb",
		"Mars" => "Mar", "Avr"  => "Apr",
		"Mai"  => "Mai", "Juin" => "Jun",
		"Juil" => "Jul", "Août" => "Aug",
		"Sept" => "Sep", "Oct"  => "Oct",
		"Nov"  => "Nov", "Déc"  => "Dec"
	];
	private static $month = [
		"Jan"  => "Janvier", "Fév"  => "Fevrier",
		"Mars" => "Mars", "Avr"  => "Avril",
		"Mai"  => "Mai", "Juin" => "Juin",
		"Juil" => "Juillet", "Août" => "Août",
		"Sept" => "Septembre", "Oct" => "Octobre",
		"Nov"  => "Novembre", "Déc" => "Décembre"
	];

	/**
	 * Private construction
	 */
	private function __construct()
	{
		if (is_file(".config.json")) {
			$config = json_decode(file_get_contents(".config.json"));
			$this->setTimeZone($config->timeZone);
			$this->appName = $config->appName;
			$this->uploadDir = $config->uploadDir;
		}
		// NOTE: En reflection
		// self::$mail = Mail::load();
	}
	/**
	 * Private __clone
	 */
	private function __clone(){}

	/**
	 * Singleton system.
	 * @return self
	 */
	public static function loader()
	{	
		if (self::$inst === null) {
			self::$inst = new self;
		}
		return self::$inst;
	}

	/**
	 * Singleton system.
	 * @return Mail
	 */
	public static function mailer()
	{	
		if (self::$mail === null) {
			self::$mail = Mail::load();
		}
		return self::$mail;
	}

	/**
	 * mount, ajout un branchement.
	 */
	public function mount($branchName, $middelware = null)
	{
		if ($middelware !== null) {
			$r = call_user_func($middelware, $branchName);
		}
		$this->branch .= $branchName;
		return $this;
	}

	/**
	 * unmount, detruit le branchement en cour.
	 * @return Snoop
	 */
	public function unmount()
	{
		$this->branch = "";
		return $this;
	}

	/**
	 * get, route de type GET
	 *
	 * @param string $path
	 * @param callable $cb
	 * @return Snoop
	 */
	public function get($path, $cb)
	{
		$this->currentRoot = $this->branch . $path;
		return $this->routeLoader("GET", $this->currentRoot, $cb);
	}

	/**
	 * post, route de type POST
	 *
	 * @param string $path
	 * @param callable $cb
 	 * @return \System\Snoop
	 */
	public function post($path, $cb)
	{
		$this->currentRoot = $this->branch . $path;
		return $this->routeLoader("POST", $this->currentRoot, $cb);
	}

	/**
	 * routeLoader, lance le chargement d'une route.
	 * @param string $method
	 * @param string $path
	 * @param callable $cb
 	 * @return \System\Snoop
	 */
	private function routeLoader($method, $path, $cb)
	{
		self::$routes[$method][] = new Route($path, $cb, $this->with);
		$this->with = [];

		return $this;
	}

	/**
	 * Lance une personnalistaion de route.
	 * @param array $otherRule
	 * @return \System\Snoop
	 */
	public function with(array $otherRule)
	{
		$this->with = $otherRule;
		return $this;
	}

	/**
	 * Lanceur de l'application
	 */
	public function run()
	{

		header("X-Powered-by: Snoop-Framework");
		$error = true;
		if (isset(self::$routes[$_SERVER["REQUEST_METHOD"]])) {
			foreach (self::$routes[$_SERVER["REQUEST_METHOD"]] as $route) {
				if ($route->match($this->getUri($this->root))) {
					$route->call();
					$error = false;
				}
			}
		} else {
			$error = false;
		}

		if ($error) {
			$this->redirectTo404()->render("404.php");
		}

	}

	/**
	 * retourne uri revoyer par GET.
	 * @param string $path=""
	 * @return string
	 */
	public function getUri($path = "")
	{
		if ($pos = strpos($_SERVER["REQUEST_URI"], "?")) {
			$uri = substr($_SERVER["REQUEST_URI"], 0, $pos);
		} else {
			$uri = $_SERVER["REQUEST_URI"];
		}
		return str_replace($path, "", $uri);
	}

	/**
	 * middelware launcher
	 * @param callable $middelware.
	 * @param callable $cb=null
	 * @param mixed $me=null
	 * @return mixed $r
	 */
	public function middelware($middelware, $cb = null, $me = null)
	{
		$middelware = str_replace(".", DIRECTORY_SEPARATOR , $middelware);
		$r = require $middelware . ".php" ;
		if ($cb !== null) {
			return call_user_func($cb, isset($r) ? $r : false);
		}
		return $r;
	}

	/**
	 * Kill process
	 * @param string $message=""
	 */
	public function kill($message = "")
	{
		// Arret du processus.
		if (!is_string($message)) {
			$message = null;
		}
		die($message);
	}

	/**
	 * Session starteur.
	 */
	public static function startSession()
	{
		if (PHP_SESSION_ACTIVE != session_status()) {
			session_start();
		}
	}

	/**
	 * isSessionKey, verifie l'existance d'un
	 * cle dans le table de session
	 * @param string $key
	 * @return boolean
	 */
	public function isSessionKey($key) {
		return isset($this->session()[$key]) && !empty($this->session()[$key]);
	}

	/**
     * filessessionIsEmpty
     *	@return boolean
     */
    public function sessionIsEmpty()
    {
    	return empty($_SESSION);
    }

	/**
	 * session, permet de manipuler le donnee
	 * de session.
	 * permet de recuperer d'une valeur ou
	 * la collection de valeur.
	 * @param string $key=null
	 * @return mixed
	 */
	public function session($key = null) {
		$this->startSession();
		if (is_string($key)) {
			return $this->isSessionKey($key) ? $_SESSION[$key] : false;
		}
		return $_SESSION;
	}

	/**
	 * addSession, permet d'ajout une value
	 * dans le tableau de session.
	 * @param string|int $key
	 * @param mixed $data
	 * @throws \InvalidArgumentException
	 */
	public function addSession($key, $data, $next = null) {
		
		$this->startSession();

		if (!is_string($key)) {
			throw new InvalidArgumentException("La clé doit être un chaine.", E_ERROR);
		}

		if ($next === true) {
			if ($this->isSessionKey($key)) {
				array_push($_SESSION[$key], $data);
			} else {
				$_SESSION[$key] = $data;
			}
		} else {
			$_SESSION[$key] = $data;
		}
	}

	/**
	 * removeSession, supprime un entree dans la
	 * table de session.
	 * @param string $key
	 */
	public function removeSession($key)
	{
		unset($_SESSION[$key]);
		return $this;
	}

	/**
	 * makeQuery, fonction permettant de générer des SQL Statement à la volé.
	 *
	 * @param array $options, ensemble d'information
	 * @param callable $cb = null
	 * @return string $query, la SQL Statement résultant
	 */
	private static function makeQuery($options, $cb = null)
	{
		/** NOTE:
		 *	 | - where
		 *	 | - order
		 *	 | - limit | take.
		 *	 | - grby
		 *	 | - join
		 *
		 *	 Si vous spécifiez un join veillez définir des alias
		 *	 $options = [
		 *	 	"type" => SELECT,
		 * 		"table" => "table",
		 *	 	"join" => [
		 * 			"otherTable" => "otherTable",
		 *	 		"on" => [
		 *	 			"T.id",
		 *	 			"O.parentId"
		 *	 		]
		 *	 	],
		 *	 	"where" => "R.r_num = " . $currentRegister,
		 *	 	"order" => ["column", true],
		 *	 	"limit" => "1, 5",
		 *	 	"grby" => "column"
		 *	 ];
		 */
		switch ($options['type']) {
			/**
			 * Niveau équivalant à un quelconque SQL Statement de type:
			 *  _________________
			 * | SELECT ? FROM ? |
			 *  -----------------
			 */
			case self::SELECT:
				/**
				 * Initialisation de variable à usage simple
				 */
				$join  = '';
				$where = '';
				$order = '';
				$limit = '';
				$grby  = '';

				if (isset($options["join"])) {
					$join = " INNER JOIN " . $options['join']["otherTable"] . " ON " . implode(" = ", $options['join']['on']);
				}
				/*
				 * Vérification de l'existance d'un clause:
				 * _______
				 *| WHERE |
				 * -------
				 */
				if (isset($options['where'])) {
					$where = " WHERE " . $options['where'];
				}
				/*
				 *Vérification de l'existance d'un clause:
				 * __________
				 *| ORDER BY |
				 * ----------
				 */
				if (isset($options['order'])) {
					// Un ternaire de vérification.
					$order = " ORDER BY " . $options['order'][0] . ($options['order'][1] === true ? " ASC" : " DESC");
				}
				/*
				 * Vérification de l'existance d'un clause:
				 * _______
				 *| LIMIT |
				 * -------
				 */
				if (isset($options['limit'])) {
					$limit = " LIMIT " . $options['limit'];
				}
				/**
				 * Vérification de l'existance d'un clause:
				 * ----------
				 *| GROUP BY |
				 * ----------
				 */
				if (isset($options->grby)) {
					$grby = " GROUP BY " . $options['grby'];
				}
				if (isset($options["data"])) {
					if (is_array($options["data"])) {
						$data = implode(", ", $options['data']);
					} else {
						$data = $options['data'];
					}
				} else {
					$data = "*";
				}
				/**
				 * Edition de la SQL Statement facultatif.
				 * construction de la SQL Statement finale.
				 */
				$query = "SELECT " .$data . " FROM " . $options['table'] . $join . $where . $order . $limit . $grby;
				break;
				/**
				 * Niveau équivalant à un quelconque
			 	 * SQL Statement de type:
				 * _____________
			 	 *| INSERT INTO |
			 	 * -------------
			 	 */
			case self::INSERT:
				/**
				 * Sécurisation de donnée.
				 */
				$field = self::rangeField($options['data']);
				/**
				 * Edition de la SQL Statement facultatif.
				 */
				$query = "INSERT INTO " . $options['table'] . " SET " . $field;
				break;
				/**
				 * Niveau équivalant à un quelconque
				 * SQL Statement de type:
				 * ________
				 *| UPDATE |
				 * --------
				 */
			case self::UPDATE:
				/**
				 * Sécurisation de donnée.
				 */
				$field = rangeField($options['data']);
				/**
				 * Edition de la SQL Statement facultatif.
				 */
				$query = "UPDATE " . $options['table'] . " SET " . $field . " WHERE " . $options['where'];
				break;
				/**
				 * Niveau équivalant à un quelconque
				 * SQL Statement de type:
				 * _____________
				 *| DELETE FROM |
				 * -------------
				 */
			case self::DELETE:
				/**
				 * Edition de la SQL Statement facultatif.
				 */
				$query = "DELETE FROM " . implode(", ", $options['table']) . " WHERE " . $options['where'];
				break;
		}
		/**
		 * Vérification de l'existance de la fonction de callback
		 */
		if ($cb !== null) {
			/** NOTE:
			 * Execution de la fonction de rappel,
			 * qui récupère une erreur ou la query
			 * pour évantuel vérification
			 */
			call_user_func($cb, isset($query) ? $query : E_ERROR);
		}
		return $query;
	}

	/**
	 * callbackLauncher, permet de lancer des callback.
	 *
	 * @param collable $cb
	 * @param array $option
	 * @throws \Exception
	 */
	private static function callbackLauncher($cb, $option)
	{
		if ($cb !== null) {
			call_user_func_array($cb, is_array($option) ? $option : [$option]);
		} else {
			if ($option !== null) {
				if (is_array($option)) {
					throw $option[0];
				} else {
					if (!is_bool($option)) {
						throw $option;
					}
				}
			}
		}
	}

	/**
	 * withSocket, initialise un connection
	 * avec le socket definie dans .env.php
	 * @return Snoop
	 */
	public function withSocket() {
		$this->withSocket = true;
		return $this;
	}
	/**
	 * connection, est un fonction permettant de créer et rétourner un objet PDO
	 *
	 * @param string $option, objet de connection rétourné par makeConnectionOject
	 * @param callable $cb [optional]
	 * @return PDO $db
	 */
	public function connection($option = null, $cb = null)
	{

		if (!is_file(dirname(__FILE__) . "/.env.php")) {
			self::callbackLauncher($cb, [new \Exception("Le fichier de configuration n'existe pas. Veuillez le configurer.", E_ERROR)]);
		}

		if (self::$db instanceof \PDO) {
			return null;
		}

		if ($option !== null) {
			if (is_string($option)) {
				$zone = $option;
			} else {
				$zone = "default";
				$cb = $option;
			}
		} else {
			$zone = "default";
		}

		/**
		 * Essaie de connection
		 */
		$t = require ".env.php";

		if ($t == 1) {
			self::callbackLauncher($cb, [new \ErrorException("Le fichier .env.php est mal configurer")]);
		}

		$c = isset($t[$zone]) ? $t[$zone] : null;

		if ($c === null) {
			self::callbackLauncher($cb, [new \ErrorException("La clé '$zone' n'est pas définir dans l'entre .env.php")]);
		}

		$db = null;

		try {
			/**
			 * Construction de l'objet PDO
			 */
			$dns = "";
			if ($this->withSocket === true) {
				$dns = $c["socket"] . ";dbname=". $c['dbname'];
			} else {
				$dns = $c["scheme"] . ":host=" . $c['host'] . ($c['port'] !== '' ? ":" . $c['port'] : "") . ";dbname=". $c['dbname'];
				if ($c["scheme"] == "pgsql") {
					$dns = str_replace(";", " ", $dns);
				}
			}
			self::$db = new \PDO($dns, $c['user'], $c['pass'], [
					\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
					\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
				]);
		} catch (\PDOException $e) {
			/**
			 * Lancement d'exception
			 */
			self::callbackLauncher($cb, [$e]);
		}

		/**
		 * Execution du callable après vérification
		 */
		$this->withSocket = false;
		self::callbackLauncher($cb, false);
	}

	/**
	 * bindValueAndExecuteQuery, fonction permettant d'executer des SQL Statement
	 *
	 * @param array $data
	 * @param PDOStatement $pdoStatement
	 * @param bool $retournData
	 * @return StdClass $resultat
	 */
	private static function bindValueAndExecuteQuery($data, $pdoStatement, $retournData = false)
	{
		foreach ($data as $key => $value) {
			if ($value === "NULL") continue;
			$param = \PDO::PARAM_INT;
			if (preg_match("/[a-zA-Z_-]+/", $value)) {
				/**
				 * SÉCURIATION DES DONNÉS
				 *- Injection SQL
				 *- XSS
				 */
				$param = \PDO::PARAM_STR;
				$value = addslashes($value);
				$value = trim($value);
				$value = htmlspecialchars($value);
			} else {
				/**
				 * On force la valeur en entier.
				 */
				$value = (int) $value;
			}
			/**
			 * Exécution de bindValue
			 */
			$pdoStatement->bindValue(":$key", $value, $param);
		}
		/**
		 * Récupération de l'etat de l'execution.
		 */
		$status = $pdoStatement->execute();
		/**
		 * Initilisation d'un object StdClass.
		 */
		$resultat = new \StdClass;
		/**
		 * On vérifie si la récupération de donnée est active.
	 	 */
		if ($retournData === true) {
			/**
		 	 * Récupération des données.
			 */
			if ($pdoStatement->rowCount() == 1) {
				$fetch = "fetch";
			} else {
				$fetch = "fetchAll";
			}
			$resultat->data = $pdoStatement->$fetch();
		}
		/**
		 * Récupération d'une erreur quelconque.
		 */
		$resultat->error = !$status;
		return $resultat;
	}

	/**
	 * rangeField, fonction permettant de securiser les données.
	 *
	 * @param array $data, les donnes à securiser
	 * @return array $field
	 */
	private static function rangeField($data)
	{
		$field = "";
		$i = 0;
		foreach ($data as $key => $value) {
			/**
			 * Construction d'une chaine de format:
			 * key1 = value1, key2 = value2[, keyN = valueN]
			 * Utile pour binder une réquette INSERT en mode preparer:
			 */
			$field .= ($i > 0 ? ", " : "") . $key . " = " . $value;
			$i++;
		}
		/**
		 * Retourne une chaine de caractere.
		 */
		return $field;
	}

	/**
	 * filter, fonction permettant de filtrer les données
	 *
	 * @param array $opts
	 * @param callable $cb
	 * @return array $r, collection de donnée élus après le tri.
	 */
	public function filtre($opts, $cb)
	{
		$r = [];
		foreach ($opts as $key => $value) {
			if (call_user_func_array($cb, [$value, $key])) {
				array_push($r, $value);
			}
		}
		// Retourne un tableau
		return $r;
	}

	/**
	 * getPdoError, fonction permettant d'obtenir des informations sur une erreur PDO
	 *
	 * @param PDO|PDOStatement $pdoStatement
	 */
	private static function getPdoError($pdoStatement)
	{
		$error = $pdoStatement->errorInfo();
		$errorCode = current($error);
		$errorMessage = end($error);
		echo '<div style="margin: auto; width: 500px; text-align: center; font-size: 16px; color: red; border: 5px solid tomato; bordor-radius: 5px; padding: 10px;">';
		echo $errorCode . " : " . $errorMessage;
		echo '</div>';
		self::kill();
	}

	/**
	 * buildSerialization, fonction permettant de construire des sérialisation
	 * @param string $file
	 * @param mixed $args
	 * @return string
	 */
	public function serialization($file, $args)
	{
		# Sérialisation d'un mixed dans un fichier concerner.
		return (bool) @file_put_contents($file, serialize($args));
	}

	/**
	 * UnBuildSerializationVariable, fonction permettant de récrier la variable sérialiser
	 *
	 * @param string $filePath
	 * @return mixed
	 */
	public function disSerializationVariable($filePath)
	{
		// Ouverture du fichier de sérialisation.
		$serializedData = @file_get_contents($filePath);
		if (is_string($serializedData)) {
			// On retourne l'element dé-sérialisé
			return unserialize($serializedData);
		}
		return $serializedData;
	}

	/**
	 * Stoper les attaques de types xss
	 *
	 * @param array $verifyData
	 * @param array $enableData
	 */
	public function attaqueStoper($verifyData, $enableData)
	{
		$errorList = '';
		$error = false;
		foreach ($verifyData as $key => $value) {
			if (!in_array($key, $enableData)) {
				$error = true;
				$errorList .= "<li><u><strong>" . $key . "</strong></u> not defined</li>";
			}
		}
		/**
		 * Vérification d'erreur
		 */
		if ($error) {
			echo '<div style="border-radius: 5px; border: 1px solid #eee; backgroud: tomato">';
			echo "<h1>Attaque stoped</h1>";
			echo "<ul style=\"color:red\">";
			echo $errorList;
			echo "</ul>";
			echo "</div>";
			// On arrete tout.
			$this->kill();
		}
	}

	/**
	 * disconnect, permet vider le cache session
	 */
	public static function sessionDisconnect()
	{
		self::startSession();
		session_destroy();
		session_unset();
	}

	/**
	 * Permettant de convertie des chiffres en letter
	 * @param string $nombre
	 * @return string
	 */
	public function convertDate($nombre)
	{
		$nombre = (int) $nombre;
		if ($nombre === 0) {
			return "zéro";
		}
		/**
		 * Definition des elements de convertion.
		 */
		$nombreEnLettre = [
			"unite" => [
				null, "un", "deux", "trois", "quatre",
				"cinq", "six", "sept", "huit", "neuf",
				"dix", "onze", "douze", "treize", "quartorze",
				"quinze", "seize", "dix-sept", "dix-huit", "dix-neuf"
			],
			"ten" => [
				null, "dix", "vingt", "trente", "quarente", "cinquante",
				"soixante", "soixante",  "quatre-vingt", "quatre-vingt"
			]
		];

		/**
		 * Calcule des:
		 * - Unité
		 * - Dixaine
		 * - Centaine
		 * - Millieme
		 */
		$unite = $nombre % 10;
		$dixaine = ($nombre % 100 - $unite) / 10;
		$cent = ($nombre % 1000 - $nombre % 100) / 100;
		$millieme = ($nombre % 10000 - $nombre % 1000) / 1000;
		/**
		 * Calcule des unites
		 */
		$unitsOut = ($unite === 1 && $dixaine > 0 && $dixaine !== 8 ? 'et-' : '') . $nombreEnLettre['unite'][$unite];

		$tensOut = "";
		$centsOut = "";
		/**
		 * Calcule des dixaines
		 */
		if ($dixaine === 1 && $unite > 0) {
			$tensOut = $nombreEnLettre["unite"][10 + $unite];
			$unitsOut = "";
		} else if ($dixaine === 7 || $dixaine === 9) {
			$tensOut = $nombreEnLettre["ten"][$dixaine] . '-' . ($dixaine === 7 && $unite === 1 ? "et-" : "") . $nombreEnLettre["unite"][10 + $unite];
			$unitsOut = "";
		} else {
			$tensOut = $nombreEnLettre["ten"][$dixaine];
		}
		/**
		 * Calcule des cemtaines
		 */
		$tensOut .= ($unite === 0 && $dixaine === 8 ? "s": "");
		$centsOut = ($cent > 1 ? $nombreEnLettre["unite"][(int)$cent].' ' : '').($cent > 0 ? 'cent' : '').($cent > 1 && $dixaine == 0 && $unite == 0 ? '' : '');
		$tmp = $centsOut.($centsOut && $tensOut ? ' ': '').$tensOut.(($centsOut && $unitsOut) || ($tensOut && $unitsOut) ? '-': '').$unitsOut;
		/**
		 * Retourne avec les millieme associer.
		 */
		return ($millieme === 1 ? "mil":($millieme > 1 ? $nombreEnLettre["unite"][$millieme]." mil" : "")).($millieme ? " ".$tmp : $tmp);
	}

	/**
	 * makothereSimpleValideDate
	 * @param string $str
	 * @return string
	 */
	public function makeSimpleValideDate($str)
	{
		$mount = explode(" ", $str);
		$str = $mount[0] . " " . self::$angMounth[$mount[1]] . " " . $mount[2];
		return date("Y-m-d", strtotime($str));
	}

	/**
	 * permettant de convertir mois en lettre.
	 * @param  string | integer $value
	 * @return string
	 */
	public function getMonth($value)
	{
		if (!empty($value)) {
			if (is_string($value)) {
				//definition du tableau  composants les mois  avec key en string
				if (strlen($value) == 3) {
					$value = ucfirst($value);
					$month = self::$month;
				} else {
					return null;
				}
			} else {
				$value = (int) $value;

				//definition du tableau  composants les mois
				if ($value > 0 && $value <= 12) {
					$value -= 1;
				} else {
					return  null;
				}
				$month = array_values(elf::$month);
			}
			return $month[$value];
		}
		return $this;
	}

	/**
	 * Formateur de donnee. key => :value
	 *
	 * @param array $data
	 * @return array $resultat
	 */
	public function add2points(array $data)
	{
		$resultat = [];
		foreach ($data as $key => $value) {
			$resultat[$value] = ":$value";
		}
		return $resultat;
	}

	/**
	 * difference entre deux date
	 *
	 * @param string $datenaiss
	 * @param boolean $age
	 * @return array
	 */
	public function dateDiff($datenaiss, $age = false)
	{
		$date1 = date_create();
		$date2 = date_create($datenaiss);
		$requette = true;
		$error = false;

		if ($date1 !== false && $date2 !== false) {
			$diff = date_diff($date1, $date2);
			if ($diff->format("%R") === "-") {
				if ($age === true) {
					return $diff->y;
				}
				if ($diff->y === 0) {
					if ($diff->m < 3) {
						$requette = false;
					} else {
						if ($diff->m === 3 && $diff->h === 0) {
							$requette = false;
						}
					}
				} else {
					$error = true;
				}
			} else {
				$error = true;
			}
		} else {
			$error = true;
		}
		return $error;
	}

	/**
	 * diffEntre2Date, faire la difference entre deux dates
	 *
	 * @param $date1
	 * @param $date2
	 * @return DateTime
	 */
	public function diffEntre2Date($date1, $date2)
	{
		try {
			$date_r = date_diff(date_create($date1), date_create($date2));
			if ($date_r) {
				return $date_r;
			}
		} catch (Exception $e) {
			$app->kill($e);
		}
		return $this;
	}

	/**
	 * Insertion des donnees dans
	 * ====================== MODEL ======================
	 *	$options = [
	 *		"query" => [
	 *			"table" => "nomdelatable",
	 *			"type" => INSERT|SELECT|DELETE|UPDATE,
	 *			"data" => $data2pointAdded
	 *		],
	 *		"data" => "les donnees a inserer."
	 *	];
	 * @param array $options
	 * @param bool|false $return
	 * @param bool|false $lastInsertId
	 * @return array
	 */
	public function query(array $options, $return = false, $lastInsertId = false)
	{
		if (self::$db === null) {
			throw new \ErrorException("La connection n'est pas initialiser.<br/>Snoop::connection('default'[,function])");
		}

		$sqlStatement = self::makeQuery($options["query"]);
		$pdoStatement = self::$db->prepare($sqlStatement);
		$r = self::bindValueAndExecuteQuery(isset($options["data"]) ? $options["data"] : [], $pdoStatement, true);

		if ($r->error) {
			self::getPdoError($pdoStatement);
		}

		if ($return == true) {
			if ($lastInsertId == false) {
				return empty($r->data) ? null : $this->sanitaze($r->data);
			}
			return self::$db->lastInsertId();
		}
		return $this;
	}

	/**
	 * Sanitaze data.
	 */
	public function sanitaze($data, $secure = false)
	{

		if ($secure) {
			$method = "secureString";
		} else {
			$method = "sanitazeString";
		}

		if (is_array($data)) {
			foreach ($data as $key => $value) {
				if (is_string($value)) {
					$data[$key] = $this->$method($value);
				} else if (is_object($value)) {
					$data[$key] = $this->sanitaze($value);
				}
			}
		} else if (is_object($data)) {
			foreach ($data as $key => $value) {
				if (is_string($value)) {
					$data->$key = $this->$method($value);
				} else if (is_array($value)) {
					$data->$key  = $this->sanitaze($value);
				}
			}
		} else if (is_string($data)) {
			$data = $this->$method($data);
		}

		return $data;
	}

	/**
	 * sanitazeString, fonction permettant de nettoyer
	 * une chaine de caractere des caracteres ajoutre
	 * par secureString
	 * @param string $data
	 * @return string
	 * @author Franck Dakia <dakiafranck@gmail.com>
	 */
	public function sanitazeString($data) {
		return stripslashes(trim($data));
	}

	/**
	 * secureString, fonction permettant de nettoyer
	 * une chaine de caractere des caracteres ',<tag>,&nbsp
	 * @param string $data
	 * @return string
	 * @author Franck Dakia <dakiafranck@gmail.com>
	 */
	public function secureString($data)
	{
		return htmlspecialchars(addslashes(trim($data)));
	}

	/**
	 * Modifier le nom par defaut du file uploader.
	 */
	public function setUploadFileName($filename)
	{
		self::$uploadFileName = $filename;
		return $this;
	}

	/**
	 * @param array|string extension
	 */
	public function setFileExtension($extension)
	{
		if (is_array($extension)) {
			$this->fileExtension = $extension;
		} else {
			$this->fileExtension = func_get_args();
		}
		return $this;
	}

    /**
    * setUploadedDir, fonction permettant de redefinir le repertoir d'upload
    *
    * @param string:path, le chemin du dossier de l'upload
	* @throws \InvalidArgumentException
	* @return \System\Snoop
    */
    public function setUploadDir($path)
    {
        if (is_string($path)) {
            self::$uploadDir = $path;
        } else {
           throw new \InvalidArgumentException("L'argument donnee a la fontion doit etre un entier");
        }
        return $this;
    }

    /**
     * Modifie la taille predefinie de l'image a uploader.
     *
     * @param integer $size
     * @throws \InvalidArgumentException
	 * @return \System\Snoop
     */
    public function setFileSize($size)
    {
    	if (is_int($fzie)) {
    		self::$fileSize = $size;
    	} else {
    		throw new \InvalidArgumentException("L'argument donnee a la fontion doit etre un entier");
    	}
    	return $this;
    }

	/**
	 * UploadFile, fonction permettant de uploader un fichier
	 *
	 * @param array $file information sur le fichier, $_FILES
	 * @param array $extension liste de extension valide
	 * @param callable|null $cb
	 * @param string $hash=null
	 * @return \System\Snoop
	 */
	public function uploadFile($file, $cb = null, $hash = null)
	{
		var_dump($file);
		if (!is_object($file) && !is_array($file)) {
			self::callbackLauncher($cb, [new \InvalidArgumentException("Parametre invalide <pre>" . var_export($file, true) ."</pre>. Elle doit etre un tableau ou un object StdClass")]);
		}

		if (empty($file)) {
			self::callbackLauncher($cb, [new \InvalidArgumentException("Le fichier a uploader n'existe pas")]);
		}

        if (is_array($file)) {
        	$file = (object) $file;
        }

        # Si le fichier est bien dans le repertoir tmp de PHP
        if (is_uploaded_file($file->tmp_name)) {

  			$dirPart = explode("/", self::$uploadDir);
  			$end = array_pop($dirPart);

  			if ($end == "") {
  				self::$uploadDir = implode(DIRECTORY_SEPARATOR, $dirPart);
  			} else {
  				self::$uploadDir = implode(DIRECTORY_SEPARATOR, $dirPart) . "/" . $end;
  			}

            if (!is_dir(self::$uploadDir)) {
                @mkdir(self::$uploadDir, 0766);
            }

            # Si le fichier est bien uploader, avec aucune error
            if ($file->error === 0) {
                if ($file->size <= self::$fileSize) {
                    $pathInfo = (object) pathinfo($file->name);
                    if (in_array($pathInfo->extension, $this->fileExtension)) {
                        if ($hash !== null) {
                        	if (self::$uploadFileName !== nul) {
                        		$filename = hash($hash, self::$uploadFileName);
                        	} else {
                        		$filename = hash($hash, uniqid(rand(null, true)));
                        	}
                        } else {
                        	if (self::$uploadFileName !== null) {
                        		$filename = self::$uploadFileName;
                        	} else {
                        		$filename = $pathInfo->filename;
                        	}
                        }
                        move_uploaded_file($file->tmp_name, self::$uploadDir . "/" . $filename . '.' . $pathInfo->extension);
                        # Status, fichier uploadé
                        $status = [
                            "status" => self::SUCCESS,
                            "message" => "File Uploaded"
                        ];
                    } else {
                        # Status, extension du fichier
                        $status = [
                            "status" => self::ERROR,
                            "message" => "Availabe File, verify file type"
                        ];
                    }
                } else {
                    # Status, la taille est invalide
                    $status = [
                        "status" => self::ERROR,
                        "message" => "File is more big, max size " . self::$fileSize. " octets."
                    ];
                }
            } else {
                # Status, fichier erroné.
                $status = [
                    "status" => self::ERROR,
                    "message" => "Le fichier possède des erreurs"
                ];
            }
        } else {
            # Status, fichier non uploadé
            $status = [
                "status" => self::ERROR,
                "message" => "Le fichier n'a pas pus être uploader"
            ];
        }

        if ($cb !== null) {
            call_user_func_array($cb, [(object) $status, isset($filename) ? $filename : null, isset($ext) ? $ext : null]);
        } else {
        	return $status;
        }

        return $this;
    }

    /**
     * switchTo, permet de ce connecter a une autre base de donnee.
     *
     * @param string $enterKey
     * @param callable $cb
	 * @return \System\Snoop
     */
    public function switchTo($enterKey, $cb)
    {
    	if (!is_string($enterKey)) {
    		self::callbackLauncher($cb, [new InvalidArgumentException("parametre invalide")]);
    	} else {
    		self::$db = null;
    		self::connection($enterKey, $cb);
    	}
    	return $this;
    }

    /**
     * setTimeZone, modifie la zone horaire.
     *
     * @param string $zone
     * @throws \ErrorException
	 * @return \System\Snoop
     */
    public function setTimeZone($zone)
    {
    	$c = explode("/", $zone);
    	if (count($c) != 2) {
    		throw new \ErrorException("La definition de la zone est invale");
    	}
    	date_default_timezone_set($zone);
    	return $this;
    }

    /**
     * render, require $filenae
     * @param string $filename
     * @param mixed|null $data
	 * @return \System\Snoop
     */
    public function render($filename, $bind = null)
    {
		if (is_string($bind)) {
			$bind = new \StdClass($bind);
		} else if (is_array($bind)) {
			$bind = (object) $bind;
		}

		if ($this->views !== null) {
			$filename = $this->views ."/".$filename;
		}
		// Render du fichier demander.
	    require $filename;
    	return $this;
    }

	/**
	 * Set, permet de redefinir la configuartion
	 * @param string $key
	 * @param string $value
	 * @throws \InvalidArgumentException
	 */
	public function set($key, $value)
	{
		if (in_array($key, ["views", "engine", "public", "root"])) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		} else {
			throw new \InvalidArgumentException("Le premier argument n'est pas un argument de confoguartion");
		}
	}

    /**
     * redirect, permet de lancer une redirection
     * vers l'url passer en parametre
     * @param string $path
     */
    public function redirect($path)
    {
    	header("Location: " . $this->getRoot() . $path, true, 301);
    	$app->kill();
    }

    /**
     * redirectTo404, redirige vers 404
     */
    public function redirectTo404()
    {
    	header("Status: Not Found", false, 404);
    	return $this;
    }

    /**
     * getAll, permet de recuperer simple tout les donnees
     * dans un table.
     * @param string $table
     * @throws \InvalidArgumentException
     * @return array|object
     */
    public function find($table, $cb = null)
    {
    	if (!is_string($table)) {
    		throw new \InvalidArgumentException("Le nom de la table doit etre une chaine de caractere.");
    	}

    	$data = self::query([
    		"query" => [
    			"type" => self::SELECT,
    			"table" => $table
    		]
    	], true);

    	if ($cb !== null) {
    		return call_user_func($cb, $data);
    	}
    	return $data;
    }

    /**
     * Lance un var_dump sur les varibles passees en parametre.
	 * @throws \InvalidArgumentException
     */
    public function debug()
    {
    	if (count(func_get_args()) == 0) {
    		throw new InvalidArgumentExecption("Vous devez donner un paramtre à la function", 1);
    	}
    	ob_start();
    	foreach (func_get_args() as $key => $value) {
    		var_dump($value);
    		echo "\n";
    	}
		$content = ob_get_clean();
    	$content = preg_replace("~\s?\{\n\s?\}~i", " is empty", $content);
		$content = preg_replace("~(string|int|object|stdclass|bool|double|float|array)~i", "<span style=\"color: rgba(255, 0, 0, 0.5); font-style: italic\">&lt;$1&gt;</span>", $content);
		$content = preg_replace('~\((\d+)\)~im', "<span style=\"color: #498\">(len=$1)</span>", $content);
		$content = preg_replace('~\s(".+")~im', "<span style=\"color: #458\"> value($1)</span>", $content);
		$content = preg_replace("~(=>)(\n\s+?)+~im", "<span style=\"color: #754\"> is</span>", $content);
		$content = preg_replace("~(is</span>)\s+~im", "$1 ", $content);
		$content = preg_replace("~\[(.+)\]~im", "<span style=\"color:#666\"><span style=\"color: red\">key:</span>$1<span style=\"color: red\"></span></span>", $content);
		$content = "<pre><tt><div style=\"font-family: monaco, courier; font-size: 13px\">$content</div></tt></pre>";
    	
    	echo $content;

    	$this->kill();
    }

	public function it($message, $cb = null)
	{
		echo "<h2>{$message}</h2>";
		if (is_callable($cb)) {
			call_user_func_array($cb, [$this]);
		} else {
			$this->debug(array_slice(func_get_args(), 1, func_num_args()));
		}
		$this->kill();
	}

    /**
     * convertHourToLetter, convert une heure en letter
     * @param string $hour
     * @return string
     */
    public function convertHourToLetter($hour)
    {
    	$hourPart = explode(":", $hour);
    	$heures = trim($this->convertDate($hourPart[0])) . " heure";
    	$minutes = trim($this->convertDate($hourPart[1])) . " minute";

    	$secondes = "";

    	if ($hourPart[0] > 1) {
    		$heures .= "s";
    	}

    	if ($hourPart[1] > 1) {
    		$minutes .= "s";
    	}

    	if ($hourPart[2] > 0) {
    		$secondes = trim($this->convertDate($hourPart[2])) . " secondes";
    	}

    	return trim(strtolower($heures . " " . $minutes . " " . $secondes));
    }

    /**
     * convertDateToLetter, convert une date sous forme de letter
     * @param string $date_string
     * @return string
     */
    public function convertDateToLetter($dateString)
    {
    	$formData = array_reverse(explode("-", $dateString));
    	$r = trim(convertDate($formData[0])." ". getMonth((int)$formData[1])) . " " . trim(convertDate($formData[2]));
    	$p = explode(" ", $r);

    	if (strtolwer($p[0]) == "un") {
    		$p[0] = "permier";
    	}
    	return trim(implode(" ", $p));
    }

    /**
     * GetRoot, retourne la route definir.
     * @return string
     */
    public function getRoot()
    {
    	return $this->root;
    }

    /**
     * GetPublicPath, retourne la route definir pour
     * dossier public.
     * @return string
     */
    public function getPublicPath()
    {
    	return $this->public;
    }

    /**
     * body, returne les informations
     * du POST
     * @param string $key=null
     * @return array
     */
    public function body($key = null)
    {

    	if ($key !== null) {
    		return $this->isBodyKey($key) ? $_POST[$key] : false;
    	}
    	return $_POST;
    }

    /**
     * isBodyKey, verifie si de Snoop::body
     * contient la cle definie.
     * @return mixed
     */
    public function isBodyKey($key)
    {
    	return isset($_POST[$key]) && !empty($_POST[$key]);
    }
    
    /**
     * bodyIsEmpty
     *	@return boolean
     */
    public function bodyIsEmpty()
    {
    	return empty($_POST);
    }

    /**
     * Param, returne les informations
     * du GET
     * @param string $key=null
     * @return array
     */
    public function param($key = null)
    {
    	if ($key !== null) {
    		return $this->isParamKey($key) ? $_GET[$key] : false;
    	}
    	return $_GET;
    }

    /**
     * isParamKey, verifie si de Snoop::param
     * contient la cle definie.
	 * @param string|int $key
     * @return mixed
     */
    public function isParamKey($key)
    {
    	return isset($_GET[$key]) && !empty($key);
    }
    
    /**
     * paramIsEmpty
     *	@return boolean
     */
    public function paramIsEmpty()
    {
    	return empty($_GET);
    }

	/**
	 * files, retoure les informations
	 * du $_FILES
	 * @return mixed
	 */
	public function files($key = null)
	{
		if ($key !== null) {
			return isset($_FILES[$key]) ? (object) $_FILES[$key] : false;
		}
		return $_FILES;
	}

    /**
     * isParamKey, verifie si de Snoop::param
     * contient la cle definie.
	 * @param string|int $key
     * @return mixed
     */
    public function isFilesKey($key)
    {
    	return isset($_FILES[$key]) && !empty($_FILES[$key]);
    }

    /**
     * filesIsEmpty
     *	@return boolean
     */
    public function filesIsEmpty()
    {
    	return empty($_FILES);
    }

	/**
	 * currentRoot, retourne la route courante
	 * @return string
	 */
    public function currentRoot()
    {
    	return $this->currentRoot;
    }

    public static function mail()
    {
    	return Mail::load();
    }

}
