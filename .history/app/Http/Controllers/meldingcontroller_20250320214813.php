<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// $action = $_POST['action'] ?? null;

// try {
//     require_once '../../../config/conn.php';

//     if (!$conn) {
//         die("Fout: Databaseverbinding mislukt.");
//     }

//     if ($action == "create") {
//         $titel = $_POST['name'] ?? null;
//         $beschrijving = $_POST['taskInfoTodo'] ?? null;

//         $errors = [];

//         if (empty($beschrijving)) {
//             $errors[] = "Vul de beschrijving van de taak in.";
//         }

//         if (empty($titel)) {
//             $errors[] = "Vul een geldige naam voor de titel in.";
//         }

//         if (!empty($errors)) {
//             var_dump($errors);
//             exit();
//         }

//         // 2. Query
//         $query = "INSERT INTO meldingen (titel, beschrijving) VALUES (:titel, :beschrijving)";

//         // 3. Prepare
//         $statement = $conn->prepare($query);

//         // 4. Execute
//         $statement->execute([
//             ":titel" => $titel,
//             ":beschrijving" => $beschrijving,
//         ]);

//         header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Melding opgeslagen");
//         exit();
//     }
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
    // $afdeling = $_POST["afdeling"];
    // if (empty($afdeling)) {
    //     $errors[] = "Vul de afdeling in. ";
    // }

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



    $query = "INSERT INTO taken (titel, beschrijving, status)
    VALUES (:titel, :beschrijving, :status);";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":titel"=> $titel,
        ":beschrijving"=> $beschrijving,
        ":status"=> $status	
    ]);

    header("Location: ../../../index.php?msg=Taak aangemaakt!");
    exit();
}


    if ($action == "edit") {
        $id = $_POST['id'] ?? null;
        $titel = $_POST['name'] ?? null;
        $beschrijving = $_POST['taskInfoTodo'] ?? null;

        if (!$id) {
            die("Fout: geen ID opgegeven voor bewerking.");
        }

        // 2. Query
        $query = "UPDATE meldingen SET titel = :titel, beschrijving = :beschrijving WHERE id = :id";

        // 3. Prepare
        $statement = $conn->prepare($query);

        // 4. Execute
        $statement->execute([
            ":titel" => $titel,
            ":beschrijving" => $beschrijving,
            ":id" => $id
        ]);

        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Melding is aangepast");
        exit();
    }

    if ($action == "delete") {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            die("Fout: geen ID opgegeven voor verwijderen.");
        }

        // 2. Query
        $query = "DELETE FROM meldingen WHERE id = :id";

        // 3. Prepare
        $statement = $conn->prepare($query);

        // 4. Execute
        $statement->execute([
            ":id" => $id
        ]);

        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Melding is verwijderd");
        exit();
    }

    echo "Fout: " . $e->getMessage();

?>