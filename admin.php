<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_project'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $technologies = $_POST['technologies'];
        $images = $_POST['images'];

        $stmt = $pdo->prepare('INSERT INTO projects (title, description, technologies, images) VALUES (?, ?, ?, ?)');
        $stmt->execute([$title, $description, $technologies, $images]);
    }

    if (isset($_POST['delete_project'])) {
        $id = $_POST['id'];

        $stmt = $pdo->prepare('DELETE FROM projects WHERE id = ?');
        $stmt->execute([$id]);
    }

    if (isset($_POST['delete_comment'])) {
        $id = $_POST['id'];

        $stmt = $pdo->prepare('DELETE FROM comments WHERE id = ?');
        $stmt->execute([$id]);
    }
}

$projects = $pdo->query('SELECT * FROM projects')->fetchAll();
$comments = $pdo->query('SELECT * FROM comments')->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
<body class="admin">
    <h2>Admin Dashboard</h2>
    <h3>Ajouter un Projet</h3>
    <form action="admin.php" method="post">
        <input type="text" name="title" placeholder="Titre" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="text" name="technologies" placeholder="Technologies" required>
        <input type="text" name="images" placeholder="Chemins des images (séparés par des virgules)" required>
        <button type="submit" name="add_project">Ajouter</button>
    </form>

    <h3>Supprimer un Projet</h3>
    <form action="admin.php" method="post">
        <select name="id" required>
            <?php foreach ($projects as $project): ?>
                <option value="<?php echo $project['id']; ?>"><?php echo htmlspecialchars($project['title']); ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="delete_project">Supprimer</button>
    </form>

    <h3>Supprimer un Commentaire</h3>
    <form action="admin.php" method="post">
        <select name="id" required>
            <?php foreach ($comments as $comment): ?>
                <option value="<?php echo $comment['id']; ?>">Commentaire de <?php echo htmlspecialchars($comment['username']); ?> sur le projet ID <?php echo $comment['project_id']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="delete_comment">Supprimer</button>
    </form>

    <a href="logout.php">Déconnexion</a>
</body>
</html>
