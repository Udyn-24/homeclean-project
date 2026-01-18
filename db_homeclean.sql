-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_homeclean
CREATE DATABASE IF NOT EXISTS `db_homeclean` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_homeclean`;

-- Dumping structure for table db_homeclean.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.addresses: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.bookings
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_code` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `cleaner_id` bigint(20) unsigned DEFAULT NULL,
  `address_id` bigint(20) unsigned NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` enum('pending','paid','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookings_invoice_code_unique` (`invoice_code`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_service_id_foreign` (`service_id`),
  KEY `bookings_cleaner_id_foreign` (`cleaner_id`),
  KEY `bookings_address_id_foreign` (`address_id`),
  CONSTRAINT `bookings_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `bookings_cleaner_id_foreign` FOREIGN KEY (`cleaner_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.bookings: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.cache: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.cache_locks: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.cleaner_profiles
CREATE TABLE IF NOT EXISTS `cleaner_profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.cleaner_profiles: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.jobs: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.job_batches: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_01_07_230916_create_cleaner_profiles_table', 1),
	(5, '2026_01_07_230916_create_services_table', 1),
	(6, '2026_01_07_230917_create_addresses_table', 1),
	(7, '2026_01_07_230917_create_bookings_table', 1),
	(8, '2026_01_07_230917_create_payments_table', 1),
	(9, '2026_01_07_230918_create_reviews_table', 1);

-- Dumping structure for table db_homeclean.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.payments: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.reviews
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.reviews: ~0 rows (approximately)

-- Dumping structure for table db_homeclean.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `duration_hours` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.services: ~9 rows (approximately)
INSERT INTO `services` (`id`, `name`, `description`, `price_per_hour`, `duration_hours`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'Basic Cleaning', 'Pembersihan standar harian: menyapu, mengepel, dan merapikan tempat tidur.', 50000.00, 2, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(2, 'Deep Cleaning', 'Pembersihan menyeluruh hingga ke sudut sulit, cocok untuk rumah yang lama tidak dibersihkan.', 100000.00, 4, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(3, 'VIP Cleaning (Sultan)', 'Layanan premium dengan 2 petugas, peralatan lengkap, dan pewangi ruangan aromaterapi.', 250000.00, 3, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(4, 'Ironing Service', 'Jasa setrika baju kiloan maupun satuan, dijamin rapi dan wangi.', 40000.00, 1, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(5, 'Bathroom Deep Clean', 'Membersihkan kerak kamar mandi, kloset, dan wastafel hingga kinclong kembali.', 75000.00, 2, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(6, 'Kitchen Cleaning', 'Membersihkan area dapur yang berminyak, kompor, dan cuci piring menumpuk.', 85000.00, 2, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(7, 'Sofa & Carpet Wash', 'Cuci basah/kering untuk sofa dan karpet guna menghilangkan debu dan tungau.', 150000.00, 3, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(8, 'Move-in / Move-out', 'Pembersihan total rumah kosong sebelum ditempati atau setelah pindahan.', 200000.00, 5, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(9, 'Post-Renovation', 'Membersihkan sisa cat, semen, dan debu tebal pasca renovasi rumah.', 180000.00, 6, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23');

-- Dumping structure for table db_homeclean.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('b3GIlr7yQ7l5kLs27iW6X6AREaL1R1rkUcF1qdQO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUNuemlNUnZ3R2xCQzFPTGo3NXFMNUpqR2dJYnBSSE1jOUFISkI4aSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768632264),
	('RUpHYsplBdBjQwWCbayDbfyn8Aa5zdDeQVsZCUXn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzNDUEdTYWJTTUNsejlkMnI1cDVhRGg5Q1BaT0FQUmlEaDByejZDUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767843048);

-- Dumping structure for table db_homeclean.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer','cleaner') NOT NULL DEFAULT 'customer',
  `phone_number` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_homeclean.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone_number`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'admin@homeclean.com', NULL, '$2y$12$rV2mLtu0b5ktvyOm.q5QFedkyIzld0sJGOL2hhOL4MzpNXlLVMJAS', 'admin', NULL, NULL, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23'),
	(2, 'Budi Customer', 'customer@homeclean.com', NULL, '$2y$12$Cf/NiUuI/9RY39vAN71/gucozanBp7jF0l2snbkcVYD5pUNYDTu3C', 'customer', NULL, NULL, NULL, '2026-01-07 19:36:23', '2026-01-07 19:36:23');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
