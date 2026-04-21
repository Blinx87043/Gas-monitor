-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for gas_monitor
CREATE DATABASE IF NOT EXISTS `gas_monitor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gas_monitor`;

-- Dumping structure for table gas_monitor.gas
CREATE TABLE IF NOT EXISTS `gas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `sensor` float NOT NULL DEFAULT '0',
  `datatime` timestamp NOT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gas_monitor.gas: ~10 rows (approximately)
INSERT INTO `gas` (`id`, `status`, `sensor`, `datatime`) VALUES
	(1, '1.23', 0, '2026-04-12 01:24:48'),
	(2, '99.11', 0, '2026-04-13 04:14:43'),
	(3, '101.23', 0, '2026-04-13 04:14:54'),
	(4, '179.69', 0, '2026-04-13 04:20:00'),
	(5, '329.48', 0, '2026-04-13 04:29:08'),
	(6, '246.81', 0, '2026-04-13 04:29:35'),
	(7, '141.39', 0, '2026-04-13 04:29:45'),
	(8, 'Alarma', 7.6, '2026-04-14 23:43:48'),
	(9, 'Estable', 10, '2026-04-16 17:34:21'),
	(10, 'Estable', 9.8, '2026-04-16 17:43:58'),
	(11, 'Peligro', 5.33, '2026-04-17 01:33:26'),
	(12, 'Peligro', 3.67, '2026-04-17 03:14:45'),
	(13, 'Estable', 9.21, '2026-04-17 03:15:25');

-- Dumping structure for table gas_monitor.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table gas_monitor.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'ramfepe9@gmail.com', '$2y$10$eN4Nc6b4xdeJzJyiAKUlK.hHiw8Fh8OClNFEA1EEERuwl/YOTYCDi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
