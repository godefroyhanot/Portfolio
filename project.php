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
    <!-- Ajouter le CSS de Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
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
        <h1 class="header-title"><?php echo htmlspecialchars($project['title']); ?></h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <section class="project-details">
        <h2>Description</h2>
        <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
        <h2>Technologies Utilisées</h2>
        <p><?php echo htmlspecialchars($project['technologies']); ?></p>
        <h2>Images</h2>
        <!-- Ajouter la classe slick-carousel à la div contenant les images -->
        <div class="slick-carousel">
            <?php foreach ($image_paths as $path): ?>
                    <img src="<?php echo htmlspecialchars(trim($path)); ?>" alt="Image du projet" class="project-image">
            <?php endforeach; ?>
        </div>
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

    <!-- Ajouter le JavaScript de Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- JavaScript pour initialiser le carousel -->
    <script>
    $(document).ready(function(){
        $('.slick-carousel').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });

        // Script pour afficher les images en plein écran
        $('.project-image').click(function(){
            var modal = document.createElement('div');
            modal.classList.add('modal');

            var modalContent = document.createElement('img');
            modalContent.classList.add('modal-content');
            modalContent.src = this.src;
            modal.appendChild(modalContent);

            var closeBtn = document.createElement('span');
            closeBtn.classList.add('close');
            closeBtn.innerHTML = '&times;';
            closeBtn.onclick = function() {
                modal.style.display = "none";
            };
            modal.appendChild(closeBtn);

            document.body.appendChild(modal);
            modal.style.display = "block";

            modal.onclick = function() {
                modal.style.display = "none";
            };
        });
    });
    </script>
</body>
</html>
