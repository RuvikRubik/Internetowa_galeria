<?php

require_once 'functions.php';

$db = get_db();
$error = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $storlogin = null;
    $storpassword = null;
    $postlogin = $_POST['login'];
	$postpassword = $_POST['password'];
    $query = ['login' => $postlogin];
	$user = finddbOneuser($db, $query);
    $storlogin = $user['login'];
    $storpassword = $user['password'];

    if($postlogin == $storlogin && password_verify($postpassword, $storpassword)){ 
        session_start();
        $_SESSION["ID"] = $user['_id'];
        header("Location:  ./views/succesfull-view.php");
        exit;
    }else{
        $error = 1;
    }
}
include './views/login-view.php';
?>
