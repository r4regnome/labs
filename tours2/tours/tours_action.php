<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database/tours_table.php';

class ToursActions
{
    public static function create()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD'])
            return false;

        if (!isset($_POST['action']) || $_POST['action'] != 'tours_create')
            return false;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
        {
            $newPathForFile = $_SERVER['DOCUMENT_ROOT'] . '/images/tours/' . $_FILES['image']['name'];
            if (file_exists($newPathForFile))
            {
                unlink($newPathForFile);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $newPathForFile);
            $newPathForFile = str_replace($_SERVER['DOCUMENT_ROOT'], '', $newPathForFile);
        }

        $tourId = ToursTable::add([
            'NAME' => $_POST['name'] ?? '',
            'IMAGE' => $newPathForFile ?? '',
            'DESCRIPTION' => $_POST['description'] ?? '',
            'PRICE' => $_POST['price'] ?? '',
            'COUNTRY_ID' => $_POST['country_id'] ?? '',
        ]);

        if(!$tourId)
            return false;

        return $tourId;
    }
    public static function update()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD'])
            return false;

        if (!isset($_POST['action']) || $_POST['action'] != 'tours_update')
            return false;

        if (!isset($_POST['id']) || intval($_POST['id']) == 0)
            return false;

        $tour = ToursTable::getById($_POST['id']);

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
        {
            if (isset($tour['IMAGE']) && strlen($tour['IMAGE']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $tour['IMAGE']))
            {
                unlink($_SERVER['DOCUMENT_ROOT'] . $tour['IMAGE']);
            }
            $newPathForFile = $_SERVER['DOCUMENT_ROOT'] . '/images/tours/' . $_FILES['image']['name'];
            if (file_exists($newPathForFile))
            {
                unlink($newPathForFile);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $newPathForFile);
            $newPathForFile = str_replace($_SERVER['DOCUMENT_ROOT'], '', $newPathForFile);
        }
        
        ToursTable::update([
            'ID' => $_POST['id'],
            'NAME' => $_POST['name'] ?? '',
            'IMAGE' => $newPathForFile ?? $tour['IMAGE'],
            'DESCRIPTION' => $_POST['description'] ?? '',
            'PRICE' => $_POST['price'] ?? '',
            'COUNTRY_ID' => $_POST['country_id'] ?? '',
        ]);
        return true;
    }
    public static function delete()
    {
        if ('POST' != $_SERVER['REQUEST_METHOD'])
            return false;

        if (!isset($_POST['action']) || $_POST['action'] != 'tours_delete')
            return false;

        if (!isset($_POST['id']) ||  intval($_POST['id']) == 0)
            return false;

        ToursTable::deleteById($_POST['id']);
        return true;
    }
    public static function getList()
    {
        return ToursTable::getList();
    }

    public static function getToursByCountryId($countryId)
    {
        return ToursTable::getToursByCountryId($countryId);
    }

}