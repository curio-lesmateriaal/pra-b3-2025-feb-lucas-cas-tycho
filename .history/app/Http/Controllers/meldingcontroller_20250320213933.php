Cas
casy_bot
Online

star_wars_. — 3/6/2025 10:31 PM
!!!!!
Cas — 3/6/2025 10:38 PM
star_wars_. — 3/6/2025 10:55 PM
Cas — 3/8/2025 12:56 PM
wtf moet ik hier mee
Image
hij is fout 😦
Image
star_wars_. — 3/8/2025 8:18 PM
hhaahhahahahaha
skill iseu
star_wars_. — 3/10/2025 5:39 PM
broeder
stop me genshin impact
al 3 uur gap
doe normaal
Cas — 3/11/2025 12:27 PM
ben je sad
Image
star_wars_. — 3/11/2025 12:27 PM
is dit beter
???4
Image
https://open.spotify.com/track/6ArBakOhDmzk1z34JO0Oiw?si=a606d2bc74924556

Cas — 3/12/2025 8:52 AM
Console.Write("schijf een getal op : ");
            int x = int.Parse(Console.ReadLine());

            Console.Write("schijf nog een getal op : ");
            int y = int.Parse(Console.ReadLine());
https://discord.gg/g6M3EaRp
star_wars_. — 3/12/2025 10:06 AM
public static DateTime HuidigeDatumTijd()
 {
     return DateTime.Now;
 }
Cas — 3/12/2025 12:29 PM
star_wars_. — 3/12/2025 12:37 PM
Cas — 3/12/2025 1:19 PM
Cas — 3/12/2025 1:33 PM
star_wars_. — 3/12/2025 5:04 PM
Mis jij je airpords
You missed a call from star_wars_. that lasted a few seconds. — 3/12/2025 5:09 PM
Cas — 3/14/2025 10:22 PM
jij zij dat zoon scrol ding moeilijk is
Image
overflow-y: auto;
dat is wat je nodig hebt
😐
star_wars_. — 3/15/2025 8:41 AM
Ow wouw
Cas — 3/15/2025 10:23 PM
（づ￣3￣）づ╭❤️～
star_wars_. — 3/16/2025 12:52 PM
Wtf
Cas — 3/17/2025 10:47 AM
Image
Cas — 3/18/2025 8:36 AM
star_wars_. — 3/18/2025 10:41 AM
Keskin-Bozkir, Gizem
Cas — Yesterday at 10:15 AM
<!DOCTYPE html>
<html lang="nl">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../../../backend/config.php'; ?>
    <title>Account aanmaken</title>
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>

<body>
    <header>
    <?php require_once '../components/header.php'; ?>
    </header>
    <div class="container">
        <h2 class="account-title">ACCOUNT AANMAKEN</h2>
        <form action="dashboard.html" method="POST" class="account-form">
            <div class="input-stack">
                <div class="input-group">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
                <div class="input-group">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                </div>
            </div>
            <div class="buttons account-buttons">
                <button type="button" class="login-button account-button" onclick="window.location.href='inlog-page.php'">INLOGGEN</button>
                <button type="submit" class="login-button account-button">LOG IN</button>
            </div>
        </form>
    </div>
</body>

</html>
--
<!DOCTYPE html>
<html lang="nl">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../../../backend/config.php'; ?>
    <title>Account inlog</title>
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>

<body>
    <header>
    <?php require_once '../components/header.php'; ?>
    </header>
    <div class="container">
        <h2 class="account-title">INLOGGEN</h2>
        <form action="dashboard.html" method="POST" class="account-form">
            <div class="input-stack">
                <div class="input-group">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
                <div class="input-group">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                </div>
            </div>
            <div class="buttons account-buttons">
                <button type="button" class="login-button account-button" onclick="window.location.href='account-aanmaken.php'">ACCOUNT AANMAKEN</button>
                <button type="submit" class="login-button account-button">LOG IN</button>
            </div>
        </form>
    </div>
</body>

</html>
star_wars_. — Yesterday at 12:28 PM
<form action="<?php echo $base_url; ?>../backend/controllers/taskController.php" method="POST"
            onsubmit="return confirm('Weet je zeker dat je deze melding wilt verwijderen?');">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="VerwijderenButten">
                <input type="submit" value="Verwijderen" class="buttonVV">
            </div>
        </form>
Cas — Today at 9:11 AM
<div class="menu">
            <select name="Afdeling" id="Afdeling" class="afdeling-select">
                <option value="klantenservice">- personeel -</option>
                <option value="afdeling1">- horeca -</option>
                <option value="afdeling2">- techniek -</option>
                <option value="afdeling3">- inkoop -</option>
                <option value="afdeling4">- klantenservice -</option>
                <option value="afdeling5">- groen -</option>
            </select>
        </div>
star_wars_. — Today at 10:08 AM
<?php
require_once '../conn.php';

session_start();
$action = $_POST['action'];
Expand
loginController.php
2 KB
<?php
require_once '../conn.php';

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

    $deadline = $_POST["deadline"];
    if (empty($deadline)) {
        $errors[] = "Vul de deadline in. ";
    }

    $status = "Todo";
    $user = $_POST['user_id'];
    
    if (isset($errors)) {
        var_dump($errors);
        die();
    }



    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline, user)
    VALUES (:titel, :beschrijving, :afdeling, :status, :deadline, :user);";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":titel"=> $titel,
        ":beschrijving"=> $beschrijving,
        ":afdeling"=> $afdeling,
        ":status"=> $status,
        ":deadline"=>$deadline,
        ":user"=>$user,
    ]);

    header("Location: ../../task/index.php?msg=Taak aangemaakt!");
}

if ($action == "update") {
    $id = $_POST["id"];

    $titel = $_POST["titel"];
    $beschrijving = $_POST["beschrijving"];
    $afdeling = $_POST["afdeling"];
    $deadline = $_POST["deadline"];
    $status = $_POST['status'];


    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, status = :status, deadline = :deadline, afdeling = :afdeling WHERE id = :id;";
    $statement = $conn->prepare($query);

    echo $id;

    $statement->execute([
        ":titel"=> $titel,
        ":beschrijving"=> $beschrijving,
        ":status"=> $status,
        ":afdeling"=> $afdeling,
        ":deadline"=> $deadline,
        ":id" => $id
    ]); 

    header("Location: ../../task/index.php?msg=Taak veranderd!");

}

if ($action == 'delete') {
    require_once '../conn.php';

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        header("Location: ../../../resources/views/meldingen/index.php?msg=Geen ID opgegeven!");
        exit();
    }

    $id = $_POST['id'];
    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([':id' => $id]);

    header("Location: ../../task/index.php?msg=Taak verwijderd!");
    exit();
}
?>
Collapse
taskController.php
3 KB
star_wars_. — Today at 10:53 AM
<label for="afdeling">Afdeling:</label>
                <div class="dropdown">
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
star_wars_. — Today at 11:00 AM
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php?msg=Je moet eerst inloggen!");
    exit;
}

require_once '../backend/conn.php';

$afdelingFilter = isset($_GET['afdeling']) ? $_GET['afdeling'] : '';
$userFilter = $_SESSION['user_id'];


$query = "SELECT * FROM taken";
if ($afdelingFilter && $afdelingFilter !== 'Alle') {
    $query .= " WHERE afdeling = :afdeling";
}


$query .= " ORDER BY deadline DESC";

$statement = $conn->prepare($query);
if ($afdelingFilter && $afdelingFilter !== 'Alle') {
    $statement->bindParam(':afdeling', $afdelingFilter);
}
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once '../components/head.php'; ?>
</head>

<body>
    <?php require_once '../components/header.php'; ?>

    <div class="container">
        <div class="barIndex">
            <div class="home">
                <form method="GET" action="">
                    <select name="afdeling" id="afdeling" class="home" onchange="this.form.submit()">
                        <option value="Alle" <?php echo ($afdelingFilter == 'Alle' || $afdelingFilter == '') ? 'selected' : ''; ?>>Alle afdelingen</option>
                        <option value="Personeel" <?php echo ($afdelingFilter == 'Personeel') ? 'selected' : ''; ?>>Personeel</option>
                        <option value="Horeca" <?php echo ($afdelingFilter == 'Horeca') ? 'selected' : ''; ?>>Horeca</option>
                        <option value="Techniek" <?php echo ($afdelingFilter == 'Techniek') ? 'selected' : ''; ?>>Techniek</option>
                        <option value="Inkoop" <?php echo ($afdelingFilter == 'Inkoop') ? 'selected' : ''; ?>>Inkoop</option>
                        <option value="Klantenservice" <?php echo ($afdelingFilter == 'Klantenservice') ? 'selected' : ''; ?>>Klantenservice</option>
                        <option value="Groen" <?php echo ($afdelingFilter == 'Groen') ? 'selected' : ''; ?>>Groen</option>
                    </select>
                </form>
            </div>
            <div class="task-create">
                <a href="create.php"><i class="fa-solid fa-plus"></i> Taak aanmaken</a>
            </div>
        </div>
        
        <div class="msg-block">
            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='msg' id='msg'>" . htmlspecialchars($_GET['msg']) . "</div>";
            }
            ?>
        </div>


        <div class="task-menu">
            <div class="task-block" id="Todo">
                <h2>Todo</h2>

                <?php foreach ($tasks as $task): ?>
                    <?php if ($task['status'] === 'Todo'): ?>
                        <div class="task">
                            <div class="task-top">
                                <h1><?php echo $task['titel']; ?></h1>
                                <a href="edit.php?id=<?php echo $task['id']; ?>"><i class="fa-solid fa-gear fa-lg"></i></a>
                            </div>

                            <p>Afdeling: <?php echo $task['afdeling']; ?></p>
                            <p>Beschrijving: <?php echo $task['beschrijving']; ?></p>
                            <p>deadline: <?php echo $task['deadline']; ?></p>

                            <form action="<?php echo $base_url; ?>/backend/controllers/taskController.php" method="POST"
                                onsubmit="return confirm('Weet je zeker dat je deze taak wilt verwijderen?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="task-block" id="Doing">
                <h2>Doing</h2>
                <?php foreach ($tasks as $task): ?>
                    <?php if ($task['status'] === 'Doing'): ?>
                        <div class="task">
... (65 lines left)
Collapse
index.php
8 KB
require_once '../backend/conn.php';
    $query = "SELECT * FROM taken ORDER BY deadline DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
star_wars_. — Today at 11:08 AM
<input type="submit" value="Verwijderen" class="delete-button">
Cas — Today at 12:05 PM
Console.ForegroundColor = (ConsoleColor)random.Next(1, 16);
star_wars_. — Today at 1:25 PM
.task-menu {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;

}

.task-block {
  border: #000 1px solid;
  width: 300px;
  max-height: 600px;
}

.task-block h2 {
  display: flex;
  align-items: center;
  justify-content: center;
  border-bottom: #000 solid 1px;
  padding-bottom: 15px;
}
star_wars_. — Today at 1:54 PM
if(isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
            <?php endif; ?>
﻿
star_wars_.
star_wars_.
 
 
<?php
require_once '../conn.php';

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

    $deadline = $_POST["deadline"];
    if (empty($deadline)) {
        $errors[] = "Vul de deadline in. ";
    }

    $status = "Todo";
    $user = $_POST['user_id'];
    
    if (isset($errors)) {
        var_dump($errors);
        die();
    }



    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline, user)
    VALUES (:titel, :beschrijving, :afdeling, :status, :deadline, :user);";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":titel"=> $titel,
        ":beschrijving"=> $beschrijving,
        ":afdeling"=> $afdeling,
        ":status"=> $status,
        ":deadline"=>$deadline,
        ":user"=>$user,
    ]);

    header("Location: ../../task/index.php?msg=Taak aangemaakt!");
}

if ($action == "update") {
    $id = $_POST["id"];

    $titel = $_POST["titel"];
    $beschrijving = $_POST["beschrijving"];
    $afdeling = $_POST["afdeling"];
    $deadline = $_POST["deadline"];
    $status = $_POST['status'];


    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, status = :status, deadline = :deadline, afdeling = :afdeling WHERE id = :id;";
    $statement = $conn->prepare($query);

    echo $id;

    $statement->execute([
        ":titel"=> $titel,
        ":beschrijving"=> $beschrijving,
        ":status"=> $status,
        ":afdeling"=> $afdeling,
        ":deadline"=> $deadline,
        ":id" => $id
    ]); 

    header("Location: ../../task/index.php?msg=Taak veranderd!");

}

if ($action == 'delete') {
    require_once '../conn.php';

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        header("Location: ../../../resources/views/meldingen/index.php?msg=Geen ID opgegeven!");
        exit();
    }

    $id = $_POST['id'];
    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([':id' => $id]);

    header("Location: ../../task/index.php?msg=Taak verwijderd!");
    exit();
}
?>