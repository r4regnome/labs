<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries.php';


class CountryCreateModule
{
	private $countryDatabase;

	public function __construct()
	{
		$this->countryDatabase = new Countries();
	}

	public function executeAndShow()
	{
		$data['URL_CREATE_COUNTRY'] = '/crud/countries/';
		require 'front.php';
	}

	public function createCountry()
	{
		$dataAdd = [
			'NAME' => $_POST['country_name'] ?? '',
		];

		$this->countryDatabase->add($dataAdd);
	}
}