<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Aanmaken</title>
    <?php require_once 'backend/config.php'; ?>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="menu">
                <a href="inlog-page.php">KLANTENSERVICE</a>
            </div>
            <img src="img/logo-big-v4.png" alt="Developer Island" class="logo">
            <div class="menu">
                <a href="index.php">HOME</a>
                <a href="inlog-page.php">INLOGGEN</a>
            </div>
        </div>
    </header>
    <div class="container">
        <h2 class="account-title">account aanmaken</h2>
        <form action="dashboard.html" method="POST" class="account-form">
            <div class="input-stack">
                <div class="input-group">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
                <div class="input-group">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                </div>
            </div>
            <div class="buttons account-buttons">
                <button type="button" class="login-button account-button" onclick="window.location.href='inlog-page.php'">INLOGGEN</button>
                <button type="submit" class="login-button account-button">LOG IN</button>
            </div>
        </form>
    </div>
</body>
</html>