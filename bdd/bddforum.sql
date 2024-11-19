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

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '0',
  `creationDate` datetime DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `user` int DEFAULT NULL COMMENT 'a la base c''est un user_id',
  PRIMARY KEY (`id_topic`),
  KEY `FK_topic_category` (`category_id`),
  KEY `FK_topic_users` (`user`) USING BTREE,
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_users` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~18 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `category_id`, `user`) VALUES
	(1, 'Terminator 2', '2024-01-24 14:54:23', 4, 1),
	(2, 'football', '2024-01-24 14:55:53', 1, 1),
	(3, 'how cost to travel in scotland?', '2024-01-24 14:56:56', 5, 1),
	(4, 'Problem with my cd key', '2024-01-24 14:57:45', 2, 1),
	(5, 'Disscussion about the ancient greek', '2024-01-24 14:58:58', 3, 1),
	(6, 'Shreck', '2024-01-24 15:33:40', 4, 1),
	(8, 'How much cost a bread in the 13th century', '2024-01-24 15:35:51', 3, 1),
	(9, 'Tunisia', '2024-01-24 15:36:02', 5, 1),
	(10, 'How to play Dark soul?', '2024-01-24 15:37:11', 2, 1),
	(14, 'gggf', '2024-01-30 12:37:49', 3, 16),
	(15, 'hytrhfez', '2024-11-19 16:09:57', NULL, 566),
	(16, 'hytrhfez', '2024-11-19 16:09:57', NULL, 12),
	(17, 'fezfze', '2024-11-19 16:09:55', NULL, NULL),
	(18, 'grzeg', '2024-11-19 16:09:56', NULL, NULL),
	(19, 'fezfez', '2024-11-19 16:09:54', NULL, NULL),
	(20, 'testFEZFZE', '2024-11-19 16:09:53', NULL, NULL),
	(21, 'fezfez', '2024-11-19 16:09:52', NULL, NULL),
	(22, 'test11', '2024-11-19 16:20:26', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
