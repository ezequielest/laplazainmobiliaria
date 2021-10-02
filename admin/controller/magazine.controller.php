<?php

date_default_timezone_set('UTC');

include_once('../../class/db.class.php');
include_once('../../models/magazine.class.php');
include_once('../../class/magazines-crud.class.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

if (isset($_POST['action'])) {
    /** by post come create and edit */
    $currentAction = $_POST['action'];
} else if (isset($_GET['action'])) {
    /** by get come delete */
    $currentAction = $_GET['action'];
} else {
    header('location: /');
}

switch ($currentAction) {
    case 'create':
        $magazine = new Magazine();
        $magazine->setName($_POST['name']);
        $magazine->setDescription($_POST['description']);
        $magazine->setCategoryId($_POST['category_id']);
        $magazine->setRelevantMonth($_POST['relevant_month']);
        //$magazine->setEnabled($_POST['enabled']);

        $magazineCrud = new MagazineCrud();
        $magazineCrud->save($magazine);
        header('Location: /laplazainmobiliaria');
        break;
    case 'edit':

        $magazineCrud = new MagazineCrud();
        $magazine = $magazineCrud->getById($_POST['id']);
        $magazine->setName($_POST['name']);
        $magazine->setDescription($_POST['description']);
        $magazine->setCategoryId($_POST['category_id']);
        $magazine->setRelevantMonth($_POST['relevant_month']);
       // $magazine->setEnabled($_POST['enabled']);

        $magazineCrud->update($magazine);
        //header('Location: /laplazainmobiliaria/admin/view-magazines.php');
        break;
    case 'delete':
        echo 'deleting';
        echo $_GET['id'];
        break;
    default:
        header('Location: /laplazainmobiliaria/admin/view-magazines.php');
        break;
}


    

?>