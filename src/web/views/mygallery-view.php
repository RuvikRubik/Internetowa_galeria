<!DOCTYPE html>
<html>
<head>
    <title>Galeria</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

    <table>
        <tr><td>Zdjęcie</td><td>Autor</td><td>Tytuł</td><td>Zapamiętaj</td></tr>
            <form method="post" action="../save.php">
            <?php foreach($imagesarray as $image):?>
                <tr>
                    <?php if(array_key_exists(strval($image['_id']), $_SESSION["image"])):?>
                    <td>
                    <a href="img/watermark/<?php echo $image['url']; ?>"><img src="img/miniature/<?php echo $image['url']; ?>" ></a>
                    </td>
                    <td><?php echo $image['autor'] ?></td>
                    <td><?php echo$image['tittle']; ?></td>
                        <?php if(isset($_SESSION["image"]) && array_key_exists(strval($image['_id']), $_SESSION["image"])): ?>
                        <td><label><input type='checkbox' name='id[<?php echo $image['_id']; ?>]' checked></label>
                        <label><input type='hidden' name='id2[<?php echo $image['_id']; ?>]' checked></label>
                        <?php else:?>
                        <td><label><input type='checkbox' name='id[<?php echo $image['_id']; ?>]'></label>
                        <?php endif;?>
                    </td>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
    </table>
    <?php for ($x = 1; $x < $totalpages+1; $x++): ?>
        <?php if ($x == $currentpage):?>
            [<b><?php echo $x; ?></b>]
        <?php else: ?>
        <a href='../mygallery.php?currentpage=<?php echo $x ?>'><?php echo $x; ?></a>
    <?php endif; endfor;?><br>
    <input type="submit" name="button1" value="Zapamiętaj wybrane" />
    </form>
    <br>
    <a href="../index.php">wróc</a>
    
        
    
    
</body>
</html>