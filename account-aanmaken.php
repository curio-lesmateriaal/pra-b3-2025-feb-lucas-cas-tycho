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

    <header>
        <div class="navbar">
            <div class="menu">
                <a href="inlog-page.php">klantenservice</a>
            </div>
            <img src="img/logo-big-v4.png" alt="LOGO">
            <div class="menu">
                <a href="index.php">HOME</a>
                <a href="inlog-page.php">INLOGGEN</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h2>account aanmaken</h2>
        <form action="dashboard.html" method="POST">
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="naam" required>

            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <div class="buttons">
                <a type="button" href="inlog-page.php">inloggen</a>
                <a type="submit" href="kanban-bord.php">log in</a>
            </div>
        </form>
    </div>

</body>

</html>