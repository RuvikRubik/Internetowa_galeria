<?php

use MongoDB\Operation\DeleteMany;

require_once 'functions.php';

 $db = get_db();
//$db->images->deleteMany([]);
// header('Location: index.php');

foreach($db->users->find() as $user){
    echo $user['login'].' '.$user['email'].' '.$user['password'].'<br>';
}
?>
