<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../../../config/config.php'; ?>
    <title>Kanban Bord</title>
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>

<?php
require_once '../../../config/conn.php';
$query = "SELECT * FROM taken ";
$statement = $conn->prepare($query);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

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

                    <?php foreach ($tasks as $task): ?>
                        <?php if ($task['status'] === 'Todo'): ?>
                            <div class="task">
                                <div class="task-top">
                                    <h1><?php echo $task['titel']; ?></h1>
                                </div>

                                <p>Afdeling: <?php echo $task['afdeling']; ?></p>
                                <!-- <p>Beschrijving: <?php echo $task['beschrijving']; ?></p> -->
                                <!-- <p>deadline: <?php echo $task['deadline']; ?></p> -->

                                <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingcontroller.php" method="POST"
                                    onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                    <input type="submit" value="✖" class="delete-button">
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    </form>

                </div>
            </div>
            <button data-modal-target="#modal-todo" class="add-task">+</button>

            <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingcontroller.php" method="POST">

                <input type="hidden" name="action" value="create">

                <div class="modal" id="modal-todo">
                    <div class="modal-header">
                        <h2>taak maken</h2>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="titel">taak naam</label>
                            <input type="text" id="titel" name="titel" required>
                        </div>
                        <div class="input-group">
                            <label for="beschrijving">taak info</label>
                            <textarea id="beschrijving" name="beschrijving" style="width: 300px; height: 100px; resize: none;" required></textarea>
                        </div>
                        <label for="input-group">Afdeling:</label>
                        <div class="afdeling-select">
                            <select name="afdeling" id="afdeling" class="form-input">
                                <option value=""></option>
                                <option value="Personeel">Personeel</option>
                                <option value="Horeca">Horeca</option>
                                <option value="Techniek">Techniek</option>
                                <option value="Inkoop">Inkoop</option>
                                <option value="Klantenservice">Klantenservice </option>
                                <option value="Groen">Groen</option>
                            </select>
                        </div>
                        <div class="buttons task-buttons">
                            <button type="button" class="task-button" data-close-button>Cancel</button>
                            <button type="submit" value="Verstuur melding" class="task-button">Add Task</button>
                        </div>
                    </div>
                </div>
            </form>
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