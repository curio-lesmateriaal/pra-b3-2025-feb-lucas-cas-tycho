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

    <div class="navbar">
        <a href="index.php">HOME</a>
        <a href="inlog-page.php">LOG IN</a>
    </div>

    <div class="container">
        <img src="img/logo-big-v3.png" alt="">
        <button class="button" onclick="window.location.href='kanban-bord.php'">naar kanban-bord</button>
    </div>

</body>
</html>