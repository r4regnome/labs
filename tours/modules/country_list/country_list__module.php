<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries.php';

class CountryListModule
{
	private $countryDatabase;

	public function __construct()
	{
		$this->countryDatabase = new Countries();
	}

	public function executeAndShow()
	{
		$data['COUNTRIES'] = $this->countryDatabase->getList();
		$data['URL_CRUD_COUNTRIES'] = '/crud/countries/';
		require 'front.php';
	}

}