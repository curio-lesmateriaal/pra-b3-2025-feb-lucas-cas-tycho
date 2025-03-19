<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../../../backend/config.php'; ?>
    <title>Kanban Bord</title>
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>

<body>

    <header>
        <?php require_once '../components/header.php'; ?>
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
                    <div class="task">Taak 3 <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingenController.php" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $melding['ID']; ?>">
                            <input type="submit" class="delete-task" value="✖">
                        </form>
                    </div>
                </div>
                <button data-modal-target="#modal-todo" class="add-task">+</button>
                <div class="modal" id="modal-todo">
                    <div class="modal-header">
                        <h2>taak maken</h2>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="name">taak naam</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="input-group">
                            <label for="taskInfoTodo">taak info</label>
                            <textarea id="taskInfoTodo" name="taskInfoTodo" style="width: 300px; height: 100px; resize: none;" required></textarea>
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
            </div>
            <div class="kanban-column">
                <div class="title">
                    <h2>DONE</h2>
                </div>
                <div class="tasks-container">
                </div>

            </div>
            <div id="overlay"></div>
        </div>
    </div>
    </div>

    <script src="../../../js/add-task.js"></script>
</body>

</html>