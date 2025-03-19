
<?php
$username = $_POST['username'];
$password = $_POST['password'];


//1. Verbinding
require_once '../../../backend/conn.php';

//2. Query
$query = "SELECT * FROM users WHERE username = :username";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute( [':username' => $username] );

//FETCH
$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement -> rowCount() < 1){
    die ('Gebruiker bestaat niet');
}

if(!password_verify($password,$user['password']))
{
    die ('Wachtwoord is niet correct');
}

$_SESSION['userid'] = $user;['id'];

header("Location: ../../../resources/views/meldingen/index.php");
?>