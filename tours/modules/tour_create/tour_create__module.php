<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/tours.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries.php';

class TourCreateModule
{
	private $tourDatabase;
	private $countryDatabase;

	public function __construct()
	{
		$this->tourDatabase = new Tours();
		$this->countryDatabase = new Countries();
	}

	public function executeAndShow()
	{
		$data['COUNTRIES'] = $this->countryDatabase->getList();
		$data['URL_CREATE_TOUR'] = '/crud/tours/';
		require 'front.php';
	}

	public function createTour()
	{
		if (isset($_FILES['tour_image']) && $_FILES['tour_image']['error'] == 0)
		{
			$newPathForFile = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/tours/' . $_FILES['tour_image']['name'];
			if (file_exists($newPathForFile))
			{
				unlink($newPathForFile);
			}
			move_uploaded_file($_FILES['tour_image']['tmp_name'], $newPathForFile);
			$newPathForFile = str_replace($_SERVER['DOCUMENT_ROOT'], '', $newPathForFile);
		}

		$dataAdd = [
			'NAME' => $_POST['tour_name'] ?? '',
			'IMAGE' => $newPathForFile ?? '',
			'DESCRIPTION' => $_POST['tour_description'] ?? '',
			'PRICE' => $_POST['tour_price'] ?? '',
			'COUNTRY_ID' => $_POST['tour_country_id'] ?? '',
		];

		$this->tourDatabase->add($dataAdd);
	}
}