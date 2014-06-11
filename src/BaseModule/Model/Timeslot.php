<?php
namespace CoursePlanner\BaseModule\Model;

class Timeslot extends Model {

	public static function all( $table = '`timeslot`' )
	{
		return parent::all( $table );
	}

	public static function find( $id, $table = '`timeslot`' )
	{
		return parent::find( $id, $table );
	}

	public function save()
	{
		return false;
	}

	public function delete( $table = '`timeslot`' )
	{
		return false;
	}

}