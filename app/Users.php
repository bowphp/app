<?php
namespace App;

use Bow\Database\Model;

class Users extends Model
{
	/**
	 * Ajoutez les champs à valider ici
	 */
	public static $rules = [
		// inserer ici vos contrainte sur les champs
		// provenant d'une réquête
	];

	/**
	 * Le nom de la table.
	 *
	 * @var string
	 */
	public static $table = "users";
}