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
    <?php require_once 'resources/views/components/header.php'; ?>
    </header>

    <div class="container">
        <img src="img/logo-big-v3.png" alt="LOGO">
        <div class="menu">
            <a href="resources/views/meldingen/kanban-bord.php">naar kanban-bord</a>
            </menu>
        </div>
    </div>
</body>

</html>