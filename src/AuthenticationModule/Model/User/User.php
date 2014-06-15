<?php
namespace CoursePlanner\AuthenticationModule\Model\User;

use Octopix\Selene\Mvc\Model\Model;

session_start();

class User extends Model {

	protected $name;
	protected $password;

	public function save()
	{
		if ( $this->isNew() ) {
			$sql = 'INSERT INTO `user` ( `id`, `name`, `firstname`, `lastname`, `email`, `password`, `user_role_id`, `registration_date` ) VALUES ( :id, :name, :firstname, :lastname, :email, :password, 1, NOW() );';
		} else {
			$sql = 'UPDATE `curriculum` SET  `name` = :name, `timeslot_id` = :timeslot_id WHERE  `curriculum`.`id` = :id;';
		}
		$query = parent::prepare( $sql );

		$query->bindValue(':id', $this->id );
		$query->bindValue(':name', $this->name );
		$query->bindValue(':firstname', $this->firstname );
		$query->bindValue(':lastname', $this->lastname );
		$query->bindValue(':email', $this->email );
		$query->bindValue(':password', sha1( \App\App::salt() . $this->password ) );

		return (bool) $query->execute();
	}

	public function exist()
	{
		if ( isset( $this->name ) && isset( $this->password ) ) {
			$query = self::prepare( 'SELECT * FROM `user` WHERE `name` = :name AND `password` = :password' );
			$query->bindValue(':name', $this->name );
			$query->bindValue(':password', $this->password );
			$query->execute();
			$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class());
			$user = $query->fetch();
			if ( !empty( $user ) ) {
				$this->hydrate( $user );
				return !empty( $this->id );
			}
		}
		return false;
	}

	public function authenticate()
	{
		if ( $this->exist() ) {
			//if( $this->rememberMe ) {
				//setcookie('name', $this->name);
				//setcookie('password', $this->password);
			//}
			$_SESSION['auth'] = true;
			return true;
		}
		return false;
	}

	public function isAuthenticated()
	{
		return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
	}

	public function fullname()
	{
		$fullname = 'Anonymous';
		if ( isset( $this->firstname ) && isset( $this->lastname ) ) {
			$fullname = sprintf( '%1$s, %2$s', $this->lastname, $this->firstname );
		}
		return $fullname;
	}

	public function logout()
	{
		$_SESSION = array();
		session_destroy();
		//setcookie('name', '');
		//setcookie('password', '');
	}

}