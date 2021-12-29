<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';

class Tours
{

	private $tableName = 'tours';

	public function getList()
	{
		$querySql = 'SELECT * FROM ' . $this->tableName;
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->execute();

		return $query->get_result()->fetch_all(MYSQLI_ASSOC);
	}

	public function deleteById($id)
	{
		$querySql = 'DELETE FROM ' . $this->tableName . ' WHERE ID = ?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('i', $id);

		return $query->execute();
	}

	public function add(array $data)
	{
		$querySql = 'INSERT INTO ' . $this->tableName . ' SET NAME=?, IMAGE=?, DESCRIPTION=?, PRICE=?, COUNTRY_ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('sssdi', $data['NAME'], $data['IMAGE'], $data['DESCRIPTION'], $data['PRICE'], $data['COUNTRY_ID']);
		$query->execute();
		return Database::getInstance()->getConnect()->insert_id;
	}

	public function update(array $data)
	{
		$querySql = 'UPDATE ' . $this->tableName . ' SET NAME=?, IMAGE=?, DESCRIPTION=?, PRICE=?, COUNTRY_ID=? WHERE ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('sssdii', $data['NAME'], $data['IMAGE'], $data['DESCRIPTION'], $data['PRICE'], $data['COUNTRY_ID'], $data['ID']);
		return $query->execute();
	}

	public function getById($id)
	{
		$querySql = 'SELECT * FROM ' . $this->tableName . ' WHERE ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('i', $id);
		$query->execute();

		return $query->get_result()->fetch_assoc();
	}

}