<?php
namespace App;

use Bow\Database\Model;
use Bow\Database\Database;
use Bow\Exception\TableException;

class Users extends Model
{
	/**
	 * Ajoutez les champs à valider ici
	 */
	public static $rules = [
		// inserer ici vos contrainte sur les champs
		// provenant d'un réquête
	];

	/**
	 * Le nom de la table.
	 *
	 * @var string
	 */
	public static $table = "users";
}