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

	public function delete( $table = '`school_location`' )
	{
		return parent::delete( $table );
	}

	public function save()
	{
		if ( $this->isNew() ) {
			$sql = 'INSERT INTO `school_location` ( `id`, `name`, `school_id` ) VALUES ( :id, :name, :school_id );';
		} else {
			$sql = 'UPDATE `school_location` SET  `name` = :name, `school_id` = :school_id WHERE  `school_location`.`id` = :id;';
		}

		$query = parent::prepare( $sql );

		$query->bindValue(':id', $this->id );
		$query->bindValue(':name', $this->name );
		$query->bindValue(':school_id', $this->school_id );

		// Persist submitted course.
		$saved = (bool) $query->execute();

		if( $this->isNew() && $saved ) {
			$this->id = parent::connect()->lastInsertId();
		}

		return $saved;
	}

} 