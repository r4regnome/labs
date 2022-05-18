<?php

require_once 'countries_action.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries_table.php';
require $_SERVER['DOCUMENT_ROOT'] . '/header.php';

$actionGet = $_GET['action'] ?? 'countries_create';
$actionPost = $_POST['action'] ?? '';

switch ($actionPost)
{
    case 'countries_create':
        CountriesActions::create();
        header('Location: /countries/list.php');
        break;
    case 'countries_update':
        CountriesActions::update();
        header('Location: /countries/list.php');
        break;
}

switch ($actionGet)
{
    case 'countries_create':
        $title = 'Добавление страны';
        break;
    case 'countries_update':

        if (isset($_GET['id']) && intval($_GET['id']) > 0);
            $fieldsCountriesForUpdate = CountriesTable::getById($_GET['id']);
        $title = 'Редактирование страны';
        break;
}


$data =
    [
        'ACTION' => $actionGet,
        'TITLE' => $title ?? '',
        'FIELDS_COUNTRIES_FOR_UPDATE' => $fieldsCountriesForUpdate ?? [],
    ];

require 'action_front.php';

require $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
