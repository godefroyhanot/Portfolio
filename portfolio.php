<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Portfolio</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Paytone+One&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <section class="projects">
        <h2>Projets</h2>
        <ul>
            <?php
            $stmt = $pdo->query('SELECT * FROM projects');
            while ($row = $stmt->fetch()) {
                echo "<li><a href='project.php?id=".$row['id']."'>".$row['title']."</a></li>";
            }
            ?>
        </ul>
    </section>
</body>
</html>
