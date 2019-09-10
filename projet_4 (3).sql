-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 sep. 2019 à 13:59
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `report` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_article`, `pseudo`, `comment`, `date_creation`, `report`) VALUES
(1, 3, 'kakafu', 'bon article a quand le prochain ?', '2019-08-07 00:54:34', 0),
(2, 3, 'Cornelissen', 'Jolie site !\r\n', '2019-08-08 13:10:41', 0),
(3, 3, 'cornelissen', 'bien joué gros !', '2019-08-08 15:29:17', 0),
(4, 3, 'cornelissen', 'bien joué gros !', '2019-08-08 15:36:38', 0),
(5, 3, 'cornelissen', 'bien joué gros !', '2019-08-08 15:37:19', 0),
(6, 3, 'cornelissen', 'bien joué gros !', '2019-08-08 15:38:57', 1),
(7, 3, 'Hellboy', 'Pas mal mais ca me redirige pas bien je crois!', '2019-08-08 15:42:20', 0),
(8, 3, 'Hellboy', 'Pas mal mais ca me redirige pas bien je crois! mais la je crois que c\'est bon', '2019-08-08 15:44:05', 0),
(9, 5, 'elFamoso', 'elfamoso test del commentario de la nueve', '2019-08-20 11:57:26', 0),
(13, 5, 'adazdazdazfa', 'ezfzefzefzfzfzefzefzfz', '2019-08-20 12:02:14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `extract_content` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `extract_content`, `contents`, `date_creation`) VALUES
(1, 'Exemple : premier article !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris. Sed massa nibh, efficitur at imperdiet nec, varius non tortor. Vestibulum id ex turpis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris. Sed massa nibh, efficitur at imperdiet nec, varius non tortor. Vestibulum id ex turpis. Sed a ornare quam, id molestie ipsum. Suspendisse ultrices viverra elit id fermentum. Vivamus eleifend libero sit amet fermentum dignissim. Nullam blandit enim id lorem dapibus, vulputate aliquet tortor finibus. Praesent a vestibulum massa. Vivamus eu tristique ante. Aliquam erat volutpat. Aliquam nec feugiat nibh, a mollis magna. Nunc at accumsan dui, quis pharetra dolor. Sed quis condimentum dolor.\r\n\r\nEtiam tincidunt tellus odio, eget tincidunt nisl maximus sit amet. Aliquam erat volutpat. Nulla aliquet magna dolor, vitae volutpat tortor suscipit ullamcorper. Praesent pulvinar enim non libero ultricies tincidunt. Vestibulum id purus non nisi consectetur gravida. Sed suscipit dolor lectus, nec mollis est dignissim convallis. Pellentesque vehicula semper feugiat. Etiam laoreet lacus ut libero pellentesque, a semper risus euismod. Sed placerat massa vitae turpis tincidunt tempor. Morbi felis est, placerat nec sapien ut, iaculis auctor nunc.\r\n\r\nCurabitur eros dui, blandit eget dignissim vitae, luctus nec leo. Praesent vel tortor nisl. Fusce accumsan sem tellus, a pretium lacus molestie at. Mauris placerat euismod suscipit. Aenean a elit sodales, ultricies elit a, finibus velit. Vivamus tincidunt finibus dui nec dignissim. Vivamus varius sed lectus vitae sollicitudin. Nam eget tristique turpis. Praesent non lorem urna. Praesent consectetur magna dui, vitae vehicula mi euismod in. Vestibulum ut felis vulputate, sodales ligula non, lobortis nisi. Pellentesque laoreet fringilla velit, placerat aliquam eros posuere bibendum.\r\n\r\nVestibulum quis sapien ac velit viverra rutrum. Sed gravida sem ac euismod cursus. Etiam eget purus at risus bibendum porttitor. Vivamus dolor lacus, varius non tincidunt sit amet, auctor ac velit. Integer hendrerit felis et nisi auctor, at suscipit ligula blandit. Quisque ligula tortor, sollicitudin porta nisl sed, tempus convallis metus. Vestibulum pharetra mauris eu urna laoreet suscipit. In tristique id ipsum sed consectetur. Quisque laoreet turpis nisi, nec tempor nibh commodo interdum. Vestibulum libero diam, tincidunt consectetur purus lacinia, pretium aliquet justo. Nam dapibus lacus ut massa pulvinar consectetur. Fusce nisi sem, iaculis eu maximus vestibulum, pulvinar eleifend urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris sed laoreet felis.\r\n\r\nAenean ac interdum mauris. Sed placerat sapien in varius dictum. Donec at quam vitae sapien egestas facilisis ut a diam. Sed faucibus egestas faucibus. Quisque lacus felis, viverra non est eget, ultrices sagittis mauris. Integer cursus neque tortor. Sed mollis egestas risus, et rhoncus metus consequat sed. In in venenatis nibh. Praesent ut efficitur enim. Curabitur tincidunt, sem eget facilisis rutrum, neque leo porttitor leo, eu iaculis libero urna sed metus. Nulla vitae mi quis neque ultrices laoreet sed non arcu. Donec ut varius enim, ac consectetur nunc. Quisque gravida elit ac neque sodales egestas. Etiam nulla quam, elementum at sagittis eget, sagittis sit amet sapien. Etiam fermentum nulla at rutrum pulvinar. Proin sit amet tincidunt ligula, sit amet consectetur sem. ', '2019-07-30 10:59:41'),
(2, 'Exemple : Deuxième article !', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris.', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris. Sed massa nibh, efficitur at imperdiet nec, varius non tortor. Vestibulum id ex turpis. Sed a ornare quam, id molestie ipsum. Suspendisse ultrices viverra elit id fermentum. Vivamus eleifend libero sit amet fermentum dignissim. Nullam blandit enim id lorem dapibus, vulputate aliquet tortor finibus. Praesent a vestibulum massa. Vivamus eu tristique ante. Aliquam erat volutpat. Aliquam nec feugiat nibh, a mollis magna. Nunc at accumsan dui, quis pharetra dolor. Sed quis condimentum dolor.', '2019-07-30 11:00:00'),
(3, 'Exemple : troisième article !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum.', '? Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris. Sed massa nibh, efficitur at imperdiet nec, varius non tortor. Vestibulum id ex turpis. Sed a ornare quam, id molestie ipsum. Suspendisse ultrices viverra elit id fermentum. Vivamus eleifend libero sit amet fermentum dignissim. Nullam blandit enim id lorem dapibus, vulputate aliquet tortor finibus. Praesent a vestibulum massa. Vivamus eu tristique ante. Aliquam erat volutpat. Aliquam nec feugiat nibh, a mollis magna. Nunc at accumsan dui, quis pharetra dolor. Sed quis condimentum dolor.\r\n\r\nEtiam tincidunt tellus odio, eget tincidunt nisl maximus sit amet. Aliquam erat volutpat. Nulla aliquet magna dolor, vitae volutpat tortor suscipit ullamcorper. Praesent pulvinar enim non libero ultricies tincidunt. Vestibulum id purus non nisi consectetur gravida. Sed suscipit dolor lectus, nec mollis est dignissim convallis. Pellentesque vehicula semper feugiat. Etiam laoreet lacus ut libero pellentesque, a semper risus euismod. Sed placerat massa vitae turpis tincidunt tempor. Morbi felis est, placerat nec sapien ut, iaculis auctor nunc.\r\n\r\nCurabitur eros dui, blandit eget dignissim vitae, luctus nec leo. Praesent vel tortor nisl. Fusce accumsan sem tellus, a pretium lacus molestie at. Mauris placerat euismod suscipit. Aenean a elit sodales, ultricies elit a, finibus velit. Vivamus tincidunt finibus dui nec dignissim. Vivamus varius sed lectus vitae sollicitudin. Nam eget tristique turpis. Praesent non lorem urna. Praesent consectetur magna dui, vitae vehicula mi euismod in. Vestibulum ut felis vulputate, sodales ligula non, lobortis nisi. Pellentesque laoreet fringilla velit, placerat aliquam eros posuere bibendum.\r\n\r\nVestibulum quis sapien ac velit viverra rutrum. Sed gravida sem ac euismod cursus. Etiam eget purus at risus bibendum porttitor. Vivamus dolor lacus, varius non tincidunt sit amet, auctor ac velit. Integer hendrerit felis et nisi auctor, at suscipit ligula blandit. Quisque ligula tortor, sollicitudin porta nisl sed, tempus convallis metus. Vestibulum pharetra mauris eu urna laoreet suscipit. In tristique id ipsum sed consectetur. Quisque laoreet turpis nisi, nec tempor nibh commodo interdum. Vestibulum libero diam, tincidunt consectetur purus lacinia, pretium aliquet justo. Nam dapibus lacus ut massa pulvinar consectetur. Fusce nisi sem, iaculis eu maximus vestibulum, pulvinar eleifend urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris sed laoreet felis.\r\n\r\nAenean ac interdum mauris. Sed placerat sapien in varius dictum. Donec at quam vitae sapien egestas facilisis ut a diam. Sed faucibus egestas faucibus. Quisque lacus felis, viverra non est eget, ultrices sagittis mauris. Integer cursus neque tortor. Sed mollis egestas risus, et rhoncus metus consequat sed. In in venenatis nibh. Praesent ut efficitur enim. Curabitur tincidunt, sem eget facilisis rutrum, neque leo porttitor leo, eu iaculis libero urna sed metus. Nulla vitae mi quis neque ultrices laoreet sed non arcu. Donec ut varius enim, ac consectetur nunc. Quisque gravida elit ac neque sodales egestas. Etiam nulla quam, elementum at sagittis eget, sagittis sit amet sapien. Etiam fermentum nulla at rutrum pulvinar. Proin sit amet tincidunt ligula, sit amet consectetur sem.', '2019-07-30 11:00:26'),
(4, 'Exemple : Quatrième article !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris. Sed massa nibh, efficitur at imperdiet nec, varius non tortor. Vestibulum id ex turpis. Sed a ornare quam, id molestie ipsum. Suspendisse ultrices viverra elit id fermentum. Vivamus eleifend libero sit amet fermentum dignissim. Nullam blandit enim id lorem dapibus, vulputate aliquet tortor finibus. Praesent a vestibulum massa. Vivamus eu tristique ante. Aliquam erat volutpat. Aliquam nec feugiat nibh, a mollis magna. Nunc at accumsan dui, quis pharetra dolor. Sed quis condimentum dolor.\r\n\r\nEtiam tincidunt tellus odio, eget tincidunt nisl maximus sit amet. Aliquam erat volutpat. Nulla aliquet magna dolor, vitae volutpat tortor suscipit ullamcorper. Praesent pulvinar enim non libero ultricies tincidunt. Vestibulum id purus non nisi consectetur gravida. Sed suscipit dolor lectus, nec mollis est dignissim convallis. Pellentesque vehicula semper feugiat. Etiam laoreet lacus ut libero pellentesque, a semper risus euismod. Sed placerat massa vitae turpis tincidunt tempor. Morbi felis est, placerat nec sapien ut, iaculis auctor nunc.\r\n\r\nCurabitur eros dui, blandit eget dignissim vitae, luctus nec leo. Praesent vel tortor nisl. Fusce accumsan sem tellus, a pretium lacus molestie at. Mauris placerat euismod suscipit. Aenean a elit sodales, ultricies elit a, finibus velit. Vivamus tincidunt finibus dui nec dignissim. Vivamus varius sed lectus vitae sollicitudin. Nam eget tristique turpis. Praesent non lorem urna. Praesent consectetur magna dui, vitae vehicula mi euismod in. Vestibulum ut felis vulputate, sodales ligula non, lobortis nisi. Pellentesque laoreet fringilla velit, placerat aliquam eros posuere bibendum.\r\n\r\nVestibulum quis sapien ac velit viverra rutrum. Sed gravida sem ac euismod cursus. Etiam eget purus at risus bibendum porttitor. Vivamus dolor lacus, varius non tincidunt sit amet, auctor ac velit. Integer hendrerit felis et nisi auctor, at suscipit ligula blandit. Quisque ligula tortor, sollicitudin porta nisl sed, tempus convallis metus. Vestibulum pharetra mauris eu urna laoreet suscipit. In tristique id ipsum sed consectetur. Quisque laoreet turpis nisi, nec tempor nibh commodo interdum. Vestibulum libero diam, tincidunt consectetur purus lacinia, pretium aliquet justo. Nam dapibus lacus ut massa pulvinar consectetur. Fusce nisi sem, iaculis eu maximus vestibulum, pulvinar eleifend urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris sed laoreet felis.\r\n\r\nAenean ac interdum mauris. Sed placerat sapien in varius dictum. Donec at quam vitae sapien egestas facilisis ut a diam. Sed faucibus egestas faucibus. Quisque lacus felis, viverra non est eget, ultrices sagittis mauris. Integer cursus neque tortor. Sed mollis egestas risus, et rhoncus metus consequat sed. In in venenatis nibh. Praesent ut efficitur enim. Curabitur tincidunt, sem eget facilisis rutrum, neque leo porttitor leo, eu iaculis libero urna sed metus. Nulla vitae mi quis neque ultrices laoreet sed non arcu. Donec ut varius enim, ac consectetur nunc. Quisque gravida elit ac neque sodales egestas. Etiam nulla quam, elementum at sagittis eget, sagittis sit amet sapien. Etiam fermentum nulla at rutrum pulvinar. Proin sit amet tincidunt ligula, sit amet consectetur sem. ', '2019-07-30 11:04:26'),
(5, 'Exemple : cinquième article !', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida justo eget felis dignissim, in rutrum felis rutrum. Mauris ac tempus orci, in commodo mauris. Sed massa nibh, efficitur at imperdiet nec, varius non tortor. Vestibulum id ex turpis. Sed a ornare quam, id molestie ipsum. Suspendisse ultrices viverra elit id fermentum. Vivamus eleifend libero sit amet fermentum dignissim. Nullam blandit enim id lorem dapibus, vulputate aliquet tortor finibus. Praesent a vestibulum massa. Vivamus eu tristique ante. Aliquam erat volutpat. Aliquam nec feugiat nibh, a mollis magna. Nunc at accumsan dui, quis pharetra dolor. Sed quis condimentum dolor. Etiam tincidunt tellus odio, eget tincidunt nisl maximus sit amet. Aliquam erat volutpat. Nulla aliquet magna dolor, vitae volutpat tortor suscipit ullamcorper. Praesent pulvinar enim non libero ultricies tincidunt. Vestibulum id purus non nisi consectetur gravida. Sed suscipit dolor lectus, nec mollis est dignissim convallis. Pellentesque vehicula semper feugiat. Etiam laoreet lacus ut libero pellentesque, a semper risus euismod. Sed placerat massa vitae turpis tincidunt tempor. Morbi felis est, placerat nec sapien ut, iaculis auctor nunc. Curabitur eros dui, blandit eget dignissim vitae, luctus nec leo. Praesent vel tortor nisl. Fusce accumsan sem tellus, a pretium lacus molestie at. Mauris placerat euismod suscipit. Aenean a elit sodales, ultricies elit a, finibus velit. Vivamus tincidunt finibus dui nec dignissim. Vivamus varius sed lectus vitae sollicitudin. Nam eget tristique turpis. Praesent non lorem urna. Praesent consectetur magna dui, vitae vehicula mi euismod in. Vestibulum ut felis vulputate, sodales ligula non, lobortis nisi. Pellentesque laoreet fringilla velit, placerat aliquam eros posuere bibendum. Vestibulum quis sapien ac velit viverra rutrum. Sed gravida sem ac euismod cursus. Etiam eget purus at risus bibendum porttitor. Vivamus dolor lacus, varius non tincidunt sit amet, auctor ac velit. Integer hendrerit felis et nisi auctor, at suscipit ligula blandit. Quisque ligula tortor, sollicitudin porta nisl sed, tempus convallis metus. Vestibulum pharetra mauris eu urna laoreet suscipit. In tristique id ipsum sed consectetur. Quisque laoreet turpis nisi, nec tempor nibh commodo interdum. Vestibulum libero diam, tincidunt consectetur purus lacinia, pretium aliquet justo. Nam dapibus lacus ut massa pulvinar consectetur. Fusce nisi sem, iaculis eu maximus vestibulum, pulvinar eleifend urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris sed laoreet felis. Aenean ac interdum mauris. Sed placerat sapien in varius dictum. Donec at quam vitae sapien egestas facilisis ut a diam. Sed faucibus egestas faucibus. Quisque lacus felis, viverra non est eget, ultrices sagittis mauris. Integer cursus neque tortor. Sed mollis egestas risus, et rhoncus metus consequat sed. In in venenatis nibh. Praesent ut efficitur enim. Curabitur tincidunt, sem eget facilisis rutrum, neque leo porttitor leo, eu iaculis libero urna sed metus. Nulla vitae mi quis neque ultrices laoreet sed non arcu. Donec ut varius enim, ac consectetur nunc. Quisque gravida elit ac neque sodales egestas. Etiam nulla quam, elementum at sagittis eget, sagittis sit amet sapien. Etiam fermentum nulla at rutrum pulvinar. Proin sit amet tincidunt ligula, sit amet consectetur sem.</p>', '2019-07-30 11:05:26');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `pw`, `date_creation`) VALUES
(1, 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2019-08-19 05:27:49'),
(2, 'jean', '51f8b1fa9b424745378826727452997ee2a7c3d7', '2019-09-02 02:17:13');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `post` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
