<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/countries_table.php';

class CountriesActions
{
    public static function create()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD'])
            return false;

        if (!isset($_POST['action']) || $_POST['action'] != 'countries_create')
            return false;

        if (!isset($_POST['name']) || strlen($_POST['name']) == 0)
            return false;

        $countriesId = CountriesTable::add([
            'NAME' => $_POST['name']
        ]);

        if (!$countriesId)
            return false;

        return $countriesId;
    }
    public static function update()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD'])
            return false;

        if (!isset($_POST['action']) || $_POST['action'] != 'countries_update')
            return false;

        if (!isset($_POST['id']) || intval($_POST['id']) == 0)
            return false;

        if (!isset($_POST['name']) || strlen($_POST['name']) == 0)
            return false;

        $result = CountriesTable::update([
            'ID' => $_POST['id'],
            'NAME' => $_POST['name'],
        ]);
        if (!$result)
            return false;

        return true;
    }
    public static function delete()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD'])
            return false;

        if (!isset($_POST['action']) || $_POST['action'] != 'countries_delete')
            return false;

        if (!isset($_POST['id']) ||  intval($_POST['id']) == 0)
            return false;

        $result = CountriesTable::deleteById($_POST['id']);

        if (!$result)
            return false;

        return true;
    }
    public static function getList()
    {
        return CountriesTable::getList();
    }
}
