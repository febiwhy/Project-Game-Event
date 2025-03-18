-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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

-- Dumping structure for table dbevent.contact_models
CREATE TABLE IF NOT EXISTS `contact_models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `telepon` bigint NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.contact_models: ~2 rows (approximately)
INSERT INTO `contact_models` (`id`, `foto`, `location`, `telepon`, `email`, `created_at`, `updated_at`) VALUES
	(5, '/storage/contact/2ajBEiklOShyBmvmXEP9gRDjZJDTV1oDf6jcwb3n.jpg', 'IlIlIlIlI', 12345678, 'wukwuk@gmail.com', '2025-03-13 01:20:12', '2025-03-13 01:20:12'),
	(6, '/storage/contact/VxJluJMuL9TJmnoziRl3r97O6ybcFni95a7BIwjd.png', 'IlIlIlIlI', 12345678123, 'user@gmail.com', '2025-03-17 21:26:10', '2025-03-17 21:26:10');

-- Dumping structure for table dbevent.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table dbevent.game_events
CREATE TABLE IF NOT EXISTS `game_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slot_limit` int NOT NULL DEFAULT '0',
  `slot_filled` int NOT NULL DEFAULT '0',
  `organizer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.game_events: ~9 rows (approximately)
INSERT INTO `game_events` (`id`, `name`, `thumbnail`, `description`, `deleted_at`, `created_at`, `updated_at`, `slot_limit`, `slot_filled`, `organizer`) VALUES
	(1, 'pokemon', 'storage/game-event/GvJwHks04rnrrPUQq4N6U9mX3C80DitbTUp9cSKe.png', 'ini deskripsi', '2025-02-11 11:50:06', '2025-02-11 11:46:29', '2025-02-11 11:50:06', 0, 0, NULL),
	(2, 'adudu', '/storage/game-event/WgPvKgHYitZ0hxIBlY7DcghrLCZol4PKJlnv0OMB.png', 'yoo', NULL, '2025-02-13 01:37:25', '2025-03-17 00:19:50', 10, 2, 'bagogo'),
	(3, 'alul', 'storage/images/game-event/0Jmle3aWsl248jD8x7k95U5rBBrkpSJyZPpvXSFe.jpg', 'iyfuyfyu', '2025-02-20 20:57:48', '2025-02-17 07:49:17', '2025-02-20 20:57:48', 0, 0, NULL),
	(4, 'bagogo', 'storage/game-event/AzfuXlEOnzq4WmH5uNtodb2kBwEsVDnIHHU1AhDY.png', 'nbtyntynyt', '2025-03-05 22:03:27', '2025-02-20 20:11:06', '2025-03-05 22:03:27', 0, 0, NULL),
	(5, 'bagogo', 'storage/images/game-event/g8N3mstbuhaMSJTgl79FeCa1qh31fHk16gdERc8z.png', 'ghtnh', '2025-03-05 22:03:30', '2025-02-20 20:51:39', '2025-03-05 22:03:30', 12, 0, NULL),
	(6, 'joko', '/storage/images/game-event/2SSOwp39tgOuJFxyuvogc9gaUws12mRacNlpLAtJ.png', 'fvfrfvr', '2025-03-16 05:40:51', '2025-03-02 22:35:31', '2025-03-16 05:40:51', 20, 0, 'veerver'),
	(7, 'Byblade', 'storage/game-event/H9CSmKzEtyt4sFaQ3SXH4OZFDAUfhs35c3YszMar.png', 'yoooo', NULL, '2025-03-04 06:30:38', '2025-03-17 00:18:30', 20, 1, 'wong'),
	(8, 'Pokemon', '/storageimages/game-event/WtirHG3mxXLcKMlgxV0f6YeALc3wd2peeGj7lxOt.png', 'hee', '2025-03-05 22:03:24', '2025-03-05 22:02:10', '2025-03-05 22:03:24', 20, 0, 'wong'),
	(9, 'pokemon', '/storage/game-event/rQKSQiqSDj7ZQ5GVJMNB7kzI8vi5RMEkpk2Ex38h.png', 'gooo', '2025-03-16 06:01:48', '2025-03-05 22:03:53', '2025-03-16 06:01:48', 200, 0, 'wong');

-- Dumping structure for table dbevent.game_event_followers
CREATE TABLE IF NOT EXISTS `game_event_followers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_community` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_event_id` int NOT NULL,
  `owner_id` int NOT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `member` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.game_event_followers: ~4 rows (approximately)
INSERT INTO `game_event_followers` (`id`, `name_community`, `game_event_id`, `owner_id`, `platform`, `description`, `created_at`, `updated_at`, `user_id`, `member`) VALUES
	(21, 'asdasd', 7, 2, 'ergergrgeg', 'wgergerg', '2025-02-19 06:16:37', '2025-03-12 05:13:13', 1, '"2"'),
	(25, 'Digimon', 2, 1, 'Game', 'dewfewfewf', '2025-03-02 22:23:40', '2025-03-06 23:25:42', 1, '["1"]'),
	(26, 'Digimon', 4, 2, 'Game', 'fjdsjhierhf', '2025-03-02 22:26:41', '2025-03-02 22:26:41', 1, '["1","2"]'),
	(34, 'pokemon', 6, 1, 'mobile', 'uiguigyy', '2025-03-12 05:16:10', '2025-03-12 05:16:10', 1, '"1,2"');

-- Dumping structure for table dbevent.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.migrations: ~18 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2025_02_06_052751_create_pendaftaran_table', 1),
	(5, '2025_02_07_064637_add_address_coloum_to_pendaftaran_table', 2),
	(6, '2025_02_11_070134_create_permission_tables', 2),
	(7, '2025_02_11_123719_create_game_events_table', 3),
	(8, '2025_02_14_063753_create_game_event_followers_table', 4),
	(9, '2025_02_16_121219_remove_user_id_coloum_game_events_table', 5),
	(10, '2025_02_16_121908_update_user_and_coloum_game_event_followers_table', 6),
	(11, '2025_02_19_040156_update_member_coloum_game_event_followers_table', 7),
	(12, '2025_02_19_040839_remove_member_coloum_game_event_followers_table', 7),
	(13, '2025_02_19_041115_add_address_to_coloum_game_event_followers_table', 8),
	(14, '2025_02_19_135439_add_address_to_coloum_game_events_table', 9),
	(15, '2025_02_24_034927_add_address_to_coloum_pendaftaran_table', 10),
	(16, '2025_03_07_080551_create_contact_models_table', 11),
	(18, '2025_03_14_030851_add_address_to_coloum_game_pendaftar_id_table', 12),
	(19, '2025_03_14_031312_remove_is_following_coloum_table', 12);

-- Dumping structure for table dbevent.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.model_has_permissions: ~0 rows (approximately)

-- Dumping structure for table dbevent.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.model_has_roles: ~2 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(3, 'App\\Models\\User', 1),
	(4, 'App\\Models\\User', 2);

-- Dumping structure for table dbevent.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.password_resets: ~0 rows (approximately)

-- Dumping structure for table dbevent.pendaftaran
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` bigint NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_pendaftaran_id` int NOT NULL,
  `pendaftar_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `game_pendaftar_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pendaftaran_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.pendaftaran: ~3 rows (approximately)
INSERT INTO `pendaftaran` (`id`, `nama`, `email`, `id_number`, `whatsapp`, `alamat`, `foto`, `created_at`, `updated_at`, `event_pendaftaran_id`, `pendaftar_id`, `status`, `game_pendaftar_id`) VALUES
	(12, 'Andra', 'admin@gmail.com', '12345678901', 12345678, 'jl.gggg', 'foto/ONrXQkwhKHiXXNjEIZ9EFroIxUrNkG1xsRxiJ5B7.png', '2025-03-16 05:55:45', '2025-03-17 22:36:34', 7, 1, 'Diterima', 2),
	(14, 'Nadiem', 'wukwuk@gmail.com', '12345678901', 12345678, 'jl.hhmmm', 'foto/TNF79z3Z6zq5Yxg1IrQGXGv3yPr6TIO2WufkOQ1W.png', '2025-03-17 00:18:05', '2025-03-17 00:18:05', 2, 1, 'Menunggu', 2),
	(15, 'Joko', 'saitama@gmail.com', '12345678901', 12345678, 'adlnlkw', 'foto/gQz4QXAvwaLsam9uIguqQzmulJogZCkCcVkcIL6b.png', '2025-03-17 00:19:50', '2025-03-17 00:19:50', 2, 1, 'Menunggu', 2);

-- Dumping structure for table dbevent.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.permissions: ~0 rows (approximately)

-- Dumping structure for table dbevent.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(3, 'admin', 'web', '2025-02-11 09:55:22', '2025-02-11 09:55:22'),
	(4, 'user', 'web', '2025-02-11 09:55:22', '2025-02-11 09:55:22');

-- Dumping structure for table dbevent.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.role_has_permissions: ~0 rows (approximately)

-- Dumping structure for table dbevent.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbevent.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$xkTe6tT8xCI25Lc6d2AMpOgmG9kBVD8m.tG8vBj/pwKJavNejeAeG', NULL, '2025-02-11 09:57:25', '2025-02-11 09:57:25'),
	(2, 'User', 'user@gmail.com', NULL, '$2y$10$j.K0LX/NE2MI5o7O8QzdduBcVZkge99DFQExULAk04wiZy/VSlamy', NULL, '2025-02-11 09:57:25', '2025-02-11 09:57:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
