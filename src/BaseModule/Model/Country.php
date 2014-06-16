<?php
namespace CoursePlanner\BaseModule\Model;

use Octopix\Selene\Mvc\Model\Model;

class Country extends Model {

	public static function all( $table = '`country`' )
	{
		return parent::all( $table );
	}

	public static function find( $id, $table = '`country`' )
	{
		return parent::find( $id, $table );
	}

	public function save()
	{
		// TODO: Implement save() method.
	}

} 