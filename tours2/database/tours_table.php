<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/database.php';

class ToursTable
{

	private static $tableName = 'tours';

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
		$querySql = 'INSERT INTO ' . static::$tableName . ' SET NAME=?, IMAGE=?, DESCRIPTION=?, PRICE=?, COUNTRY_ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('sssdi', $data['NAME'], $data['IMAGE'], $data['DESCRIPTION'], $data['PRICE'], $data['COUNTRY_ID']);
		$query->execute();
		return Database::getInstance()->getConnect()->insert_id;
	}

	public static function update(array $data)
	{
		$querySql = 'UPDATE ' . static::$tableName . ' SET NAME=?, IMAGE=?, DESCRIPTION=?, PRICE=?, COUNTRY_ID=? WHERE ID=?';
		$query = Database::getInstance()->getConnect()->prepare($querySql);
		$query->bind_param('sssdii', $data['NAME'], $data['IMAGE'], $data['DESCRIPTION'], $data['PRICE'], $data['COUNTRY_ID'], $data['ID']);
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

    public static function getToursByCountryId($countryId)
    {
        $querySql = 'SELECT * FROM ' . static::$tableName . ' WHERE COUNTRY_ID=?';
        $query = Database::getInstance()->getConnect()->prepare($querySql);
        $query->bind_param('i', $countryId);
        $query->execute();

        return $query->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}