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
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../../config/conn.php';
$query = "SELECT * FROM taken"; // Removed WHERE is_deleted = 0
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
                                    <h3><?php echo $task['titel']; ?></h3>
                                    <p class="afdeling">Afdeling: <?php echo $task['afdeling']; ?></p>
                                </div>
                                <div class="task-actions">
                                    <!-- Edit Button -->
                                    <button data-modal-target="#modal-edit-<?php echo $task['id']; ?>" class="edit-button">✎</button>
                                    <!-- Delete Button -->
                                    <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingcontroller.php" method="POST"
                                        onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                        <input type="submit" value="✖" class="delete-button">
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <button data-modal-target="#modal-todo" class="add-task">+</button>

                <!-- Add Task Modal -->
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
                                <select name="afdeling" id="afdeling" class="form-input" type="text" required>
                                    <option value=""></option>
                                    <option value="Personeel">Personeel</option>
                                    <option value="Horeca">Horeca</option>
                                    <option value="Techniek">Techniek</option>
                                    <option value="Inkoop">Inkoop</option>
                                    <option value="Klantenservice">Klantenservice</option>
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

                <!-- Edit Task Modal for each task -->
                <?php foreach ($tasks as $task): ?>
                    <?php if ($task['status'] === 'Todo'): ?>
                        <form action="<?php echo $base_url; ?>/app/Http/Controllers/meldingcontroller.php" method="POST">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <div class="modal" id="modal-edit-<?php echo $task['id']; ?>">
                                <div class="modal-header">
                                    <h2>taak bewerken</h2>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <label for="titel-<?php echo $task['id']; ?>">taak naam</label>
                                        <input type="text" id="titel-<?php echo $task['id']; ?>" name="titel" value="<?php echo $task['titel']; ?>" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="beschrijving-<?php echo $task['id']; ?>">taak info</label>
                                        <textarea id="beschrijving-<?php echo $task['id']; ?>" name="beschrijving" style="width: 300px; height: 100px; resize: none;" required><?php echo $task['beschrijving']; ?></textarea>
                                    </div>
                                    <label for="afdeling-<?php echo $task['id']; ?>">Afdeling:</label>
                                    <div class="afdeling-select">
                                        <select name="afdeling" id="afdeling-<?php echo $task['id']; ?>" class="form-input">
                                            <option value="" <?php echo $task['afdeling'] == '' ? 'selected' : ''; ?>></option>
                                            <option value="Personeel" <?php echo $task['afdeling'] == 'Personeel' ? 'selected' : ''; ?>>Personeel</option>
                                            <option value="Horeca" <?php echo $task['afdeling'] == 'Horeca' ? 'selected' : ''; ?>>Horeca</option>
                                            <option value="Techniek" <?php echo $task['afdeling'] == 'Techniek' ? 'selected' : ''; ?>>Techniek</option>
                                            <option value="Inkoop" <?php echo $task['afdeling'] == 'Inkoop' ? 'selected' : ''; ?>>Inkoop</option>
                                            <option value="Klantenservice" <?php echo $task['afdeling'] == 'Klantenservice' ? 'selected' : ''; ?>>Klantenservice</option>
                                            <option value="Groen" <?php echo $task['afdeling'] == 'Groen' ? 'selected' : ''; ?>>Groen</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="status-<?php echo $task['id']; ?>">Status:</label>
                                        <select name="status" id="status-<?php echo $task['id']; ?>" class="form-input">
                                            <option value="Todo" <?php echo $task['status'] == 'Todo' ? 'selected' : ''; ?>>To Do</option>
                                            <option value="In Progress" <?php echo $task['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                            <option value="Done" <?php echo $task['status'] == 'Done' ? 'selected' : ''; ?>>Done</option>
                                        </select>
                                    </div>
                                   
                                    <div class="buttons task-buttons">
                                        <button type="button" class="task-button" data-close-button>Cancel</button>
                                        <button type="submit" class="task-button">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endforeach; ?>
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

    <script src="../../../js/add-task.js"></script>
</body>

</html>