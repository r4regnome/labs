<?php

require_once 'tours_action.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/countries/countries_action.php';

require $_SERVER['DOCUMENT_ROOT'] . '/header.php';

if (isset($_POST['action']) && $_POST['action'] == 'tours_delete')
    ToursActions::delete();

if (isset($_GET['country_id']) && intval($_GET['country_id'])) {
    $listTours = ToursActions::getToursByCountryId($_GET['country_id']);
} else {
    $listTours = ToursActions::getList();
}
$listCountries = CountriesActions::getList();

$data = [
    'TOURS' => $listTours,
    'COUNTRIES' => $listCountries,
];

require 'list_front.php';

require $_SERVER['DOCUMENT_ROOT'] . '/footer.php';