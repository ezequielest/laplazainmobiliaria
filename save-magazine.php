<?php

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

date_default_timezone_set('UTC');

include_once('./class/db.class.php');
include_once('./class/magazines.class.php');

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

if ($_POST['name'] && $_POST['description']) {
    $magazine = new Magazine();
    $magazine->setName($_POST['name']);
    $magazine->setDescription($_POST['description']);
    $magazine->setCategoryId($_POST['category_id']);
    $magazine->setRelevantMonth($_POST['relevant_month']);
    $magazine->setEnabled($_POST['enabled']);
    $magazine->save();

    header('Location: /laplazainmobiliaria');


}

?>