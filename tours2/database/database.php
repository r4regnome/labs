<?php

class Database
{

    protected static $instance = null;
    protected $connect;
    protected $hostName;
    protected $userName;
    protected $password;
    protected $database;

    protected function __construct()
	{
        $this->parseFileDataForDb();
        $this->connect = mysqli_connect($this->hostName, $this->userName, $this->password, $this->database);
        if (mysqli_connect_errno())
        {
            echo 'Error database:' . mysqli_connect_errno();
            exit();
        }
    }

    protected function parseFileDataForDb()
	{
		require $_SERVER['DOCUMENT_ROOT'] . '/database/data_db_ini.php';
        $this->hostName = $dataDb['host-name'];
        $this->userName = $dataDb['user-name'];
        $this->password = $dataDb['password'];
        $this->database = $dataDb['database'];
    }

    public static function getInstance()
	{
        if (!static::$instance)
            static::$instance = new Database();
        return static::$instance;
    }

    public function getConnect()
	{
        return $this->connect;
    }

}