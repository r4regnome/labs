<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/tours.php';

class TourDeleteModule
{
	private $tourDatabase;

	public function __construct()
	{
		$this->tourDatabase = new Tours();
	}

	public function deleteCountry()
	{
		if (isset($_POST['tour_id']) && $_POST['tour_id'] > 0)
		{
			$tour = $this->tourDatabase->getById($_POST['tour_id']);
			if (isset($tour['IMAGE']) && $tour['IMAGE'] != '' && file_exists($_SERVER['DOCUMENT_ROOT'] . $tour['IMAGE']))
			{
				unlink($_SERVER['DOCUMENT_ROOT'] . $tour['IMAGE']);
			}

			$this->tourDatabase->deleteById($_POST['tour_id']);
		}
	}
}