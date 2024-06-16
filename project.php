<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
$stmt->execute([$id]);
$project = $stmt->fetch();

$image_paths = explode(',', $project['images']);

$comment_stmt = $pdo->prepare('SELECT * FROM comments WHERE project_id = ? ORDER BY created_at DESC');
$comment_stmt->execute([$id]);
$comments = $comment_stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($project['title']); ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1 class="header-title"><?php echo htmlspecialchars($project['title']); ?></h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="portfolio.php">Portfolio</a>
        </nav>
    </header>
    <section class="project-details">
        <h2>Description</h2>
        <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
        <h2>Technologies Utilisées</h2>
        <p><?php echo htmlspecialchars($project['technologies']); ?></p>
        <h2>Images</h2>
        <?php foreach ($image_paths as $path): ?>
            <img src="<?php echo htmlspecialchars(trim($path)); ?>" alt="Image du projet" class="project-image">
        <?php endforeach; ?>
        <h2>Commentaires</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><strong><?php echo htmlspecialchars($comment['username']); ?></strong> dit :</p>
                <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                <small><?php echo $comment['created_at']; ?></small>
            </div>
        <?php endforeach; ?>
        <h3>Ajouter un commentaire</h3>
        <form action="add_comment.php" method="post">
            <input type="hidden" name="project_id" value="<?php echo $id; ?>">
            <input type="text" name="username" placeholder="Votre nom" required>
            <textarea name="comment" placeholder="Votre commentaire" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </section>
</body>
</html>
