<?php
namespace App;

class Autoload
{
	/**
	 * Lance l'autoload
	 */
	public static function register()
	{
		spl_autoload_register([__CLASS__, 'load']);
	}

	/**
	 * Chargeur de classe.
	 *
	 * @param $class
	 */
	private static function load($class) {
		if (preg_match("/^App.+/", $class)) {
			$class = str_replace("\\", "/", $class);
			$class = str_replace("App/", "", $class);
			$class = __DIR__ . '/' . $class;
			require $class . ".php";
		}
	}
}
