<?php
namespace CoursePlanner\BaseModule\Model;

use Octopix\Selene\Database\Model\ModelInterface;
use Octopix\Selene\Database\Provider\MySQL\DatabaseProviderMySQL;

abstract class Model implements ModelInterface {

	protected $id;

	public function __construct(array $data = array())
	{
		if (!empty($data))
		{
			$this->hydrate($data);
		}
	}

	public function isNew()
	{
		return empty($this->id);
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = (int) $id;
	}

	public function hydrate(array $data)
	{
		foreach ($data as $attribut => $valeur)
		{
			$method = 'set'.ucfirst($attribut);

			if (is_callable(array($this, $method)))
			{
				$this->$method($valeur);
			}
		}
	}

	public function offsetGet($var)
	{
		$method = 'get'.ucfirst($attribut);

		if (isset($this->$var) && is_callable(array($this, $method)))
		{
			return $this->$method();
		}
	}

	public function offsetSet($var, $value)
	{
		$method = 'set'.ucfirst($var);

		if (isset($this->$var) && is_callable(array($this, $method)))
		{
			$this->$method($value);
		}
	}

	public function offsetExists($var)
	{
		return isset($this->$var) && is_callable(array($this, $var));
	}

	public function offsetUnset($var)
	{
		throw new \Exception('Unable to delete the requested property.');
	}

	protected static function connect()
	{
		return DatabaseProviderMySQL::connect();
	}

	public static function query($sql, $start = -1, $limit = -1)
	{
		if ($start != -1 || $limit != -1)
		{
			$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
		}
		$pdo = self::connect();
		$query = $pdo->query($sql);
		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class());
		return $query;
	}

	public static function prepare( $sql )
	{
		$pdo = self::connect();
		$query = $pdo->prepare( $sql );
		return $query;
	}

	public static function all( $table = '`course`' )
	{
		$query = self::query( sprintf( 'SELECT * FROM %s ORDER BY id ASC', $table ) );
		$results = $query->fetchAll();
		$query->closeCursor();
		return $results;
	}

	public static function where( $column, $value, $single = false, $table = '`course`' )
	{
		$sql = 'SELECT * FROM %1$s WHERE %2$s = \'%3$s\' ORDER BY id DESC';
		if ( $single ) {
			return self::query( sprintf( $sql, $table, $column, $value ) )->fetch();
		}
		$query   = self::query( sprintf( $sql, $table, $column ) );
		$results = $query->fetchAll();
		$query->closeCursor();
		return $results;
	}

	public static function find( $id, $table = '`course`' )
	{
		$query = self::prepare( sprintf( 'SELECT * FROM %s WHERE id = :id', $table ) );
		$query->bindValue(':id', (int) $id, \PDO::PARAM_INT);
		$query->execute();
		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class());
		return $query->fetch();
	}

	public function delete( $table = '`course`' )
	{
		$query = self::prepare( sprintf( 'DELETE FROM %s WHERE id = :id', $table ) );
		$query->bindValue(':id', $this->id );
		return (bool) $query->execute();
	}


}