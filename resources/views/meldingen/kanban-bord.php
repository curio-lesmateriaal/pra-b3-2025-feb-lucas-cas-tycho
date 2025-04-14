<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/inlog-page.php?msg=je moet eerst inloggen!");
    exit;
}
?>
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
ini_set(option: 'display_errors', value: 1);
ini_set(option: 'display_startup_errors', value: 1);
error_reporting(error_level: E_ALL);

require_once '../../../config/conn.php';
$query = "SELECT * FROM taken ORDER BY deadline DESC"; // Removed WHERE is_deleted = 0

if (!isset($_GET['filter-afdeling'])) {
    $query = "SELECT * FROM taken  ORDER BY deadline DESC";
    $statement = $conn->prepare(query: $query);
    $statement->execute(params: [
        ]);
} else {
    $query = "SELECT * FROM taken WHERE user = :user AND afdeling = :afdeling ORDER BY deadline DESC";
    $statement = $conn->prepare(query: $query);
    $statement->execute(params: [
        ':user' => $_SESSION['user_id'],
        ':afdeling' => $_GET['afdeling']
    ]);
}

// $statement = $conn->prepare($query);
// $statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>

    <?php
    require_once '../../../config/conn.php';
    $query = "SELECT * FROM taken";
    $statement = $conn->prepare($query);
    $statement->execute();
    $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

    ?>


    <header>
        <?php require_once '../components/header.php'; ?>
    </header>
    <select class="afdeling-task" name="afdeling-task" id="afdeling-task">
        <option value="all">Alle Afdelingen</option>
        <option value="zelf">Zelf gemaakt</option>
        <option value="personeel">Personeel</option>
        ,<option value="horeca">Horeca</option>
        <option value="techniek">Techniek</option>
        <option value="inkoop">Inkoop</option>
        <option value="klantenservice">Klantenservice</option>
        <option value="groen">Groen</option>
    </select>

    <div class="kanban-container">
        <div class="filter-container">
            <form action="" method="GET">
                <label for="afdeling">Filter op afdeling:</label>
                <select id="afdeling" onchange="this.form.submit()" name="afdeling" class="form-input">
                <option value="all"></option>
                    <option value="User">User</option>
                    <option value="">Alle afdelingen</option>
                    <option value="Personeel">Personeel</option>
                    <option value="Horeca">Horeca</option>
                    <option value="Techniek">Techniek</option>
                    <option value="Inkoop">Inkoop</option>
                    <option value="Klantenservice">Klantenservice</option>
                    <option value="Groen">Groen</option>
                </select>
            </form>
        </div>
        <div class="kanban-board">
            <!-- TO DO Column -->
            <div class="kanban-column">
                <div class="title">
                    <h2>TO DO</h2>
                </div>
                <div class="tasks-container">
                    <?php foreach ($taken as $task): ?>
                        <?php if ($task['status'] === 'to-do'): ?>
                            <div class="task" data-id="<?php echo $task['id']; ?>">
                                <div class="task-top">
                                    <h3>Title: </Title><?php echo $task['titel']; ?></h3>
                                    <div class="task-info">
                                        <p>Afdeling: <?php echo $task['afdeling']; ?></p>
                                        <p>Deadline: <?php echo $task['deadline']; ?></p>
                                    </div>
                                </div>
                                <div class="task-actions">

                                    <button class="edit" style="background: none; border: none;" data-modal-target="#edit-modal-<?php echo $task['id']; ?>">✎</button>
                                    <form action="../../../app/Http/Controllers/tasksController.php" method="POST">
                                        <div class="modal" id="edit-modal-<?php echo $task['id']; ?>">
                                            <div class="modal-header">
                                                <h2>Taak edite</h2>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <div class="input-group">
                                                    <label for="titel">taak naam</label>
                                                    <input type="text" name="titel" id="titel" style="width: 300px; text-align: left; border: 2px solid #3d3f43f9;" value="<?php echo $task['titel']; ?>" required>
                                                </div>
                                                <div class="input-group">
                                                    <label for="beschrijving">taak info</label>
                                                    <textarea name="beschrijving" style="width: 300px; height: 100px; resize: none;" id="beschrijving" required><?php echo $task['beschrijving']; ?></textarea>
                                                </div>
                                                <div class="input-group">
                                                    <label for="afdeling">Afdeling</label>
                                                    <select class="afdeling-select" name="afdeling" id="afdeling" style="width: 300px; text-align: left; background: transparent; color: white;">
                                                        <option value="personeel" <?php if ($task['afdeling'] == 'personeel') echo 'selected'; ?>>personeel</option>
                                                        <option value="horeca" <?php if ($task['afdeling'] == 'horeca') echo 'selected'; ?>>horeca</option>
                                                        <option value="techniek" <?php if ($task['afdeling'] == 'techniek') echo 'selected'; ?>>techniek</option>
                                                        <option value="inkoop" <?php if ($task['afdeling'] == 'inkoop') echo 'selected'; ?>>inkoop</option>
                                                        <option value="klantenservice" <?php if ($task['afdeling'] == 'klantenservice') echo 'selected'; ?>>klantenservice</option>
                                                        <option value="groen" <?php if ($task['afdeling'] == 'groen') echo 'selected'; ?>>groen</option>
                                                    </select>
                                                </div>
                                                <div class="input-group">
                                                    <label for="status-<?php echo $task['id']; ?>">Status:</label>
                                                    <select class="afdeling-select" name="status" id="status" style="width: 300px; text-align:left;">
                                                        <option value="to-do" <?php if ($task['status'] == 'to-do') echo 'selected'; ?>>Todo</option>
                                                        <option value="in-progress" <?php if ($task['status'] == 'in-progress') echo 'selected'; ?>>In Progress</option>
                                                        <option value="done" <?php if ($task['status'] == 'Done') echo 'selected'; ?>>Done</option>
                                                    </select>
                                                </div>
                                                <div class="buttons task-buttons">
                                                    <button type="button" class="task-button" data-close-button>Cancel</button>
                                                    <button type="submit" name="action" value="update" class="task-button">edit Task</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="overlay"></div>
                                    </form>
                                    <form action="../../../app/Http/Controllers/tasksController.php" method="POST" class="delete-form"

                                        onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                        <input type="submit" value="✖" class="delete-task">
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <button class="add-task" data-modal-target="#add-modal">+</button>
                <form action="../../../app/Http/Controllers/tasksController.php" method="POST">
                    <div class="modal" id="add-modal">
                        <div class="modal-header">
                            <h2>Taak Toevoegen</h2>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <label for="titel">taak naam</label>
                                <input type="text" name="titel" id="titel" required>
                            </div>
                            <div class="input-group">
                                <label for="beschrijving">taak info</label>

                                <textarea name="beschrijving" id="beschrijving" style="width: 300px; height: 100px; resize: none;" required></textarea>
                            </div>
                            <div class="input-group">
                                <label for="afdeling">Afdeling</label>
                                <select class="afdeling-select" name="afdeling" id="afdeling" style="width: 325px; text-align:center;">
                                    <option value="personeel">personeel</option>
                                    <option value="horeca">horeca</option>
                                    <option value="techniek">techniek</option>
                                    <option value="inkoop">inkoop</option>
                                    <option value="klantenservice">klantenservice</option>
                                    <option value="groen">groen</option>
                                </select>
                            </div>

                            <label for="deadline">Start date:</label>
                            <input type="date" id="deadline" name="deadline" min="2025-01-01" max="3000-12-31" required>

                            <div class="buttons task-buttons">
                                <button type="button" class="task-button" data-close-button>Cancel</button>
                                <button type="submit" name="action" value="create" class="task-button">Add Task</button>
                            </div>
                        </div>
                    </div>
                    <div id="overlay"></div>
                </form>
            </div>
            <!-- IN PROGRESS Column -->
            <div class="kanban-column">
                <div class="title">
                    <h2>IN PROGRESS</h2>
                </div>
                <div class="tasks-container">
                    <?php foreach ($taken as $task): ?>
                        <?php if ($task['status'] === 'in-progress'): ?>
                            <div class="task" data-id="<?php echo $task['id']; ?>">
                                <div class="task-top">
                                    <h3>Title: </Title><?php echo $task['titel']; ?></h3>
                                    <div class="task-info">
                                        <p>Afdeling: <?php echo $task['afdeling']; ?></p>
                                        <p>Deadline: <?php echo $task['deadline']; ?></p>
                                    </div>
                                </div>
                                <div class="task-actions">

                                    <button class="edit" style="background: none; border: none;" data-modal-target="#edit-modal-<?php echo $task['id']; ?>">✎</button>
                                    <form action="../../../app/Http/Controllers/tasksController.php" method="POST">
                                        <div class="modal" id="edit-modal-<?php echo $task['id']; ?>">
                                            <div class="modal-header">
                                                <h2>Taak edite</h2>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <div class="input-group">
                                                    <label for="titel">taak naam</label>
                                                    <input type="text" name="titel" id="titel" style="width: 300px; text-align: left; border: 2px solid #3d3f43f9;" value="<?php echo $task['titel']; ?>" required>
                                                </div>
                                                <div class="input-group">
                                                    <label for="beschrijving">taak info</label>
                                                    <textarea name="beschrijving" style="width: 300px; height: 100px; resize: none;" id="beschrijving" required><?php echo $task['beschrijving']; ?></textarea>
                                                </div>
                                                <div class="input-group">
                                                    <label for="afdeling">Afdeling</label>
                                                    <select class="afdeling-select" name="afdeling" id="afdeling" style="width: 300px; text-align: left; background: transparent; color: white;">
                                                        <option value="personeel" <?php if ($task['afdeling'] == 'personeel') echo 'selected'; ?>>personeel</option>
                                                        <option value="horeca" <?php if ($task['afdeling'] == 'horeca') echo 'selected'; ?>>horeca</option>
                                                        <option value="techniek" <?php if ($task['afdeling'] == 'techniek') echo 'selected'; ?>>techniek</option>
                                                        <option value="inkoop" <?php if ($task['afdeling'] == 'inkoop') echo 'selected'; ?>>inkoop</option>
                                                        <option value="klantenservice" <?php if ($task['afdeling'] == 'klantenservice') echo 'selected'; ?>>klantenservice</option>
                                                        <option value="groen" <?php if ($task['afdeling'] == 'groen') echo 'selected'; ?>>groen</option>
                                                    </select>
                                                </div>
                                                <div class="input-group">
                                                    <label for="status-<?php echo $task['id']; ?>">Status:</label>
                                                    <select class="afdeling-select" name="status" id="status" style="width: 300px; text-align:left;">
                                                        <option value="to-do" <?php if ($task['status'] == 'to-do') echo 'selected'; ?>>Todo</option>
                                                        <option value="in-progress" <?php if ($task['status'] == 'in-progress') echo 'selected'; ?>>In Progress</option>
                                                        <option value="done" <?php if ($task['status'] == 'done') echo 'selected'; ?>>Done</option>
                                                    </select>
                                                </div>
                                                <div class="buttons task-buttons">
                                                    <button type="button" class="task-button" data-close-button>Cancel</button>
                                                    <button type="submit" name="action" value="update" class="task-button">edit Task</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="overlay"></div>
                                    </form>
                                    <form action="../../../app/Http/Controllers/tasksController.php" method="POST" class="delete-form"

                                        onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                        <input type="submit" value="✖" class="delete-task">
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- DONE Column -->
            <div class="kanban-column">
                <div class="title">
                    <h2>DONE</h2>
                </div>
                <div class="tasks-container">
                    <?php foreach ($taken as $task): ?>
                        <?php if ($task['status'] === 'done'): ?>
                            <div class="task" data-id="<?php echo $task['id']; ?>">
                                <div class="task-top">
                                    <h3>Title: </Title><?php echo $task['titel']; ?></h3>
                                    <div class="task-info">
                                        <p>Afdeling: <?php echo $task['afdeling']; ?></p>
                                        <p>Deadline: <?php echo $task['deadline']; ?></p>
                                    </div>
                                </div>
                                <div class="task-actions">

                                    <button class="edit" style="background: none; border: none;" data-modal-target="#edit-modal-<?php echo $task['id']; ?>">✎</button>
                                    <form action="../../../app/Http/Controllers/tasksController.php" method="POST">
                                        <div class="modal" id="edit-modal-<?php echo $task['id']; ?>">
                                            <div class="modal-header">
                                                <h2>Taak edite</h2>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <div class="input-group">
                                                    <label for="titel">taak naam</label>
                                                    <input type="text" name="titel" id="titel" style="width: 300px; text-align: left; border: 2px solid #3d3f43f9;" value="<?php echo $task['titel']; ?>" required>
                                                </div>
                                                <div class="input-group">
                                                    <label for="beschrijving">taak info</label>
                                                    <textarea name="beschrijving" style="width: 300px; height: 100px; resize: none;" id="beschrijving" required><?php echo $task['beschrijving']; ?></textarea>
                                                </div>
                                                <div class="input-group">
                                                    <label for="afdeling">Afdeling</label>
                                                    <select class="afdeling-select" name="afdeling" id="afdeling" style="width: 300px; text-align: left; background: transparent; color: white;">
                                                        <option value="personeel" <?php if ($task['afdeling'] == 'personeel') echo 'selected'; ?>>personeel</option>
                                                        <option value="horeca" <?php if ($task['afdeling'] == 'horeca') echo 'selected'; ?>>horeca</option>
                                                        <option value="techniek" <?php if ($task['afdeling'] == 'techniek') echo 'selected'; ?>>techniek</option>
                                                        <option value="inkoop" <?php if ($task['afdeling'] == 'inkoop') echo 'selected'; ?>>inkoop</option>
                                                        <option value="klantenservice" <?php if ($task['afdeling'] == 'klantenservice') echo 'selected'; ?>>klantenservice</option>
                                                        <option value="groen" <?php if ($task['afdeling'] == 'groen') echo 'selected'; ?>>groen</option>
                                                    </select>
                                                </div>
                                                <div class="input-group">
                                                    <label for="status-<?php echo $task['id']; ?>">Status:</label>
                                                    <select class="afdeling-select" name="status" id="status" style="width: 300px; text-align:left;">
                                                        <option value="to-do" <?php if ($task['status'] == 'to-do') echo 'selected'; ?>>Todo</option>
                                                        <option value="in-progress" <?php if ($task['status'] == 'in-progress') echo 'selected'; ?>>In Progress</option>
                                                        <option value="done" <?php if ($task['status'] == 'done') echo 'selected'; ?>>Done</option>
                                                    </select>
                                                </div>
                                                <div class="buttons task-buttons">
                                                    <button type="button" class="task-button" data-close-button>Cancel</button>
                                                    <button type="submit" name="action" value="update" class="task-button">edit Task</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="overlay"></div>
                                    </form>
                                    <form action="../../../app/Http/Controllers/tasksController.php" method="POST" class="delete-form"

                                        onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                        <input type="submit" value="✖" class="delete-task">
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- Edit Task Modal for all tasks -->
            <?php foreach ($tasks as $task): ?>
                <form action="<?php echo $base_url; ?>/app/Http/Controllers/tasksController.php" method="POST">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <div class="modal" id="modal-edit-<?php echo $task['id']; ?>">
                        <div class="modal-header">
                            <h2>taak bewerken</h2>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <label for="titel-<?php echo $task['id']; ?>">taak naam</label>
                                <input type="text" id="titel-<?php echo $task['id']; ?>" name="titel"
                                    value="<?php echo $task['titel']; ?>" required>
                            </div>
                            <div class="input-group">
                                <label for="beschrijving-<?php echo $task['id']; ?>">taak info</label>
                                <textarea id="beschrijving-<?php echo $task['id']; ?>" name="beschrijving"
                                    style="width: 300px; height: 100px; resize: none;"
                                    required><?php echo $task['beschrijving']; ?></textarea>
                            </div>
                            <label for="afdeling-<?php echo $task['id']; ?>">Afdeling:</label>
                            <div class="afdeling-select">
                                <select name="afdeling" id="afdeling-<?php echo $task['id']; ?>" class="form-input">
                                    <option value="Personeel" <?php echo $task['afdeling'] == 'Personeel' ? 'selected' : ''; ?>>Personeel</option>
                                    <option value="Horeca" <?php echo $task['afdeling'] == 'Horeca' ? 'selected' : ''; ?>>
                                        Horeca</option>
                                    <option value="Techniek" <?php echo $task['afdeling'] == 'Techniek' ? 'selected' : ''; ?>>
                                        Techniek</option>
                                    <option value="Inkoop" <?php echo $task['afdeling'] == 'Inkoop' ? 'selected' : ''; ?>>
                                        Inkoop</option>
                                    <option value="Klantenservice" <?php echo $task['afdeling'] == 'Klantenservice' ? 'selected' : ''; ?>>Klantenservice</option>
                                    <option value="Groen" <?php echo $task['afdeling'] == 'Groen' ? 'selected' : ''; ?>>Groen
                                    </option>
                                </select>
                            </div>
                            <label for="status-<?php echo $task['id']; ?>">Status:</label>
                            <div class="afdeling-select">
                                <select name="status" id="status-<?php echo $task['id']; ?>" class="form-input" required>
                                    <option value="Todo" <?php echo $task['status'] == 'Todo' ? 'selected' : ''; ?>>Todo
                                    </option>
                                    <option value="In Progress" <?php echo $task['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                    <option value="Done" <?php echo $task['status'] == 'Done' ? 'selected' : ''; ?>>Done
                                    </option>
                                </select>
                            </div>
                            <label for="deadline-<?php echo $task['id']; ?>">Start date:</label>
                            <input type="date" id="deadline-<?php echo $task['id']; ?>" name="deadline"
                                value="<?php echo $task['deadline']; ?>" min="2025-01-01" max="3000-12-31" />
                            <div class="buttons task-buttons">
                                <button type="button" class="task-button" data-close-button>Cancel</button>
                                <button type="submit" class="task-button">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>

            <div id="overlay"></div>
        </div>
    </div>

    <script src="../../../js/add-task.js"></script>
</body>

</html>