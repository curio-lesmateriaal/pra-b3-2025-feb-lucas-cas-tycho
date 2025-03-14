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
<body>
    <header>
        <div class="navbar">
            <div class="menu">
                <a href="inlog-page.php">klantenservice</a>
            </div>
            <button class="project">...</button>
            <img src="img/logo-big-v4.png" alt="LOGO">
            <div class="menu">
                <a href="index.php">HOME</a>
                <a href="inlog-page.php">INLOGGEN</a>
            </div>
        </div>
    </header>

    <div class="kanban-container">
        <div class="kanban-board">
            <div class="kanban-column">
                <div class="title">
                    <h2>TO DO</h2>
                </div>
                <div class="tasks-container">
                    <div class="task">Taak 1 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 2 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 3 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 4 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 5 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 6 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 7 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 8 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 9 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 10 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 11 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 12 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 13 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 14 <span class="delete-task">✖</span></div>
                    <div class="task">Taak 15 <span class="delete-task">✖</span></div>
                </div>
                <button class="add-task">+</button>
            </div>
            <div class="kanban-column">
                <div class="title">
                    <h2>in progress</h2>
                </div>
                <div class="tasks-container">
                </div>
                <button class="add-task">+</button>
            </div>
            <div class="kanban-column">
                <div class="title">
                    <h2>DONE</h2>
                </div>
                <div class="tasks-container">
                </div>
                <button class="add-task">+</button>
            </div>
        </div>
    </div>
</body>
</html>