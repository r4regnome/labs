<?php

require_once 'tours_action.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/tours_table.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries_table.php';
require $_SERVER['DOCUMENT_ROOT'] . '/header.php';

$actionGet = $_GET['action'] ?? 'tours_create';
$actionPost = $_POST['action'] ?? '';

switch ($actionPost)
{
    case 'tours_create':
        ToursActions::create();
        header('Location: /tours/list.php');
        break;
    case 'tours_update':
        ToursActions::update();
        header('Location: /tours/list.php');
        break;
}

switch ($actionGet)
{
    case 'tours_create':
        $title = 'Добавление тура';
        break;
    case 'tours_update':

        if (isset($_GET['id']) && intval($_GET['id']) > 0)
            $fieldsToursForUpdate = ToursTable::getById($_GET['id']);
        $title = 'Редактирование тура';
        break;
}


$countries = CountriesTable::getList();

$data =
    [
        'COUNTRIES' => $countries,
        'ACTION' => $actionGet,
        'TITLE' => $title ?? '',
        'FIELDS_TOURS_FOR_UPDATE' => $fieldsToursForUpdate ?? [],
    ];



require 'action_front.php';

require $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
