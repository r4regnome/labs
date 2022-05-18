<?php

require_once 'countries_action.php';

require $_SERVER['DOCUMENT_ROOT'] . '/header.php';

if (isset($_POST['action']) && $_POST['action'] == 'countries_delete')
    CountriesActions::delete();

$listCountries = CountriesActions::getList();

$data = [
    'COUNTRIES' => $listCountries
];

require 'list_front.php';

require $_SERVER['DOCUMENT_ROOT'] . '/footer.php';

