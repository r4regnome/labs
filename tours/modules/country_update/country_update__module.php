<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries.php';

class CountryUpdateModule
{
	private $countryDatabase;

	public function __construct()
	{
		$this->countryDatabase = new Countries();
	}

	public function executeAndShow()
	{
		if (isset($_GET['country_id']) && $_GET['country_id'] > 0)
		{
			$data['COUNTRY'] = $this->countryDatabase->getById($_GET['country_id']);
			$data['URL_UPDATE_COUNTRY'] = '/crud/countries/';
			require 'front.php';
		}
	}

	public function updateCountry()
	{
		if (isset($_POST['country_id']) && $_POST['country_id'] > 0)
		{
			$countryFromDb = $this->countryDatabase->getById($_POST['country_id']);

			$dataUpdate = [
				'ID' => $_POST['country_id'],
				'NAME' => $_POST['country_name'] ?? $countryFromDb['NAME'],
			];

			$this->countryDatabase->update($dataUpdate);

		}
	}
}