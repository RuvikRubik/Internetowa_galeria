<?php if(count($imagesarray)):?>
  <table> 
        <tr><td>Zdjęcie</td><td>Autor</td><td>Tytuł</td><td>Zapamiętaj</td></tr>
            <?php foreach($imagesarray as $image):?>
                <tr>
                    <td>
                    <a href="img/watermark/<?php echo $image['url']; ?>"><img src="img/miniature/<?php echo $image['url']; ?>" ></a>
                    </td>
                    <td><?php echo $image['autor'] ?></td>
                    <td><?php echo$image['tittle']; ?></td>
                    <td><input type='checkbox' name='id' data-id="<?php echo $image['_id']; ?>"></td>
                </tr>
            <?php endforeach;?>
    </table>
<?php else: ?>
    Brak pasujących zdjęć
<?php endif ?>