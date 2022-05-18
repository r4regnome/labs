<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';

class CountriesTable
{
	private static $tableName = 'countries';

	public static function getList()
	{
		$querySql = 'SELECT * FROM ' . static::$tableName;
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->execute();

		return $query->get_result()->fetch_all(MYSQLI_ASSOC);
	}

	public static function deleteById($id)
	{
		$querySql = 'DELETE FROM ' . static::$tableName . ' WHERE ID = ?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('i', $id);

		return $query->execute();
	}

	public static function add(array $data)
	{
		$querySql = 'INSERT INTO ' . static::$tableName . ' SET NAME=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('s', $data['NAME']);
		$query->execute();
		return Database::getInstance()->getConnect()->insert_id;
	}

	public static function update(array $data)
	{
		$querySql = 'UPDATE ' . static::$tableName . ' SET NAME=? WHERE ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('si', $data['NAME'], $data['ID']);
		return $query->execute();
	}

	public static function getById($id)
	{
		$querySql = 'SELECT * FROM ' . static::$tableName . ' WHERE ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('i', $id);
		$query->execute();

		return $query->get_result()->fetch_assoc();
	}
}