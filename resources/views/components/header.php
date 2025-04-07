<header>
    <div class="navbar">
        <img src="<?php echo $base_url; ?>/img/logo-big-v4.png" alt="LOGO">
        <div class="menu">
            <a href="<?php echo $base_url; ?>/index.php">HOME</a>
            <?php
            if(isset($_SESSION['user_id'])): ?>
                <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/resources/views/login/inlog-page.php">Inloggen</a>
            <?php endif; ?>
        </div>
    </div>
</header>


