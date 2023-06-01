<!DOCTYPE html>
<html>
<head>
    <title>Dodaj</title>
    <!-- <link rel="stylesheet" href="styles.css"/> -->
</head>
<body>
    <?php if($uploadOk == 0):?>
    Przepraszam plik już istnieje.<br>
    <?php endif; ?>
    <?php if($sizeOk == 0):?>
    Przepraszam plik jest za duży.<br>
    <?php endif; ?>
    <?php if($typeOk == 0):?>
    Przepraszam dozwolone są tylko pliki jpg i png.<br>
    <?php endif; ?>
    <?php if($imageOk == 0):?>
    Przepraszam plik nie jest zdjęciem.<br>
    <?php endif; ?>
    

    <form action="../add.php" method="post" enctype="multipart/form-data">
    <input type="text" name="tytul" id="tytul" placeholder="Tytuł" required><br>
    <input type="text" name="autor" id="autor" placeholder="Autor" required><br>
    <input type="text" name="znakwodny" id="znakWodny" placeholder="Znak Wodny" required><br>
    Wybierz obraz do przesłania:<br> <input type="file" name="file" id="fileToUpload" required><br>
    <input type="submit" value="Upload Image" name="submit">
    </form>
    <a href="../index.php">anuluj</a>


</body>
</html>
