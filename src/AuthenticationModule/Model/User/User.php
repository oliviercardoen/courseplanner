<?php
namespace CoursePlanner\AuthenticationModule\Model\User;

use Octopix\Selene\Mvc\Model\Model;

session_start();

class User extends Model {

	public function getAttribute($attr)
	{
		return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
	}

	public function getFlash()
	{
		$flash = $_SESSION['flash'];
		unset($_SESSION['flash']);
		return $flash;
	}

	public function hasFlash()
	{
		return isset($_SESSION['flash']);
	}

	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
	}

	public function setAttribute($attr, $value)
	{
		$_SESSION[$attr] = $value;
	}

	public function setAuthenticated($authenticated = true)
	{
		$_SESSION['auth'] = (bool) $authenticated;
	}

	public function setFlash($value)
	{
		$_SESSION['flash'] = $value;
	}

	public function save()
	{
		if ( $this->isNew() ) {
			$sql = 'INSERT INTO `curriculum` ( `id`, `name`, `timeslot_id`) VALUES ( :id, :name, :timeslot_id );';
		} else {
			$sql = 'UPDATE `curriculum` SET  `name` = :name, `timeslot_id` = :timeslot_id WHERE  `curriculum`.`id` = :id;';
		}

		$query = parent::prepare( $sql );

		$query->bindValue(':id', $this->id );
		$query->bindValue(':name', $this->name );
		$query->bindValue(':timeslot_id', $this->timeslot_id );

		return (bool) $query->execute();
	}

}