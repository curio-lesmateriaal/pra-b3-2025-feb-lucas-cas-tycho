<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Variabelen vullen
$action = $_POST['action'];

if ($action == "create") {
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status = 'Todo';
    $deadline = $_POST['deadline'];
    
    // Basisvalidatie
    if (empty($titel)) {
        $errors[] = "Vul de taak naam in.";
    }

    if (empty($beschrijving)) {
        $errors[] = "Vul de taak beschrijving in.";
    }

    if (empty($afdeling)) {
        $errors[] = "Selecteer een afdeling.";
    }

    if (empty($deadline)) {
        $errors[] = "Selecteer een deadline.";
    }

    if (isset($errors)) {
        var_dump($errors);
        exit();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline) VALUES(:titel, :beschrijving, :afdeling, :status, :deadline)";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
    ]);

    header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is aangemaakt");
    exit();
}

if ($action == "update") {
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];

    // Basisvalidatie
    if (empty($id)) {
        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Geen ID opgegeven");
        exit();
    }

    if (empty($titel)) {
        $errors[] = "Vul de taak naam in.";
    }

    if (empty($beschrijving)) {
        $errors[] = "Vul de taak beschrijving in.";
    }

    if (empty($afdeling)) {
        $errors[] = "Selecteer een afdeling.";
    }

    if (empty($status)) {
        $errors[] = "Selecteer een status.";
    }
    
    if (empty($deadline)) {
        $errors[] = "Selecteer een deadline.";
    }

    if (isset($errors)) {
        var_dump($errors);
        exit();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query - Deadline verplaatst naar SET, WHERE alleen op ID
    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status, deadline = :deadline WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":id" => $id,
    ]);

    header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is aangepast");
    exit();
}

if ($action == "delete") {
    $id = $_POST['id'];

    if (empty($id)) {
        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Geen ID opgegeven");
        exit();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query: Hard delete (volledig verwijderen)
    $query = "DELETE FROM taken WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is verwijderd");
    exit();
}

?>