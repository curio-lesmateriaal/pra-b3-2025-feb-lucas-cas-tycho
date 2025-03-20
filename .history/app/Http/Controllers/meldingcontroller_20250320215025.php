<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Variabelen vullen
$action = $_POST['action'] ?? '';

if ($action == "create") {
    // Deze actie is oorspronkelijk bedoeld voor de 'meldingen' tabel, maar die bestaat niet.
    // We vervangen dit door de logica voor 'create_task' hieronder, omdat de Kanban bord form 'action=create' gebruikt.
    // Als je de 'meldingen' functionaliteit nodig hebt, moet je de 'meldingen' tabel aanmaken in je database.
    $titel = $_POST['titel'] ?? '';
    $beschrijving = $_POST['beschrijving'] ?? '';
    $afdeling = $_POST['afdeling'] ?? '';
    $status = 'Todo'; // Default status voor nieuwe taken

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

    if (isset($errors)) {
        var_dump($errors);
        exit();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, is_deleted) VALUES(:titel, :beschrijving, :afdeling, :status, 0)";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status
    ]);

    header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is aangemaakt");
    exit();
}

if ($action == "edit") {
    // Deze actie is voor de 'meldingen' tabel, die niet bestaat.
    // Als je deze functionaliteit nodig hebt, maak dan de 'meldingen' tabel aan.
    // Voor nu laten we deze actie leeg, omdat de Kanban bord deze niet gebruikt.
    header("Location: ../../../resources/views/meldingen/index.php?msg=Actie niet ondersteund");
    exit();
}

if ($action == "delete") {
    $id = $_POST['id'] ?? '';

    if (empty($id)) {
        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Geen ID opgegeven");
        exit();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query: Soft delete (markeer als verwijderd)
    $query = "UPDATE taken SET is_deleted = 1 WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is verwijderd");
    exit();
}

if ($action == "update") {
    $id = $_POST['id'] ?? '';
    $titel = $_POST['titel'] ?? '';
    $beschrijving = $_POST['beschrijving'] ?? '';
    $afdeling = $_POST['afdeling'] ?? '';

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

    if (isset($errors)) {
        var_dump($errors);
        exit();
    }

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":id" => $id
    ]);

    header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is aangepast");
    exit();
}

?>
