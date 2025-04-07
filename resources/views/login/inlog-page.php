<!DOCTYPE html>
<html lang="nl">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../../../config/config.php'; ?>
    <title>Account inlog</title>
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/main.css">
</head>

<body>
    <header>
    <?php require_once '../components/header.php'; ?>
    </header>
    <div class="container">
        <div class="msg-block">
            <?php
            if (isset($_GET['msg'])) {
                echo "<div class='msg' id='msg'>" . htmlspecialchars($_GET['msg']) . "</div>";
            }
            ?>
        </div>
        <h2 class="account-title">INLOGGEN</h2>
        <form action="<?php echo $base_url; ?>/app/Http/Controllers/loginController.php" method="POST">

            <form action="loginController.php"method="POST">

            <div class="form-group">
            <label for="username">Gebruikersnaam:</label>
            <input type="text"name="username"id="username">
            </div>

            <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password"name="password"id="password">
            </div>

            <input type="submit"value="Login">
    </div>
</body>
<script>
setTimeout(function () {
        var msg = document.getElementById('msg');
        if (msg) {
            msg.style.transition = "opacity 1s";
            msg.style.opacity = "0";

            setTimeout(function () {
                msg.remove();
            }, 1000);
        }
    }, 2000);
</script>
</html>