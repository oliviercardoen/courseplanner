<?php
namespace CoursePlanner\BaseModule\Model;

class Course extends Model {

	public static function all( $table = '`course`' )
	{
		return parent::all( $table );
	}

	public function save()
	{
		if ( isset( $this->id ) && 0 < $this->id ) {
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

		return (bool) $query->execute();
	}

	public function delete( $table = '`course`' )
	{
		return parent::delete( $table );
	}

}