<?php
namespace CoursePlanner\BaseModule\Model;

class Curriculum extends Model {

	private $timeslot;

	public function timeslot()
	{
		return Timeslot::find( $this->timeslot_id );
	}

	public static function all( $table = '`curriculum`' )
	{
		return parent::all( $table );
	}

	public static function find( $id, $table = '`curriculum`' )
	{
		return parent::find( $id, $table );
	}

	public function save()
	{
		if ( isset( $this->id ) && 0 < $this->id ) {
			$sql = 'UPDATE `curriculum` SET  `name` = :name, `timeslot_id` = :timeslot_id WHERE  `curriculum`.`id` = :id;';
		} else {
			$sql = 'INSERT INTO `curriculum` ( `id`, `name`, `timeslot_id`) VALUES ( :id, :name, :timeslot_id );';
		}

		$query = parent::prepare( $sql );

		$query->bindValue(':id', $this->id );
		$query->bindValue(':name', $this->name );
		$query->bindValue(':timeslot_id', $this->timeslot_id );

		return (bool) $query->execute();
	}

	public function delete( $table = '`curriculum`' )
	{
		return parent::delete( $table );
	}

} 