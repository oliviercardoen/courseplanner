<?php
namespace CoursePlanner\BaseModule\Model;

use Octopix\Selene\Mvc\Model\Model;

class SchoolLocation extends Model {

	public static function all( $table = '`school_location`' )
	{
		return parent::all( $table );
	}

	public static function find( $id, $table = '`school_location`' )
	{
		return parent::find( $id, $table );
	}

	public function save()
	{
		// TODO: Implement save() method.
	}

} 