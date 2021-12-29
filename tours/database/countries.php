<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';

class Countries
{
	private $tableName = 'countries';

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
		$querySql = 'INSERT INTO ' . $this->tableName . ' SET NAME=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('s', $data['NAME']);
		$query->execute();
		return Database::getInstance()->getConnect()->insert_id;
	}

	public function update(array $data)
	{
		$querySql = 'UPDATE ' . $this->tableName . ' SET NAME=? WHERE ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('si', $data['NAME'], $data['ID']);
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