<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon Portfolio</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <section class="about">
        <img src="images/photo-nws.JPEG" alt="Photo">
        <h2>À propos de moi</h2>
        <p class="about">Bienvenue sur mon site portfolio ! Je m'appelle Godefroy, 
            j'ai 23 ans et je suis passionné par le monde du digital ! 
            Mon parcours a débuté avec un Bac Pro Technicien d'études du bâtiment, mais après un an, j'ai décidé d'arrêter, 
            car ce domaine ne me passionnait pas. Actuellement étudiant à la Normandie Web School, 
            je cherche une alternance en tant que développeur web. Sur ce site, 
            vous retrouverez toutes mes réalisations de projets, 
            mes compétences et mes centres d'intérêt dans le domaine du développement web.</p>
        <h3>Compétences</h3>
        <h4>Soft Skills</h4>
        <ul>
            <li>Autonome</li>
            <li>Rigoureux</li>
            <li>Organisé</li>
            <li>Curieux</li>
        </ul>
        <h4>Hard Skills</h4>
        <ul>
            <li>Wordpress/Elementor</li>
            <li>HTML/CSS</li>
            <li>JavaScript</li>
            <li>PHP</li>
            <li>Symfony</li>
            <li>React</li>
            <li>SQL</li>
            <li>Git/Github</li>
        </ul>
        <h3>Expériences Professionnelles</h3>
        <ul>
            <li>
                <h4>Stagiaire</h4>
                <p>Gloubsy Art & Decoration, 2024 (2 Mois)</p>
                <ul>
                    <li>Refonte du site Wordpress de l'entreprise</li>
                    <li>Création d'une identité graphique pour le site</li>
                    <li>Ajouts de nouveaux produits et rédaction dans la boutique en ligne WooCommerce</li>
                </ul>
            </li>
            <li>
                <h4>Animateur (Anti-Gaspi)</h4>
                <p>Association Unis Cité, 2021 (10 Mois)</p>
                <ul>
                    <li>Élaboration d'un programme d'activités sur l'antigaspillage alimentaire, adapté aux lycéens, en collaboration avec l'équipe d'animation</li>
                    <li>Participation aux réunions internes, contribution au travail de réflexion et partage d'idées afin d'améliorer les pratiques et d'optimiser le programme d'animation</li>
                    <li>Proposition de nouvelles activités afin de sensibiliser le public et de développer la participation</li>
                </ul>
            </li>
        </ul>
        <h3>Formations</h3>
        <ul>
            <li>
                <h4>Web School, Développement Web, 2023 - Présent</h4>
                <ul>
                <li><strong>Développement Web</strong> : WordPress, HTML/CSS, JavaScript, PHP, ReactJS, Symfony & SQL</li>
                <li><strong>Conception Graphique</strong> : Photoshop, InDesign, Illustrator, Figma, Canva & Elementor</li>xx@
                </ul>
            </li>
        </ul>
    </section>
</body>
</html>
