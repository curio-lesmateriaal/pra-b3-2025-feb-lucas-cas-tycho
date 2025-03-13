<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'backend/config.php'; ?>
    <title>Kanban Bord</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>



<header>

<div class="navbar">
        <h3>KLANTENSERVICE</h3>
        <button class="button" href='klantenservice.php'></button>
        <img src="img/logo-big-v4.png" alt="LOGO">
        <div class="menu">
            <a href="index.php">HOME</a>
            <a href="inlog-page.php">INLOGGEN</a>
        </div>
    </div>

    <div class="kanban-container">
        <div class="kanban-board">
            <div class="kanban-column">
                <h2>TO DO</h2>
                <div class="task">Taak 1 <span class="delete-task">✖</span></div>
                <div class="task">Taak 2 <span class="delete-task">✖</span></div>
                <div class="task">Taak 3 <span class="delete-task">✖</span></div>
                <button class="add-task">+</button>
            </div>
            <div class="kanban-column">
                <h2>in progress</h2>
                <button class="add-task">+</button>
            </div>
            <div class="kanban-column">
                <h2>DONE</h2>
                <button class="add-task">+</button>
            </div>
        </div>
    </div>
</body>
</html>