<?php

/**
 * SnoopAutoload, systeme de Chargement automatique des classes.
 */
namespace System;

class SnoopAutoload
{

	private static function load($class) {

		$class = str_replace("\\", "/", $class);
		$class = str_replace("System/", "", $class);

		$class = __DIR__. "/" . $class . ".php";

		if (is_file($class)) {
			require $class;
		}
	}

	public static function register() {

		spl_autoload_register([__CLASS__, 'load']);

	}

}
