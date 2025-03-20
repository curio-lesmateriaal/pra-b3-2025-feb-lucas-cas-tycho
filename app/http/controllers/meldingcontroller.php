<?php


require_once '../../../config/conn.php';

$action = $_POST['action'];

if ($action == "create") {
    $titel = $_POST["titel"];
    if (empty($titel)) {
        $errors[] = "Vul de taak-naam in. ";
    }

    $beschrijving = $_POST["beschrijving"];
    if (empty($beschrijving)) {
        $errors[] = "Vul de beschrijving in. ";
    }
    $afdeling = $_POST["afdeling"];
    if (empty($afdeling)) {
        $errors[] = "Vul de afdeling in. ";
    }


    // $deadline = $_POST["deadline"];
    // if (empty($deadline)) {
    //     $errors[] = "Vul de deadline in. ";
    // }

    $status = "Todo";
    // $user = $_POST['user_id'];
    
    if (isset($errors)) {
        var_dump($errors);
        die();
    }



    $query = "INSERT INTO taken (titel, beschrijving, status, afdeling)
    VALUES (:titel, :beschrijving, :status, :afdeling);";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":titel"=> $titel,
        ":beschrijving"=> $beschrijving,
        ":status"=> $status,	
        ":afdeling"=> $afdeling,
    ]);

    header("Location: ../../../index.php?msg=Taak aangemaakt!");
    exit();
}


    // if ($action == "edit") {
    //     $id = $_POST['id'] ?? null;
    //     $titel = $_POST['name'] ?? null;
    //     $beschrijving = $_POST['taskInfoTodo'] ?? null;

    //     if (!$id) {
    //         die("Fout: geen ID opgegeven voor bewerking.");
    //     }

    //     // 2. Query
    //     $query = "UPDATE meldingen SET titel = :titel, beschrijving = :beschrijving WHERE id = :id";

    //     // 3. Prepare
    //     $statement = $conn->prepare($query);

    //     // 4. Execute
    //     $statement->execute([
    //         ":titel" => $titel,
    //         ":beschrijving" => $beschrijving,
    //         ":id" => $id
    //     ]);

    //     header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Melding is aangepast");
    //     exit();
    // }

    if ($action == "delete") {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            die("Fout: geen ID opgegeven voor verwijderen.");
        }

        // 2. Query
        $query = "DELETE FROM taken WHERE id = :id";

        // 3. Prepare
        $statement = $conn->prepare($query);

        // 4. Execute
        $statement->execute([
            ":id" => $id
        ]);

        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Melding is verwijderd");
        exit();
    }

?>