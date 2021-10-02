<?php

date_default_timezone_set('UTC');

include_once('../../class/db.class.php');
include_once('../../models/magazines.class.php');

$method = $_SERVER['REQUEST_METHOD'];

if($method == "OPTIONS") {
    die();
}

if (isset($_POST['action'])) {
    $currentAction = $_POST['action'];

    if ($currentAction == 'create') {
        $magazine = new Magazine();
        $magazine->setName($_POST['name']);
        $magazine->setDescription($_POST['description']);
        $magazine->setCategoryId($_POST['category_id']);
        $magazine->setRelevantMonth($_POST['relevant_month']);
        $magazine->setEnabled($_POST['enabled']);
    
        header('Location: /laplazainmobiliaria');
    }
} else {
    header('location: /');
}

?>