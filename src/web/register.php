<?php

require_once 'functions.php';

$db = get_db();

$user = [
    'login' => null,
    'password' => null,
    'email' => null,
    '_id' => null
];
$log = 0;
$ema = 0;
$checkpassword = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['password'] == $_POST['password2']){
        $query = [
            'login' => $_POST['login']
        ];
        $query2 = [
            'email' => $_POST['email']
        ];
        
        if(finddbOneuser($db, $query)){
        }
        else{
            $log = 1;
        }
        if(finddbOneuser($db, $query2)){
        }
        else{
            $ema = 1;
        }
        if($log == 1 && $ema == 1){
            insertdatabaseuser($db);
            header("Location: ./views/succesfull-view.php");
            exit;
        }
    }
    else{
        $checkpassword = 0;
    }
    
}

include './views/register-view.php';
?>
