-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.category : ~5 rows (environ)
INSERT INTO `category` (`id_category`, `categoryName`) VALUES
	(1, 'Sport'),
	(2, 'VideoGame'),
	(3, 'History'),
	(4, 'Movie'),
	(5, 'Travel');

-- Listage de la structure de table forum. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `creationDate` datetime NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user` int NOT NULL DEFAULT '0' COMMENT 'a la base c''est user_id',
  `topic_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `FK_message_topic` (`topic_id`) USING BTREE,
  KEY `FK_message_users` (`user`) USING BTREE,
  CONSTRAINT `FK_message_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_message_users` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.post : ~13 rows (environ)
INSERT INTO `post` (`id_post`, `creationDate`, `text`, `user`, `topic_id`) VALUES
	(1, '2024-01-24 15:17:55', 'Hello , i have a problem with my cd key, it\'s not working. How i can resolve that?', 1, 4),
	(2, '2024-01-24 15:20:02', 'This movie is amazing , i like this old 90\'s movie.', 1, 1),
	(3, '2024-01-24 15:21:20', 'Do you think manchester united is the best?', 1, 2),
	(4, '2024-01-24 15:22:05', 'I have an idea to create a bar about the platons cave, what do you think?', 1, 5),
	(5, '2024-01-24 15:23:43', 'I think get a road trip in scotland  , my budget  is around 1k£. Anyone  experience that?', 1, 3),
	(6, '2024-01-24 15:38:11', 'The first animation movie in hommage of grim .', 1, 6),
	(7, '2024-01-24 15:39:38', 'Black panter vs chicago bull, what did you expect?', 1, 7),
	(8, '2024-01-24 15:40:18', 'I don\'t know', 1, 8),
	(10, '2024-01-24 15:41:46', 'What a beautiful Sun rise!', 1, 9),
	(11, '2024-01-24 15:42:08', 'I don\'t what i\'m doing after the tutorial, any one help?', 1, 10),
	(12, '2024-01-26 10:58:57', 'i don\'t know', 1, 5),
	(14, '2024-01-30 12:37:49', 'gggg', 16, 14),
	(15, '2024-01-30 13:07:53', 'setfgef', 16, 5);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '0',
  `creationDate` datetime NOT NULL,
  `closed` tinyint NOT NULL,
  `category_id` int NOT NULL,
  `user` int NOT NULL COMMENT 'a la base c''est un user_id',
  PRIMARY KEY (`id_topic`),
  KEY `FK_topic_category` (`category_id`),
  KEY `FK_topic_users` (`user`) USING BTREE,
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_users` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~11 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `closed`, `category_id`, `user`) VALUES
	(1, 'Terminator 2', '2024-01-24 14:54:23', 0, 4, 1),
	(2, 'football', '2024-01-24 14:55:53', 0, 1, 1),
	(3, 'how cost to travel in scotland?', '2024-01-24 14:56:56', 0, 5, 1),
	(4, 'Problem with my cd key', '2024-01-24 14:57:45', 0, 2, 1),
	(5, 'Disscussion about the ancient greek', '2024-01-24 14:58:58', 0, 3, 1),
	(6, 'Shreck', '2024-01-24 15:33:40', 0, 4, 1),
	(7, 'BasketBall', '2024-01-24 15:34:19', 0, 1, 1),
	(8, 'How much cost a bread in the 13th century', '2024-01-24 15:35:51', 0, 3, 1),
	(9, 'Tunisia', '2024-01-24 15:36:02', 0, 5, 1),
	(10, 'How to play Dark soul?', '2024-01-24 15:37:11', 0, 2, 1),
	(14, 'gggf', '2024-01-30 12:37:49', 0, 3, 16);

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `creationTime` datetime NOT NULL,
  `nickName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `role` json DEFAULT NULL,
  `isBanned` tinyint NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci CHECKSUM=1;

-- Listage des données de la table forum.user : ~9 rows (environ)
INSERT INTO `user` (`id_user`, `creationTime`, `nickName`, `password`, `role`, `isBanned`, `mail`) VALUES
	(1, '2024-01-24 14:50:41', 'Jean doe', 'Sp33dOfL4v4"-"', '1', 0, 'test1@test.fr'),
	(2, '2024-01-29 08:31:00', 'dfd', '$2y$10$/dW.7j3GWQ/N7sYk2STifO4GQGTBjBEzQLIrdB2NxJLkM2lE2RxEK', '["ROLE_USER"]', 0, 'test1@test.fr'),
	(10, '2024-01-29 09:45:13', '1234', '$2y$10$lciTPKiJeBWGSRWXVD9l3.PhOmAsza44uNuvUkzyu7jGYV3tRbqwC', '["ROLE_USER"]', 0, 'test1@test.fr'),
	(12, '2024-01-30 08:21:30', 'aaa', '$2y$10$wOd1/N/9RWviXRHAhR5q0uyBzETUmV1soM44lyge/kaqzHlJIPcDy', '["ROLE_USER"]', 0, 'test1@test.fr'),
	(13, '2024-01-30 08:22:03', 'd&eacute;d&eacute;', '$2y$10$Mu18G4fGb2Zvsj5Dd3u7rOMm4RabRBzDHfS/d2.uSr1Idb511VLGe', '["ROLE_USER"]', 0, 'test1@test.fr'),
	(14, '2024-01-30 08:37:54', 'dfd', '$2y$10$71pmzeQZhojlUZoiLtX2SuTb8blVMMxXb4lSPG7IUhoXQsrYekYW.', '["ROLE_USER"]', 0, 'test1@test.fr'),
	(15, '2024-01-30 08:55:39', 'Niko', '$2y$10$1DIZgQOu/8APAFQ5MfAy/.u/2A8U8bZPrJlBj42l4L8qAYVWN/iQK', '["ROLE_USER"]', 0, 'test1@test.fr'),
	(16, '2024-01-30 09:18:58', 'Lucas', '$2y$10$hWFmaT0ZzpcftG4XDp7hIOwiOMXf5sWUbiY9w5cdG3KYDVmVp9L/a', '["ROLE_ADMIN"]', 0, 'test1@test.fr'),
	(19, '2024-11-12 11:45:38', 'test', 'Sp33dOfL4v4*-*', '["ROLE_ADMIN"]', 0, 'test1@test.fr');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
