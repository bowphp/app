<?php

/**
 * @author dakia Franck
 * @version 0.0.1
 */

namespace System;

Class Route
{
	/**
	 * Les callaback a lance si le url
	 * de la requete de matcher.
	 * @var $cb
	 */
	private $cb;
	/**
	 * Le chemin sur la route definir
	 * par l'utilisateur
	 * @var $path
	 */
	private $path;
	/**
	 * Liste de paramaters qui on matcher
	 * @var $match
	 */
	private $match;

	/**
	 * Regle supplementaire de validation
	 * d'url
	 * @var $with
	 */

	private $with;

	/**
	 * contructeur
	 *
	 * @param string $path
	 * @param callable $cb
	 */
	public function __construct($path, $cb, $with)
	{
		$this->cb = $cb;
		$this->path = $path;
		$this->match = [];
		$this->with = $with;
	}

	/**
	 * match, verifir si le path de la REQUEST est conforme a celle
	 * definir par le routier
	 *
	 * @param string $path
	 */
	public function match($url)
	{
		if (preg_match("#(.+)/$#", $url, $match)) {
			$url = end($match);
		}

		if (preg_match("#(.+)/$#", $this->path, $match)) {
			$this->path = end($match);
		}

		if (count(explode("/", $this->path)) != count(explode("/", $url))) {
			return false;
		}

		if (empty($this->with)) {
			$path = preg_replace("#:\w+#", "([^\s]+)", $this->path);
		} else {
			if (preg_match_all("#:([\w]+)#", $this->path, $match)) {
				foreach ($match[1] as $key => $value) {
					if (array_key_exists($value, $this->with)) {
						$path = preg_replace("#:$value$#", "(" . $this->with[$value] . ")", $this->path);
					}
				}
			}
			$this->with = [];
		}

		if (preg_match("#^$path$#", $url, $match)) {
			array_shift($match);
			$this->match = str_replace("/", "", $match);
			return true;
		}
		return false;
	}

	/**
	 * Fonction permettant de lancer les fonctions
	 * de rappel.
	 */
	public function call()
	{
		call_user_func_array($this->cb, $this->match);
	}
}
