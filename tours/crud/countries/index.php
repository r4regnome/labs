<?php

require $_SERVER['DOCUMENT_ROOT'] . '/header.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/country_list/country_list__module.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/country_create/country_create__module.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/country_update/country_update__module.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/country_delete/country_delete__module.php';

$countryCreateModule = new CountryCreateModule();
$countryUpdateModule = new CountryUpdateModule();
$countryDeleteModule = new CountryDeleteModule();
$countryListModule = new CountryListModule();


switch ($_POST['action'] ?? '')
{
	case 'add':
		$countryCreateModule->createCountry();
		break;
	case 'update':
		$countryUpdateModule->updateCountry();
		break;
	case 'delete':
		$countryDeleteModule->deleteCountry();
		break;
}

switch ($_GET['page'] ?? '')
{
	case 'add':
		$countryCreateModule->executeAndShow();
		break;
	case 'update':
		$countryUpdateModule->executeAndShow();
		break;
	case 'list':
	default:
		$countryListModule->executeAndShow();
		break;
}



require $_SERVER['DOCUMENT_ROOT'] . '/footer.php';