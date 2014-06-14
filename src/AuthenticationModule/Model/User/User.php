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
			$sql = 'INSERT INTO `user` ( `id`, `name`, `firstname`, `lastname`, `email`, `password`, `user_role_id`, `registration_date` ) VALUES ( :id, :name, :firstname, :lastname, :email, :password, 1, NOW() );';
		} else {
			$sql = 'UPDATE `curriculum` SET  `name` = :name, `timeslot_id` = :timeslot_id WHERE  `curriculum`.`id` = :id;';
		}
		$query = parent::prepare( $sql );

		$query->bindValue(':id', 		 $this->id );
		$query->bindValue(':name', 		 $this->name );
		$query->bindValue(':firstname',  $this->firstname );
		$query->bindValue(':lastname',   $this->lastname );
		$query->bindValue(':email',      $this->email );
		$query->bindValue(':password',   $this->password );

		return (bool) $query->execute();
	}

}