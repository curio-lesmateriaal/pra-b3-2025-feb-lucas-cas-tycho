<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'backend/config.php'; ?>
    <title>Home</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <header>
        <div class="navbar">
            <div class="menu">
            <select name="Afdeling" id="Afdeling" class="afdeling-select">
                <option value="klantenservice">- personeell -</option>
                <option value="afdeling1">- horeca -</option>
                <option value="afdeling2">- techniek -</option>
                <option value="afdeling3">- inkoop -</option>
                <option value="afdeling4">- klantenservice -</option>
                <option value="afdeling5">- groen -</option>
            </select>
        </div>
            <img src="img/logo-big-v4.png" alt="LOGO">
            <div class="menu">
                <a href="index.php">HOME</a>
                <a href="inlog-page.php">INLOGGEN</a>
            </div>
        </div>
    </header>

    <div class="container">
        <img src="img/logo-big-v3.png" alt="LOGO">
        <div class="menu">
            <a href="kanban-bord.php">naar kanban-bord</a>
            </menu>
        </div>

</body>

</html>