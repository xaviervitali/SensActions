-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 10 juil. 2022 à 20:12
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sens-actions`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220705140321', '2022-07-06 11:15:03', 67),
('DoctrineMigrations\\Version20220705205007', '2022-07-06 11:15:03', 90),
('DoctrineMigrations\\Version20220706085559', '2022-07-06 11:15:04', 10),
('DoctrineMigrations\\Version20220706090150', '2022-07-06 11:15:04', 8),
('DoctrineMigrations\\Version20220706090940', '2022-07-06 11:15:04', 25),
('DoctrineMigrations\\Version20220706091134', '2022-07-06 11:15:04', 8),
('DoctrineMigrations\\Version20220706103830', '2022-07-06 12:38:34', 79),
('DoctrineMigrations\\Version20220706152003', '2022-07-06 17:20:19', 43),
('DoctrineMigrations\\Version20220707071917', '2022-07-07 09:19:27', 347),
('DoctrineMigrations\\Version20220707141518', '2022-07-07 16:15:26', 77),
('DoctrineMigrations\\Version20220710174535', '2022-07-10 19:45:45', 51),
('DoctrineMigrations\\Version20220710174655', '2022-07-10 19:47:01', 73);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prerequisite` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants` int(11) DEFAULT NULL,
  `satisfaction` int(11) DEFAULT NULL,
  `success_rate` double DEFAULT NULL,
  `goal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handicap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intervenants` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competences` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `program` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `name`, `public`, `duration`, `prerequisite`, `participants`, `satisfaction`, `success_rate`, `goal`, `method`, `validation`, `file`, `more_info`, `handicap`, `intervenants`, `competences`, `program`, `slug`, `updated_at`) VALUES
(8, 'Sauveteur Secouriste Travail', 'Tout salarié de l’entreprise.', '2 jours soit 14 heures de formation', 'Aucun.', NULL, NULL, NULL, 'Contribuer à la prévention des risques professionnels dans son entreprise.', 'Recueil des attentes préformation. Pédagogie ludique et applicative, expérimentations pratiques, jeux de rôles, applications concrètes', 'Délivrance du certificat sauveteur secouriste du travail à l’issue de la formation, sous réserve de réussite aux épreuves certificatives. Délivrance et d’un certificat de fin de réalisation. Évaluation à chaud et à froid. Certificat valable pendant 2 ans.', 'Sauveteur-Secouriste-Travail.jpg', '80% pratique 20% théorique  Conception sur mesure et adaptation à l\'activité réelle de chaque entreprise .', 'Les salles sont conformes aux normes en vigueur notamment pour les personnes en situation de handicap.', 'Formateurs professionnels certifiés par l’INRS et spécialistes en prévention des risques professionnels.', 'Situer le cadre juridique de son intervention de SST.', 'Jour 1\r\nSituer le rôle du SST en entreprise (le cadre juridique, le champ d’intervention en matière de secours)\r\n\r\nSituer son rôle de SST dans l’organisation de la prévention dans l’entreprise (les enjeux, les statistiques, les acteurs …)\r\n\r\nCaractériser des risques professionnels dans une situation de travail (notions de base de la prévention)\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Molestias expedita modi quaerat reprehenderit eum mollitia, cupiditate non deleniti minima sed dolor amet accusamus totam sit voluptate enim, rem sunt omnis? Debitis est dolorum incidunt necessitatibus nostrum laborum consequatur voluptate fugit natus accusantium quaerat in maxime aliquid ea earum saepe, corrupti dolore similique quos ratione quisquam. Quisquam maxime officiis explicabo nemo, aliquid error exercitationem aliquam tempora architecto voluptatem, dolore nobis dolorum! Vel quia praesentium soluta? Voluptates, earum? Voluptas provident cum quo quas dolorum excepturi quidem odio, ab, vero aut repudiandae? Debitis fuga explicabo reprehenderit? Cupiditate veritatis consequuntur expedita aut odio cumque placeat nobis fugit harum, sint laudantium, quam, repellendus accusantium sed vitae esse animi et natus recusandae a ea maxime molestias iusto quia! Aliquam quas quidem odit animi dolor mollitia recusandae. Quia quis nemo sunt iste laudantium voluptatum perspiciatis eius molestias sapiente dolore a autem quibusdam temporibus, corrupti cum accusantium libero. Quibusdam iure fugiat, molestiae facere, nesciunt quisquam autem tenetur accusamus eligendi atque impedit debitis. At in provident maiores. Blanditiis consectetur minus, praesentium perferendis doloremque libero repudiandae, a suscipit voluptas accusantium ullam totam, sunt itaque. Esse, minus atque? Nisi reiciendis odit dolore, impedit nemo odio quisquam corrupti labore perferendis eius eos.', 'Sauveteur-Secouriste-Travail', '2022-07-07 08:29:47');

-- --------------------------------------------------------

--
-- Structure de la table `formation_learning_category`
--

CREATE TABLE `formation_learning_category` (
  `formation_id` int(11) NOT NULL,
  `learning_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_learning_category`
--

INSERT INTO `formation_learning_category` (`formation_id`, `learning_category_id`) VALUES
(8, 5),
(8, 9);

-- --------------------------------------------------------

--
-- Structure de la table `learning_category`
--

CREATE TABLE `learning_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `learning_category`
--

INSERT INTO `learning_category` (`id`, `name`) VALUES
(5, 'Risques physiques'),
(6, 'Risques psychosociaux'),
(9, 'prévention'),
(12, 'management / communication'),
(13, 'secourisme'),
(14, 'formations des formateurs'),
(15, 'instances du personnel');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `updated_at`) VALUES
(1, 'Événement #1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada. Sed eget libero et arcu tempor tincidunt in ac lectus. Maecenas vitae felis enim. In in tellus consequat, condimentum eros vitae, lacinia risus. Sed vehicula sem sed risus volutpat elementum.\r\n\r\nNunc accumsan tempus nunc ac aliquet. Integer non ullamcorper eros, in rutrum velit. Proin cursus orci sit amet lobortis iaculis. Praesent condimentum eget felis ut laoreet. Aliquam sodales dolor id mi iaculis, non fermentum leo viverra. Aenean aliquet condimentum placerat. Aenean aliquet diam arcu. Curabitur ac ligula sem. Mauris tincidunt mauris at ligula tincidunt interdum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus sagittis, eros.', '62c6c184e32b0297521253.jpg', '2022-07-07 13:20:36'),
(2, 'Événement #2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget.', NULL, '2022-07-07 09:57:56');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'test', '', '$2y$13$V4QeWFaIh6so1A2ZtlNfo.wNacGjP9IhbIOiz6eSJKw7zjMO6eA3m');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation_learning_category`
--
ALTER TABLE `formation_learning_category`
  ADD PRIMARY KEY (`formation_id`,`learning_category_id`),
  ADD KEY `IDX_88E879C05200282E` (`formation_id`),
  ADD KEY `IDX_88E879C03097A784` (`learning_category_id`);

--
-- Index pour la table `learning_category`
--
ALTER TABLE `learning_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `learning_category`
--
ALTER TABLE `learning_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation_learning_category`
--
ALTER TABLE `formation_learning_category`
  ADD CONSTRAINT `FK_88E879C03097A784` FOREIGN KEY (`learning_category_id`) REFERENCES `learning_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_88E879C05200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
