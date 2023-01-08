-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 08 jan. 2023 à 20:30
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `saferbase`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bien_immobilier`
--

DROP TABLE IF EXISTS `bien_immobilier`;
CREATE TABLE IF NOT EXISTS `bien_immobilier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surface` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D1BE34E1BCF5E72D` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bien_immobilier`
--

INSERT INTO `bien_immobilier` (`id`, `titre`, `prix`, `image`, `code_postal`, `description`, `localisation`, `surface`, `categorie_id`, `status`, `updated_at`) VALUES
(1, 'Vallons du Voironnais', 2000, '38TB22187.jpg', 38500, '13 Ha de terrain', '38500', '13Ha', 1, 'Location', NULL),
(2, 'Situé à 15 minutes de Mende', 1300, '48RE11201.jpg', 30430, 'idéal pour polyculture sur 14 ha', '30430', '10Ha', 1, 'Location', NULL),
(3, 'PRET A USAGE sur 95 ha - PLAINE DES VOSGES', 11000, '47.06.098.jpg', 47300, 'A 5 min de Villeneuve-sur-Lot', '47300', '14Ha', 1, 'Location', NULL),
(4, 'Vittel Dombrot : Ouest vosgien, secteur de VITTEL', 0, '88 FB .jpg', 88170, 'Terrains d\'environ 6,5 ha', '88170', '6.5Ha', 1, 'vente', NULL),
(5, 'Ancienne ferme équestre en ruine', 156000, '5667DB.jpg', 29510, 'Terrains actuellement loués', '29510', '12Ha', 1, 'vente', NULL),
(6, 'Prairies orientées nord ouest', 113000, '765DN.jpg', 56500, 'Lot D\'un seul tenant', '56500', '11Ha', 2, 'vente', NULL),
(7, 'Terrain proche cours d\'eau', 3000, '76RZDC.jpg', 35200, 'Non accessible par la route, uniquement chemin d\'exploitation', '35200', '5.5Ha', 2, 'Location', NULL),
(8, 'Terrain avec abri', 1200, '9875RDC.jpg', 44110, 'Pour propriétaire équin', '44110', '1.2Ha', 2, 'Location', NULL),
(9, 'Légèrement en Pente', 2400, 'Z34.345.45.jpg', 22700, 'Idéal paturage moutons', '22700', '3.4Ha', 2, 'Location', NULL),
(10, 'Productions végétales', 7700, '64.02.59.jpg', 64150, 'La parcelle se situe dans le Béarn sur la commune de LAGOR.', '64150', '2Ha', 2, 'vente', NULL),
(11, 'Prairies sur les plateaux', 400000, '7629CA.jpg', 81090, 'Parcelle de terre labourable d\'environ 2 ha', '81090', '76Ha', 2, 'vente', NULL),
(12, 'Prairies en pays glazik', 15000, '55VS.jpg', 29510, 'Usage petits animaux type caprins', '29510', '1Ha22', 2, 'vente', NULL),
(13, 'Terrain classé T4', 500, '65.23.876.jpg', 56500, 'cloturé et partiellement boisé', '56500', '1.2Ha', 3, 'Location', NULL),
(14, 'Sapinière', 800, '344334UJ.jpg', 35200, 'Sapinière en cours de bail, cherche reprise', '35200', '1.8Ha', 3, 'Location', NULL),
(15, 'Bois domainial', 12000, 'QDSGF56.jpg', 44110, 'Bois accessible avec sentiers', '44110', '32Ha', 3, 'Location', NULL),
(16, 'Idéal société de chasse', 120000, '313453DR.jpg', 22700, 'Terrain boisé classé ONF', '22700', '35Ha', 3, 'vente', NULL),
(17, 'Bois sur pied', 30000, '345E7EG.jpg', 29510, 'Diverses essences sur place', '29510', '6Ha', 3, 'vente', NULL),
(18, 'Secteur du Ségala-Viaur', 400000, 'jol.jpg', 12200, 'les secteurs les plus en pente sont empiérés', '12200', '54Ha', 3, 'vente', NULL),
(19, 'Propriété Lozère', 700, '48EL11345.jpg', 48370, 'Ensemble bâti avec environ 1ha55', '48370', '1Ha55', 4, 'Location', NULL),
(20, 'Propriété Creuse', 860, '23.16.104.jpg', 23320, 'Dans un hameau à moins de 10 minutes d\'un bourg avec services et commerces, et d\'un village ayant un intérêt touristique sur les routes de St-Jacques-de-Compostelle.', '23320', '1Ha55', 4, 'Location', NULL),
(21, 'Propriété située dans un secteur vallonné', 650, '64.03.60.jpg', 23500, 'Propriété Pyrénées-Atlantiques', '23500', '6Ha', 4, 'Location', NULL),
(22, 'Bâtiments avicoles à transmettre', 200000, '44 22 AN 08.jpg', 44220, 'Site avicole à transmettre sur la commune de Nort-sur-Erdre, au nord de Nantes.', '44220', '2Ha', 4, 'vente', NULL),
(23, 'Propriété viticole et sa cave', 1500000, '34VI6979.jpg', 34280, 'Au cœur de l\'appellation Saint-Chinian', '34280', '30Ha', 4, 'vente', NULL),
(24, 'Tourisme rural-hébergement', 1490000, '34AG10897.jpg', 34070, 'Au nord de l\'Hérault, proche des axes routiers et à 45 minutes de Montpellier', '340770', '1Ha90', 4, 'vente', NULL),
(25, 'Propriété Gard', 2000, '30VI9700.jpg', 34290, 'Ensemble immobilier proche d\'un plan d\'eau aménagé', '34290', '29Ha', 5, 'Location', NULL),
(26, 'FERME 100% HERBAGERE/ ELEVAGE LAITIER', 950, '19.07.118.jpg', 35200, 'Située à l\'orée d\'un bourg, à 10 minutes des services et commerces.', '35200', '29Ha', 5, 'Location', NULL),
(27, 'Propriété Meuse', 1, '55VS.jpg', 88340, 'FERME DE COURUPT : Secteur Sainte-Menehould / Clermont-en-Argonne / Revigny', '88340', '59Ha', 5, 'Location', NULL),
(28, 'Propriété Calvados', 173440, 'MQ14170356.jpg', 14380, 'JFD : Noue de Sienne (14)', '14380', '17Ha', 5, 'vente', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `type_cat`) VALUES
(1, 'Terrain agricole'),
(2, 'Prairie'),
(3, 'bois'),
(4, 'Batiments'),
(5, 'Exploitation');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221223203735', '2023-01-08 12:47:16', 96),
('DoctrineMigrations\\Version20221223211248', '2023-01-08 12:47:16', 17),
('DoctrineMigrations\\Version20221223231819', '2023-01-08 12:47:16', 31),
('DoctrineMigrations\\Version20221224123541', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20221226195412', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20221227142958', '2023-01-08 12:47:16', 21),
('DoctrineMigrations\\Version20221227143208', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20221227145820', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20221227150300', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20221229033446', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20221229034410', '2023-01-08 12:47:16', 139),
('DoctrineMigrations\\Version20221229112002', '2023-01-08 12:47:16', 1),
('DoctrineMigrations\\Version20221229112335', '2023-01-08 12:47:16', 1),
('DoctrineMigrations\\Version20221229112914', '2023-01-08 12:47:16', 59),
('DoctrineMigrations\\Version20221229122004', '2023-01-08 12:47:16', 29),
('DoctrineMigrations\\Version20221229234510', '2023-01-08 12:47:16', 27),
('DoctrineMigrations\\Version20230102193520', '2023-01-08 12:47:16', 28),
('DoctrineMigrations\\Version20230102210822', '2023-01-08 12:47:16', 34),
('DoctrineMigrations\\Version20230102212922', '2023-01-08 12:47:16', 16),
('DoctrineMigrations\\Version20230102213312', '2023-01-08 12:47:16', 332),
('DoctrineMigrations\\Version20230104220720', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20230105223008', '2023-01-08 12:47:16', 7),
('DoctrineMigrations\\Version20230107114313', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20230107114443', '2023-01-08 12:47:16', 0),
('DoctrineMigrations\\Version20230108123952', '2023-01-08 12:47:16', 113),
('DoctrineMigrations\\Version20230108132353', '2023-01-08 13:38:40', 750);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_bien` int(11) NOT NULL,
  `email_porteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `date`, `id_bien`, `email_porteur`) VALUES
(1, '2023-01-08', 1, 'francoistano6@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `titre`, `description`, `image`, `commentaire`, `update_at`) VALUES
(1, 'Bienvenue', 'Des Maison Exponentiel a de bon prix', 'QDSGF56.jpg', 'Approchez regarder', NULL),
(2, 'Rennes City', 'de beau appartement', '34AG10897.jpg', 'Venez Visitez', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
(1, 'francoistano6@gmail.com', '[]', '$2y$13$FndEB3jE7mIRRtd3SVbEheKvoP34UNqhmx4ISq922S5gfNpzRk282', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bien_immobilier`
--
ALTER TABLE `bien_immobilier`
  ADD CONSTRAINT `FK_D1BE34E1BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
