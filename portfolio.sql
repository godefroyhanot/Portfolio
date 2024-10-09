-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 16 juin 2024 à 22:20
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `technologies` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `images`, `technologies`, `created_at`) VALUES
(1, 'Ramez vers la découverte', 'Le Projet BDE consistait à créer une activité en groupe sur le thème que l’on voulait. Le choix de notre groupe a été le canoë/kayak.\r\n\r\nVoici comment nous nous sommes organisé pour créer le projet :\r\n\r\n- Recherche d’un site pour faire du canoë/kayak et du camping sauvage\r\n- Création d’un moodboard et d’une charte graphique\r\n- Préparation du déroulement de la journée \r\n- Budget Prévisionnel\r\n- Rétro Planning', 'images/ramez-1.png, images/ramez-2.png, images/ramez-3.png, images/ramez-4.png, images/ramez-5.png, images/ramez-6.png,\r\nimages/ramez-7.png', 'Canva, Trello, Discord', '2024-06-16 15:15:49'),
(2, 'Zéro Déchet', 'Pour le projet de cette année, j’ai choisi l’association Zéro Déchet, car le gaspillage est quelque chose qui me parle et me concerne beaucoup.\r\n\r\nL’association consiste à sensibiliser les personnes sur les problèmes causés par les déchets et organise des événements pour remédier à cela.\r\n', 'images/banniere-face.png, images/1-copie.png, images/2-copie.png, images/3-copie.png, images/4-copie.png, images/5-copie.png, images/6-copie.png, images/7-copie.png', 'Canva, Illustrator, Trello, Google Docs, Google Sheets', '2024-06-16 18:11:01'),
(3, 'En Quête d\'évasion', 'Construction d\'un site WordPress d\'escape game sur le thème de l\'aventure', 'images/0.jpg,images/1.jpg,images/2.jpg,images/3.jpg,images/4.jpg,images/5.jpg,images/6.jpg,images/7.jpg,images/8.jpg,images/9.jpg,images/10.jpg', 'Wordpress, Elementor, Faaaster', '2024-06-16 18:45:37');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
