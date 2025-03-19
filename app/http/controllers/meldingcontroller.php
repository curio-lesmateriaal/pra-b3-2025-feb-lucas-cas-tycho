<?php
 
//Variabelen vullen
$action = $_POST['action'];
 
if ($action == "create") {
 
    $attractie = $_POST['attractie'];
    $capaciteit = $_POST['capaciteit'];
    $melder = $_POST['melder'];
    $type = $_POST['type'];
    $overige_info = $_POST['overige_info'];
    if (isset($_POST['prioriteit'])) {
        $prioriteit = 1;
    } else {
        $prioriteit = 0;
    }
 
 
    if (empty($attractie)) {
        $errors[] = "Vul de naam van de attractie in.";
    }
 
    if (empty($type)) {
        $errors[] = "Vul een geldige type voor de attractie in.";
    }
 
    if (!is_numeric($capaciteit)) {
        $errors[] = "Vul voor capaciteit een geldig getal in.";
    }
 
    if (empty($melder)) {
        $errors[] = "Vul de naam van de melder in.";
    }
 
    if (isset($errors)) {
        var_dump($errors);
        exit();
    }
 
    //1. Verbinding
    require_once '../../../backend/conn.php';
 
    //2. Query
    $query = "INSERT INTO meldingen (attractie, capaciteit, melder, prioriteit, type, overige_info) VALUES(:attractie, :capaciteit, :melder, :prioriteit, :type, :overige_info)";
 
    //3. Prepare
    $statement = $conn->prepare($query);
 
    //4. Execute
    $statement->execute([
        ":attractie" => $attractie,
        ":capaciteit" => $capaciteit,
        ":melder" => $melder,
        ":prioriteit" => $prioriteit,
        ":type" => $type,
        ":overige_info" => $taskInfoTodo,
    ]);
 
    header("Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");
}
 
if ($action == "edit") {
    $attractie = $_POST['attractie'];
    $capaciteit = $_POST['capaciteit'];
    $melder = $_POST['melder'];
    $overig = $_POST['overig'];
    $id = $_POST['id'];
    if (isset($_POST['prioriteit'])) {
        $prioriteit = 1;
    } else {
        $prioriteit = 0;
    }
 
    //1. Verbinding
    require_once '../../../backend/conn.php';
 
    //2. Query
    $query = "UPDATE meldingen SET attractie = :attractie, capaciteit = :capaciteit,
        melder = :melder, prioriteit = :prioriteit, overige_info = :overig
        WHERE id = :id
";
 
    //3. Prepare
    $statement = $conn->prepare($query);
 
    //4. Execute
    $statement->execute([
        ":attractie" => $attractie,
        ":capaciteit" => $capaciteit,
        ":naam" => $naam,
        ":afdeling" => $afdeling,
        ":beschrijving" => $beschrijving,
        ":id" => $id
    ]);
 
    header("Location: ../../../resources/views/meldingen/index.php?msg=Melding is aangepast");
}
if ($action == "delete") {
    $id = $_POST['id'];
    //1. Verbinding
    require_once '../../../config/conn.php';
 
    //2. Query
    $query = "DELETE FROM meldingen WHERE id = :id";
 
    //3. Prepare
    $statement = $conn->prepare($query);
 
    //4. Execute
    $statement->execute([
        ":id" => $id
    ]);
 
    header("Location: ../../../resources/views/meldingen/index.php?msg=Melding is Verwijderd");
}