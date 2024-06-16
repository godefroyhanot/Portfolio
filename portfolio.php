<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Portfolio</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="portfolio.php">Portfolio</a>
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
