<!DOCTYPE html>
<html>
    <head>
        <title>Logowanie</title>
    </head>
    <body>
    
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):?>
        <?php if ($log == 0):?>
            istnieje już użytkownik o takim loginie<br>
        <?php endif;?>
        <?php if ($ema == 0):?>
            istnieje juz konto o takim email<br>
        <?php endif;?>
        <?php if ($checkpassword == 0):?>
            hasła się nie zgadzają<br>
        <?php endif;?>
    <?php endif; ?>
        <form method="POST" action="register.php">
            <input type="text" name="login" placeholder="Login" required><br>
            <input type="email" name="email" placeholder="E-mail" required><br>
            <input type="password" name="password" placeholder="Hasło" required><br>
            <input type="password" name="password2" placeholder="Powtórz Hasło" required><br>
            <input type="submit" name="submit" value="Wyślij">
        </form>
        <a href="index.php">anuluj</a>
    </body>
</html>