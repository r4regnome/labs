<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/tours.php';

class TourListModule
{
	private $tourDatabase;

	public function __construct()
	{
		$this->tourDatabase = new Tours();
	}

	public function executeAndShow()
	{
		$data['TOURS'] = $this->tourDatabase->getList();
		$data['URL_CRUD_TOURS'] = '/crud/tours/';
		require 'front.php';
	}
}