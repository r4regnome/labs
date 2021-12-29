<?php

require $_SERVER['DOCUMENT_ROOT'] . '/header.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/tour_list/tour_list__module.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/tour_create/tour_create__module.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/tour_update/tour_update__module.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/tour_delete/tour_delete__module.php';

$tourCreateModule = new TourCreateModule();
$tourUpdateModule = new TourUpdateModule();
$tourListModule = new TourListModule();
$tourDeleteModule = new TourDeleteModule();


switch ($_POST['action'] ?? '')
{
	case 'add':
		$tourCreateModule->createTour();
		break;
	case 'update':
		$tourUpdateModule->updateTour();
		break;
	case 'delete':
		$tourDeleteModule->deleteCountry();
		break;
}

switch ($_GET['page'] ?? '')
{
	case 'add':
		$tourCreateModule->executeAndShow();
		break;
	case 'update':
		$tourUpdateModule->executeAndShow();
		break;
	case 'list':
	default:
		$tourListModule->executeAndShow();
		break;
}

require $_SERVER['DOCUMENT_ROOT'] . '/footer.php';