<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$action = $_POST['action'] ?? null;

try {
    require_once '../../../config/conn.php';

    if (!$conn) {
        die("Fout: Databaseverbinding mislukt.");
    }

    if ($action == "create") {
        $titel = $_POST['name'] ?? null;
        $beschrijving = $_POST['taskInfoTodo'] ?? null;

        $errors = [];

        if (empty($beschrijving)) {
            $errors[] = "Vul de beschrijving van de taak in.";
        }

        if (empty($titel)) {
            $errors[] = "Vul een geldige naam voor de titel in.";
        }

        if (!empty($errors)) {
            var_dump($errors);
            exit();
        }

        // 2. Query
        $query = "INSERT INTO meldingen (titel, beschrijving) VALUES (:titel, :beschrijving)";

        // 3. Prepare
        $statement = $conn->prepare($query);

        // 4. Execute
        $statement->execute([
            ":titel" => $titel,
            ":beschrijving" => $beschrijving,
        ]);

        header("Location: ../../../resources/views/meldingen/kanban-bord.php?msg=Melding opgeslagen");
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
} catch (PDOException $e) {
    die("Databasefout: " . $e->getMessage());
} catch (Exception $e) {
    die("Algemene fout: " . $e->getMessage());
}
