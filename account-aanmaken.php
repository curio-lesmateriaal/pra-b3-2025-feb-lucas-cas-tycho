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
            <a href="index.php">HOME</a>
            <a href="inlog-page.php">INLOGGEN</a>
        </div>
    </div>

    <div class="container">
        <h2>account aanmaken</h2>
        <form action="dashboard.html" method="POST">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" required>

            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <div class="buttons">
                <button type="button" onclick="window.location.href='inlog-page.php'">inloggen</button>
                <button type="submit" onclick="window.location.href='kanban-bord.php'">log in</button>
            </div>
        </form>
    </div>

</body>
</html>