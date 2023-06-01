<?php
require_once 'functions.php';
$db = get_db();
$uploadOk = 1;
$sizeOk = 1;
$typeOk = 1;
$imageOk = 1;
if($_SERVER['REQUEST_METHOD'] === 'POST') {

$target_dir = "img/normal/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$name = basename($_FILES["file"]["name"]);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    if (file_exists($target_file)) {
        $uploadOk = 0;
      } else {
        if ($_FILES["file"]["size"] > 1000000) {
            $sizeOk = 0;
          }
        if($imageFileType != "jpg" && $imageFileType != "png") {
            $typeOk = 0;
        }
        if($sizeOk == 1 && $typeOk == 1){
            if (!empty($_POST['tytul']) && !empty($_POST['autor']) && !empty($_POST['znakwodny']) && $uploadOk == 1) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
                    insertdatabase($name,$db);
                    createminiature($target_file,$name,$imageFileType);
                    header('Location: index.php');
                    exit;
                }
            }        
        }
      }
  } else {
    $imageOk = 0;
  }
}
}






include './views/add-view.php'
?>