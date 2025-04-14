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

            <form action="loginController.php" method="POST">

                <div class="form-group">
                    <label style="text-align: left; align-self: left;" for="username">Gebruikersnaam:</label>
                    <div class="input-group">
                        <input type="text" name="username" id="username" required>
                    </div>
                </div>

                <div class="form-group">
                    <label style="text-align: left; align-self: left;" for="password">Wachtwoord:</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" required>
                    </div>
                </div>
                <div class="form-groep">
                    <a style="padding-left: 55px; padding-right: 55px; padding-top: 11.5px; padding-bottom: 11px; margin-right: 13px;   "href="../../../index.php" class="task-button">Cancel</a>
                    <input style="width: 150px; margin-top: 10px; text-align: center; background-color: #28a745; border: none; " type="submit" value="Login">
                </div>
    </div>
</body>
<script>
    setTimeout(function() {
        var msg = document.getElementById('msg');
        if (msg) {
            msg.style.transition = "opacity 1s";
            msg.style.opacity = "0";

            setTimeout(function() {
                msg.remove();
            }, 1000);
        }
    }, 2000);
</script>

</html>