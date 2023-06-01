<?php

require '../../vendor/autoload.php';


function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function sesionend(){
    $_SESSION["ID"] = null;
}

function finddb($db, $query){
   return $db->images->find([],$query);
}

function finddbOne($db, $query){
    return $db->images->findOne($query);
}

function finddbOneuser($db, $query){
    return $db->users->findOne($query);
}

function createminiature($target_file,$name,$imageFileType){
            if($imageFileType == "jpg"){
                $source = imagecreatefromjpeg($target_file);
            }
            else if($imageFileType == "png"){
                $source = imagecreatefrompng($target_file);
            }

            list($width, $height) = getimagesize($target_file);
            
            $destination = imagecreatetruecolor(200, 125);
            imagecopyresampled($destination, $source, 0, 0, 0, 0, 200, 125, $width, $height);
            imagejpeg($destination, "img/miniature/$name", 100);


            $watermarkColor = imagecolorallocate($source, 255, 255, 255);
            $fontSize = 50;
            $widthS = imagesx($source);
            $heightS = imagesy($source);
            $fontFile = "font/arial.ttf";

            $sizeT = imagettfbbox($fontSize, 0, $fontFile, $_POST['znakwodny']);
            $widthT = max([$sizeT[2], $sizeT[4]]) - min([$sizeT[0], $sizeT[6]]);
            $heightT = max([$sizeT[5], $sizeT[7]]) - min([$sizeT[1], $sizeT[3]]);

            $posX = CEIL(($widthS - $widthT) / 2);
            $posY = CEIL(($heightS - $heightT) / 2);

            imagettftext($source, $fontSize, 0, $posX, $posY, $watermarkColor, $fontFile, $_POST['znakwodny']);
           
            imagejpeg($source, "img/watermark/$name", 100);
}

function insertdatabase($name,$db){
    $image = [
        'tittle' => $_POST['tytul'],
        'autor' => $_POST['autor'],
        'url' => $name
    ];
    $db->images->insertOne($image);
}

function insertdatabaseuser($db){
    $user = [
        'login' => $_POST['login'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'email' => $_POST['email']
    ];
    $db->users->insertOne($user);
}