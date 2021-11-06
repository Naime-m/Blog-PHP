-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 06 nov. 2021 à 17:19
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Jean', 'Génial !', '2021-10-12 09:06:26'),
(2, 2, 'Philippe', 'Trop bien !', '2021-10-13 09:06:26'),
(3, 1, 'Jean', 'Génialissime !', '2021-10-28 01:36:49'),
(4, 2, 'Roy', 'Intéressant.', '2021-10-26 02:37:22'),
(5, 2, 'Bernard', 'Vive la radio !', '2021-10-28 16:43:22'),
(6, 2, 'Bernard', 'Bonjour', '2021-10-28 17:34:07'),
(7, 2, 'Blabla', 'abc', '2021-10-28 18:16:12'),
(8, 2, 'Blabla', 'abc', '2021-10-28 18:20:59'),
(9, 2, 'Blabla', 'Abc', '2021-10-28 18:21:56'),
(10, 2, 'Jean', 'C\'est très bien', '2021-10-30 15:56:21'),
(11, 2, 'Bernard', 'Bonsoir', '2021-10-30 16:01:57'),
(12, 2, 'Blabla', '123', '2021-10-30 16:05:15'),
(13, 2, 'Paul', 'Bonjour', '2021-10-30 17:25:19'),
(14, 24, '123', '456', '2021-10-31 17:30:39'),
(15, 26, 'Bernard', 'Génial !', '2021-10-31 17:32:46'),
(16, 35, 'Bernard', 'dfgs', '2021-11-04 18:34:13'),
(17, 35, 'sdfg', 'sdfg', '2021-11-04 18:34:18'),
(18, 24, 'Bernard', 'génial\r\n\r\n', '2021-11-04 18:43:27'),
(19, 24, 'BlaBLABLA', 'blablaBLABLAAA', '2021-11-06 18:17:56'),
(20, 24, 'Blabla', 'abcBAAAAAAAAAAAAAAAA', '2021-11-06 18:18:04'),
(21, 36, '123', '123', '2021-11-05 18:32:47');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(5, 'PHP est le meilleur langage de programmation', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\".', '2021-10-30 17:24:03'),
(8, 'PHP est le meilleur langage de programmation', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\".', '2021-10-30 17:24:03'),
(24, 'Vive le PHP !', 'Le PHP est le meilleur langage de programmation ! Et de très loin !', '2021-11-06 07:46:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
