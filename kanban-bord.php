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
                </div>
                <button data-modal-target="#modal-todo" class="add-task">+</button>
                <div class="modal" id="modal-todo">
                    <div class="modal-header">
                        <h2>taak maken</h2>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="add-task-todo">taak naam</label>
                            <input type="text" id="add-task-todo" name="add-task-todo" required>
                        </div>
                        <div class="input-group">
                            <label for="task-info-todo">taak info</label>
                            <textarea id="task-info-todo" name="task-info-todo" style="width: 300px; height: 100px; resize: none;" required></textarea>
                        </div>
                        <div class="buttons task-buttons">
                            <button type="button" class="task-button" data-close-button>Cancel</button>
                            <button type="submit" class="task-button">Add Task</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-column">
                <div class="title">
                    <h2>IN PROGRESS</h2>
                </div>
                <div class="tasks-container">
                </div>
                <button data-modal-target="#modal-inprogress" class="add-task">+</button>
                <div class="modal" id="modal-inprogress">
                    <div class="modal-header">
                        <h2>taak maken</h2>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="add-task-inprogress">taak naam</label>
                            <input type="text" id="add-task-inprogress" name="add-task-inprogress" required>
                        </div>
                        <div class="input-group">
                            <label for="task-info-inprogress">taak info</label>
                            <textarea id="task-info-inprogress" name="task-info-inprogress" style="width: 300px; height: 100px; resize: none;" required></textarea>
                        </div>
                        <div class="buttons task-buttons">
                            <button type="button" class="task-button" data-close-button>Cancel</button>
                            <button type="submit" class="task-button">Add Task</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-column">
                <div class="title">
                    <h2>DONE</h2>
                </div>
                <div class="tasks-container">
                </div>
                <button data-modal-target="#modal-done" class="add-task">+</button>
                <div class="modal" id="modal-done">
                    <div class="modal-header">
                        <h2>taak maken</h2>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="add-task-done">taak naam</label>
                            <input type="text" id="add-task-done" name="add-task-done" required>
                        </div>
                        <div class="input-group">
                            <label for="task-info-done">taak info</label>
                            <textarea id="task-info-done" name="task-info-done" style="width: 300px; height: 100px; resize: none;" required></textarea>
                        </div>
                        <div class="buttons task-buttons">
                            <button type="button" class="task-button" data-close-button>Cancel</button>
                            <button type="submit" class="task-button">Add Task</button>
                        </div>
                    </div>
                </div>
                <div id="overlay"></div>
            </div>
        </div>
    </div>

    <script src="js/add-task.js"></script>
</body>

</html>