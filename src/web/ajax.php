<?php


require_once 'functions.php';
session_start();

$db = get_db();
$imagesarray = array();
$findtext = $_GET['search'];
$query = [
    'tittle' => $findtext,
];
$find = $db->images->find($query);

foreach ($find as $image):
   $imagesarray[] = $image;
endforeach;

include './views/ajax-view.php'
?>