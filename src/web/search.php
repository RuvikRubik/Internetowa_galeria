<?php


require_once 'functions.php';
session_start();


$db = get_db();
$pageSize = 3;
$totalpages = ceil($db->images->count() / $pageSize);


if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   $currentpage = (int) $_GET['currentpage'];
} else {
   $currentpage = 1;
}

    $opts = [
        'skip' => ($currentpage - 1) * $pageSize,
        'limit' => $pageSize
        ];


$images = finddb($db,$opts);

$imagesarray = array();
foreach ($images as $image):
   $imagesarray[] = $image;
endforeach;



include './views/search-view.php'
?>