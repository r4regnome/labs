<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/tours.php';

class TourUpdateModule
{
	private $countryDatabase;
	private $tourDatabase;

	public function __construct()
	{
		$this->countryDatabase = new Countries();
		$this->tourDatabase = new Tours();
	}

	public function executeAndShow()
	{
		if (isset($_GET['tour_id']) && $_GET['tour_id'] > 0)
		{
			$data['COUNTRIES'] = $this->countryDatabase->getList();
			$data['TOUR'] = $this->tourDatabase->getById($_GET['tour_id']);
			$data['URL_UPDATE_TOUR'] = '/crud/tours/';
			require 'front.php';
		}
	}

	public function updateTour()
	{
		if (isset($_POST['tour_id']) && $_POST['tour_id'] > 0)
		{
			$tour = $this->tourDatabase->getById($_POST['tour_id']);

			if (isset($_FILES['tour_image']) && $_FILES['tour_image']['error'] == 0)
			{
				if (isset($tour['IMAGE']) && strlen($tour['IMAGE']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $tour['IMAGE']))
				{
					unlink($_SERVER['DOCUMENT_ROOT'] . $tour['IMAGE']);
				}
				$newPathForFile = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/tours/' . $_FILES['tour_image']['name'];
				if (file_exists($newPathForFile))
				{
					unlink($newPathForFile);
				}
				move_uploaded_file($_FILES['tour_image']['tmp_name'], $newPathForFile);
				$newPathForFile = str_replace($_SERVER['DOCUMENT_ROOT'], '', $newPathForFile);
			}

			$dataUpdate = [
				'ID' => $_POST['tour_id'],
				'NAME' => $_POST['tour_name'] ?? $tour['NAME'],
				'IMAGE' => $newPathForFile ?? $tour['IMAGE'],
				'DESCRIPTION' => $_POST['tour_description'] ?? $tour['DESCRIPTION'],
				'PRICE' => $_POST['tour_price'] ?? $tour['PRICE'],
				'COUNTRY_ID' => $_POST['tour_country_id'] ?? $tour['COUNTRY_ID'],
			];

			$this->tourDatabase->update($dataUpdate);
		}
	}
}