<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <?php require_once 'backend/config.php'; ?>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <div class="navbar">
        <img src="img/logo-big-v4.png" alt="">
        <div class="menu">
            <a href="index.html">HOME</a>
            <a href="login.html">LOG IN</a>
        </div>
    </div>

    <div class="container">
        <h2>INLOGGEN</h2>
        <form action="dashboard.html" method="POST">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" required>

            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <div class="buttons">
                <button type="button" onclick="window.location.href='register.html'">account maken</button>
                <button type="submit">log in</button>
            </div>
        </form>
    </div>

</body>
</html>
