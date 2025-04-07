<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];


//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "SELECT * FROM users WHERE username = :username";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute( [':username' => $username] );

//FETCH
$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement -> rowCount() < 1){
    die ('account gegevens zijn niet juist');
}

if(!password_verify($password,$user['password']))
{
    die ('account gegevens zijn niet juist');
}

$_SESSION['user_id'] = $user;['id'];

header("Location: ../../../resources/views/meldingen/kanban-bord.php");
?>