<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries.php';

class CountryDeleteModule
{
	private $countryDatabase;

	public function __construct()
	{
		$this->countryDatabase = new Countries();
	}

	public function deleteCountry()
	{
		if (isset($_POST['country_id']) && $_POST['country_id'] > 0)
		{
			$this->countryDatabase->deleteById($_POST['country_id']);
		}
	}
}