<?php
namespace CoursePlanner\BaseModule\Model;

use Octopix\Selene\Database\Provider\MySQL\DatabaseProviderMySQL;


class Course extends Model {

	public static function all( $table = '`course`' )
	{
		return parent::all( $table );
	}

	public function save()
	{
		$saved = false;

		if ( !$this->isNew() ) {
			$sql = 'UPDATE `course` SET  `name` = :name, `start_date` = :start_date , `end_date` = :end_date, `reference_document` = :reference_document, `code` = :code WHERE  `course`.`id` = :id;';
		} else {
			$sql = 'INSERT INTO `course` ( `id`, `name`, `start_date`, `end_date`, `reference_document`, `code`) VALUES ( :id, :name, :start_date, :end_date, :reference_document, :code );';
		}

		$query = parent::prepare( $sql );

		$query->bindValue(':id', $this->id );
		$query->bindValue(':name', $this->name );
		$query->bindValue(':code', $this->code );
		$query->bindValue(':start_date', $this->start_date );
		$query->bindValue(':end_date', $this->end_date );
		$query->bindValue(':reference_document', $this->reference_document );

		$saved = (bool) $query->execute();

		if( $this->isNew() && $saved ) {
			$this->id = parent::connect()->lastInsertId();
		}
		return $saved;
	}

	public function delete( $table = '`course`' )
	{
		return parent::delete( $table );
	}

}