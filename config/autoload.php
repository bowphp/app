<?php
namespace App\Configuration;

class Appautoload
{
	/**
	 * Lance l'autoload
	 */
	public static function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	/**
	 * Chargeur de classe.
	 *
	 * @param $class
	 */
	private static function autoload($class) {
		if (preg_match("/^App.+/", $class)) {
            $class = str_replace("\\", "/", $class);
            $class = str_replace("App/", "", $class);
            $class = __DIR__ . '/' . ucfirst($class);
            require $class . ".php";
        }
	}

    /**
     * Liste des methodes pouvants être appelé de façon static
     *
     * @return array
     */
	public function map()
    {
        return [
            'DB' => \Bow\Database\Database::class,
            'Request' => \Bow\Http\Request::class,
            'Req' => \Bow\Http\Request::class,
            'Response' => \Bow\Http\Response::class,
            'Res' => \Bow\Http\Response::class,
            'Input' => \Bow\Http\Input::class,
            'Secure' => \Bow\Security\Security::class,
            'Cache' => \Bow\Session\Cache::class
        ];
    }
}
