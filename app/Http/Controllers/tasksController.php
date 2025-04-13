<?php
session_start();
$action = $_POST['action'];

if ($action == 'create') {
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status = 'to-do';
    $deadline = $_POST['deadline'];
    $user = $_SESSION['user_id'];

    
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


    $user = $_SESSION['user_id'];

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline) VALUES(:titel, :beschrijving, :afdeling, :status, :deadline) ";

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

    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    if (empty($id)) {
        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Geen ID opgegeven");
        exit();
    }

    require_once '../../../config/conn.php';

    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status WHERE id = :id";

    $statement = $conn->prepare($query);

    $statement->execute([
        ':titel' => $titel,
        ':beschrijving' => $beschrijving,
        ':afdeling' => $afdeling,
        ':status' => $status,
        ':id' => $id,
    ]);

    header("location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is geupdate");
    exit;
}





if ($action == "delete") {
    $id = $_POST['id'];

    // 1. Verbinding
    require_once '../../../config/conn.php';

    // 2. Query
    $query = "DELETE FROM taken WHERE id = :id";

    // 3. Prepare
    $statement = $conn->prepare($query);

    // 4. Execute
    $statement->execute([
        ':id' => $id
    ]);

    header("location: ../../../resources/views/meldingen/kanban-bord.php?msg=Taak is verwijderd");
    exit;
}
