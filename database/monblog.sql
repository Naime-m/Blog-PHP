-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 déc. 2021 à 17:32
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
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `comment_date`, `user_id`, `comment_status_id`) VALUES
(58, 57, 'oui', '2021-11-23 18:05:51', 5, 2),
(52, 48, 'oui', '2021-11-23 17:11:49', 5, 2),
(44, 47, 'Génialissime !', '2021-11-17 22:27:57', 3, 2),
(43, 47, 'Bonjour !', '2021-11-17 22:27:06', 3, 2),
(41, 45, 'Oui !', '2021-11-16 20:23:55', 3, 2),
(40, 45, 'Bonjour !', '2021-11-16 18:36:46', 3, 2),
(38, 45, 'non', '2021-11-15 21:25:23', 3, 2),
(39, 45, 'non', '2021-11-15 21:25:41', 3, 2),
(72, 58, 'Ceci est un commentaire !', '2021-12-07 17:34:19', 51, 2),
(49, 48, 'oui', '2021-11-23 17:11:46', 5, 2),
(50, 48, 'oui', '2021-11-23 17:11:47', 5, 2),
(53, 48, 'oui', '2021-11-23 17:11:50', 5, 2),
(55, 49, 'oui', '2021-11-23 17:46:44', 5, 2),
(56, 49, 'bonjour', '2021-11-23 17:48:57', 3, 2),
(60, 55, 'Génial !', '2021-12-07 17:34:40', 5, 2),
(61, 57, 'oui !', '2021-11-23 18:06:13', 3, 2),
(62, 57, 'non !', '2021-11-23 18:06:17', 3, 2),
(63, 56, 'oui !', '2021-11-23 18:06:23', 3, 2),
(64, 56, 'non !', '2021-11-23 18:06:27', 3, 2),
(65, 55, 'c\'est vrai !', '2021-11-23 18:06:35', 3, 2),
(66, 55, 'non !', '2021-11-23 18:06:38', 3, 2),
(67, 57, 'bonsoir !', '2021-11-23 18:06:53', 4, 2),
(68, 56, 'bonjour !', '2021-11-23 18:06:58', 4, 2),
(69, 55, 'bienvenue !', '2021-11-23 18:07:04', 4, 2),
(73, 56, 'oui', '2021-12-07 18:28:39', 54, 2);

-- --------------------------------------------------------

--
-- Structure de la table `comment_status`
--

DROP TABLE IF EXISTS `comment_status`;
CREATE TABLE IF NOT EXISTS `comment_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment_status`
--

INSERT INTO `comment_status` (`id`, `label`) VALUES
(1, 'A valider'),
(2, 'Validé');

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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `user_id`) VALUES
(55, 'Bienvenue sur mon blog ! ', 'Bonjour à tous et bienvenue sur ce blog dédié au langage PHP !', '2021-12-01 21:20:51', 5),
(56, 'Ce blog est dédié au PHP', 'La ligne directrice de ce blog sera : PHP', '2021-12-07 17:33:56', 5),
(58, 'Ceci est un article', 'Integer ultricies auctor elit a pharetra. Mauris sagittis id justo nec imperdiet. Quisque vitae justo at nisi vehicula convallis. Donec ut auctor velit, eget hendrerit neque. Vivamus quis dignissim tellus, sed ultrices sapien. Sed efficitur lectus vitae viverra ultrices. Sed posuere, sem quis elementum vehicula, nulla nisl luctus felis, tristique pulvinar odio quam vitae mauris. In ultricies neque in velit tempus, quis vestibulum diam ultricies. Praesent sed vestibulum dolor. Nullam convallis elit tortor, ac volutpat purus lacinia eu. Phasellus ut lacus nec mi consequat efficitur. Nulla tincidunt aliquam bibendum. Etiam imperdiet augue non risus faucibus tristique.\r\n\r\nEtiam iaculis efficitur elit, ac sagittis nisi viverra at. Mauris est diam, auctor sit amet mauris quis, luctus sollicitudin neque. Curabitur rhoncus velit nisi, sollicitudin efficitur massa rhoncus at. Quisque non rutrum libero, ut pulvinar nunc. In hac habitasse platea dictumst. Vivamus congue eros nec lorem convallis, eu gravida justo congue. Integer et tempor sapien. Aenean sodales magna arcu. Etiam dictum erat quis volutpat pretium. Integer mollis, massa eu maximus consequat, magna justo pharetra lacus, sagittis accumsan turpis nisi ut augue. Nam sit amet odio eu justo rutrum ullamcorper. Etiam sit amet ornare lectus. Praesent ac convallis lorem.\r\n\r\nDonec vestibulum eu lacus et imperdiet. Mauris consequat vestibulum massa, at malesuada quam pulvinar quis. Nulla molestie sapien sit amet mauris viverra mattis. Cras auctor, justo a interdum maximus, tellus mauris ultricies magna, id laoreet sapien ligula eget quam. Cras consequat volutpat ex, sed facilisis sapien vestibulum ac. Aenean augue tellus, venenatis at mollis id, pellentesque in lacus. Nulla pellentesque vehicula lacus vitae cursus. Maecenas non felis finibus, consequat eros vel, rhoncus purus. Donec euismod iaculis nulla, pellentesque elementum augue vestibulum eu. Maecenas ut nisi consequat, venenatis erat nec, convallis lacus. Aliquam vitae lectus at justo laoreet mattis. Suspendisse lobortis ex at leo hendrerit dignissim. Nulla porta diam vel velit semper, et ornare felis euismod. Fusce sit amet elementum nisl. Vivamus a erat in eros tincidunt pharetra.', '2021-12-07 17:33:17', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `userType_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `lastname`, `firstname`, `userType_id`) VALUES
(5, 'admin@gmail.com', '$2y$10$N8yB6t3ceSzT9L.zYvIL6uAxh32biH57TVRlXz1w.19u0YPNaDH/O', 'Blog', 'Administrateur', 1),
(51, 'medjeknaim@gmail.com', '$2y$10$7FCsXPo5OwV4VpCYFUecf.QM/xQAs5ruwuQzHLaPgd3WxGBBm14KK', 'Medjek', 'Naime', 2);

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertype`
--

INSERT INTO `usertype` (`id`, `label`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
