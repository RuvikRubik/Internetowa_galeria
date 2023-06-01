<!DOCTYPE html>
<html>
    <head>
        <title>Logowanie</title>
    </head>
    <body>
        <?php if ($error == 1):?>
            złe hasło lub login
        <?php endif;?>
        <?php if (isset($_SESSION['ID'])):?>
        Pomyślnie zalogowano <a href="../index.php">wróc</a>
        <?php else:?>

        <form method="POST" action="login.php">
            <input type="text" name="login" placeholder="Login" required><br>
            <input type="password" name="password" placeholder="Hasło" required><br>
            <input type="submit" name="submit" value="Wyślij">
        </form>
        <a href="index.php">anuluj</a>
        <?php endif;?>
    </body>
</html>