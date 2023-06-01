<?php
session_start();
if(isset($_POST['id'])){
$kategorie = $_POST['id'];
}
if(isset($_POST['id2'])){
$kategorie2 = $_POST['id2'];

foreach($kategorie2 as $x => $value){
    if (array_key_exists($x, $_SESSION["image"])) {
        unset($_SESSION["image"][$x]);
    }
}}

if(isset($_SESSION['ID'])){
if(isset($_SESSION['image'])){
    $temp = array_merge($_SESSION["image"],$kategorie);
    $_SESSION["image"] = $temp;
}
else{
    $_SESSION["image"] = $kategorie;
}
}
echo "<a href=\"index.php\">wróc</a>";
?>