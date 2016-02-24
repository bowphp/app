<?php

namespace App\Model;

use Bow\Exception\TableException;

class Users
{
	/**
	 * Facade
	 * @param string $method
	 * @param array $arg
	 * @throws TableException
	 * @return Table
	 */
	public static function __callStatic($method, $arg)
	{
		$table = table("users");
		if (method_exists($table, $method)) {
			return call_user_func_array([$table, $method], $arg);
		} else {
			throw new TableException("method $method not found", 1);
		}
	}
}
