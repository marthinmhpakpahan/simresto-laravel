# ************************************************************
# Sequel Ace SQL dump
# Version 20094
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.28-MariaDB)
# Database: simresto
# Generation Time: 2025-06-14 08:48:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attendance
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `started_path` varchar(255) DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `finished_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;

INSERT INTO `attendance` (`id`, `user_id`, `started_at`, `started_path`, `finished_at`, `finished_path`, `status`, `created_at`, `updated_at`)
VALUES
	(1,7,'2025-03-03 17:47:51','assets/img/karyawan/attendances/J3tE8M4ER11740998871.png','2025-03-03 06:05:19','assets/img/karyawan/attendances/xdXv6yJhH71740999919.jpg','Confirmed','2025-03-03 17:47:51','2025-03-04 04:27:14'),
	(2,7,'2025-03-04 09:25:05','assets/img/karyawan/attendances/urIEbOoaZ71741055105.jpg','2025-03-04 11:03:46','assets/img/karyawan/attendances/gSd129EVJ81741061026.png','Declined','2025-03-04 09:25:05','2025-03-04 04:28:21');

/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cache_locks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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



# Dump of table job_batches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
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



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
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



# Dump of table leave
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leave`;

CREATE TABLE `leave` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `leave` WRITE;
/*!40000 ALTER TABLE `leave` DISABLE KEYS */;

INSERT INTO `leave` (`id`, `user_id`, `admin_id`, `title`, `start_date`, `end_date`, `description`, `attachment`, `status`, `created_at`, `updated_at`)
VALUES
	(1,7,NULL,'Ijin Sakit','2025-03-10','2025-03-12','Maaf pak saya ijin sakit, terlampir surat dokter saya pak.\r\nTerima kasih pak.','assets/img/karyawan/leaves/3bfBHXjZxr1741071885.jpg','Canceled','2025-03-04 07:04:45','2025-03-04 07:22:14'),
	(2,7,1,'Cuti Melahirkan','2025-03-28','2025-03-30','Saya mau ijin cuti melahirkan pak, suami saya nungguin','assets/img/karyawan/leaves/HPBHlOOSPy1741073016.pdf','Accepted','2025-03-04 07:23:36','2025-03-04 07:37:52'),
	(3,7,1,'Ijin Sakit','2025-03-13','2025-03-15','Maaf pak saya sakit\r\nJadi ijin dulu ya hehe','assets/img/karyawan/leaves/8GDcCEeAKm1741076133.pdf','Accepted','2025-03-04 08:15:33','2025-03-04 08:15:56'),
	(4,2,1,'Cuti Tahunan','2025-03-11','2025-03-15','Cuti tahunan boss mau liburan','assets/img/karyawan/leaves/hMHADX5TG31741076222.pdf','Accepted','2025-03-04 08:17:02','2025-03-04 08:17:15');

/*!40000 ALTER TABLE `leave` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table material
# ------------------------------------------------------------

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;

INSERT INTO `material` (`id`, `name`, `description`, `image`, `unit`, `price`, `weight`, `created_at`, `updated_at`)
VALUES
	(1,'Gula Pasir 2','Gula Pasir','assets/img/material/images/xSgfieKaEx1748922257.jpg','KG',21300,1,'2025-02-24 09:32:54','2025-06-04 13:23:27'),
	(2,'Tepung Beras Rose Brand','','assets/img/material/images/srdVgHYoyP1740390102.jpg','G',8500,500,'2025-02-24 09:41:42','2025-02-24 09:41:42'),
	(3,'Kecap Asin ABC','','assets/img/material/images/d4pkVBrB3J1740390531.jpg','ML',6600,131,'2025-02-24 09:48:51','2025-02-24 09:48:51'),
	(4,'Kecap Manis Bango','','assets/img/material/images/Ap6ArDuorp1740390589.jpg','ML',28600,520,'2025-02-24 09:49:49','2025-02-24 09:49:49'),
	(5,'Minyak Goreng Bimoli','','assets/img/material/images/oDrB6RxniV1740390660.jpg','L',45900,2,'2025-02-24 09:51:00','2025-02-24 09:51:00'),
	(6,'Mie Kering Keriting Burung Dara','','assets/img/material/images/NRCvFjl7GP1740390798.jpg','G',13500,600,'2025-02-24 09:53:18','2025-02-24 09:53:18'),
	(7,'Cabe Rawit Merah Petik','','assets/img/material/images/GYJyBoQ3gf1740390879.jpg','G',16600,100,'2025-02-24 09:54:39','2025-02-24 09:54:39'),
	(8,'Kaldu Sapi Indofoot','','assets/img/material/images/znfaOjaMxX1740390965.jpg','G',13300,100,'2025-02-24 09:56:05','2025-02-24 09:56:05');

/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;

INSERT INTO `menu` (`id`, `menu_category_id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,1,'Mie Ayam Tao Shi updated','Mie Ayam Tao Shi updated','2025-02-24 18:29:15','2025-06-04 13:28:42'),
	(2,1,'Mie Goreng Spesial','Mie Goreng Spesial adalah hidangan klasik Indonesia yang selalu berhasil memanjakan lidah dengan perpaduan rasa gurih, manis, dan sedikit pedas yang pas. Ini bukan sekadar mie goreng biasa; \"spesial\" di sini berarti penggunaan bahan-bahan premium dan racikan bumbu rahasia yang membuatnya istimewa dan tak terlupakan.','2025-06-05 13:44:24','2025-06-05 13:44:24');

/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_category`;

CREATE TABLE `menu_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_category` WRITE;
/*!40000 ALTER TABLE `menu_category` DISABLE KEYS */;

INSERT INTO `menu_category` (`id`, `name`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Makanan','Makanan aja','2025-02-25 00:12:09','2025-02-25 00:12:09'),
	(2,'Minuman','Minuman aja','2025-02-25 00:12:12','2025-02-25 00:12:12');

/*!40000 ALTER TABLE `menu_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_images`;

CREATE TABLE `menu_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_images` WRITE;
/*!40000 ALTER TABLE `menu_images` DISABLE KEYS */;

INSERT INTO `menu_images` (`id`, `menu_id`, `path`, `created_at`, `updated_at`)
VALUES
	(2,1,'assets/img/menu/images/x6caSdtZIw1740421755.jpeg','2025-02-24 18:29:15','2025-02-24 18:29:15'),
	(3,1,'assets/img/menu/images/MUHIthFchO1740421755.jpg','2025-02-24 18:29:15','2025-02-24 18:29:15'),
	(9,2,'assets/img/menu/images/3DzVa8uBWt1749131064.jpg','2025-06-05 13:44:24','2025-06-05 13:44:24'),
	(10,2,'assets/img/menu/images/bvh5NgtseX1749131064.jpg','2025-06-05 13:44:24','2025-06-05 13:44:24'),
	(11,2,'assets/img/menu/images/GMfGLPh0wV1749131064.jpg','2025-06-05 13:44:24','2025-06-05 13:44:24'),
	(12,2,'assets/img/menu/images/adIOxN0HAO1749131064.jpg','2025-06-05 13:44:24','2025-06-05 13:44:24');

/*!40000 ALTER TABLE `menu_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_recipe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_recipe`;

CREATE TABLE `menu_recipe` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_recipe` WRITE;
/*!40000 ALTER TABLE `menu_recipe` DISABLE KEYS */;

INSERT INTO `menu_recipe` (`id`, `menu_id`, `material_id`, `unit`, `weight`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'G',22,'2025-02-27 09:09:54','2025-06-05 13:41:08'),
	(2,1,5,'ML',35,'2025-02-27 09:41:49','2025-06-05 09:02:30'),
	(3,1,7,'G',60,'2025-02-27 09:42:56','2025-06-05 10:39:53'),
	(4,1,6,'G',150,'2025-02-27 09:56:52','2025-02-27 09:56:52'),
	(5,1,4,'G',30,'2025-02-27 14:37:41','2025-02-27 14:38:53'),
	(6,1,3,'G',10,'2025-02-27 16:06:30','2025-02-27 16:06:30');

/*!40000 ALTER TABLE `menu_recipe` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2025_02_18_101021_create_material_table',1),
	(2,'0001_01_01_000000_create_users_table',2),
	(3,'0001_01_01_000001_create_cache_table',2),
	(4,'0001_01_01_000002_create_jobs_table',2),
	(5,'2025_02_17_105608_create_role_table',2),
	(8,'2025_02_18_101033_create_menu_category_table',2),
	(9,'2025_02_18_101041_create_menu_table',2),
	(10,'2025_02_18_101051_create_menu_images_table',2),
	(11,'2025_02_18_101058_create_menu_recipe_table',2),
	(12,'2025_02_27_072434_create_unit_table',3),
	(16,'2025_02_18_100950_create_attendance_table',4),
	(17,'2025_02_18_101002_create_leave_table',5);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
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

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('DMUQgHhlsqvUEsDsvWESJayeoUROiKfxslxBzN1L',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieVVwblVNQkJBb3Qwa3gzcEYxbVVQMWZCVW90RzhIbWdndFJsMWlZYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749801346),
	('JOsrqNirfL2s6YihDDNPZ3NtC1gdnEP9wRb01Y2d',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGU5azhZdnpTTXJCNGhGeENDVk5BZWR4QmxLSUp5WFpXM0tNUm9wUSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21lbnUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1749731025),
	('KzZsg5MP0ykM5mURDlYdWIvwTT9PihbprYJs5Ace',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicDh4Vkl5YmxaZzBGeTRRNDRVZ1FVN1MxeDhFN3NjV2hiUzdKZjEySSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749819189),
	('PGK2LgzZ6CUVduSH42lrEqzXXouqyEGUIYKp7yG0',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVJMRGhuUEVSbEVJOVFqTUhGSkxiZjJmZjQyUU9VNGl6MVVISmM5TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749746810),
	('qc5RKSAwu3CPr4LtxwR0NDGlJ4nlztdO39VyRGmr',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidXYzUnNjTEMxY3JsTjhPRGd6dGhYaEpKc29KdnV3UXFzVTU2c2pGdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW51Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1749666827),
	('tbMVxbuf43OPFzdnt7wnDPmuTVKdYKZsBZs7NVQq',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXY2QXljNmE5aWpWd0l2Rml4RmJjRVh6NWZFdzZDWFhNenVIUE5XSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749836067),
	('V9kLasnm2op5t0M6lohW7YGxtkdvZzAG2Q5OV5fQ',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWFQTTdwM016cFZWRFp4VDZ5Y2xLTzFCc0JkblVhcUdqMFdvM2pwbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1749883193);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table unit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;

INSERT INTO `unit` (`id`, `name`, `code`, `created_at`, `updated_at`)
VALUES
	(1,'Miligram','MG','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(2,'Gram','G','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(3,'Ounce','OZ','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(4,'Kilogram','KG','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(5,'Kwintal','KW','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(6,'Ton','T','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(7,'Mililiter','ML','2025-02-27 14:28:35','2025-02-27 14:28:43'),
	(8,'Liter','L','2025-02-27 14:28:35','2025-02-27 14:28:43');

/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `identity_card` varchar(255) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `joined_since` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `email`, `full_name`, `username`, `password`, `phone_no`, `photo`, `identity_card`, `salary`, `joined_since`, `status`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,1,'admin@gmail.com','Administrator','admin','$2y$12$aa6I9geq74X2.VtBvGEkVulCwVV43FgsO.Ou4cqhQSyMt4AGCdM12','082208220822',NULL,NULL,NULL,'2025-02-17',1,'','2025-02-17 17:28:28','2025-02-17 17:28:28'),
	(2,2,'marthinmhpakpahan@gmail.com','Marthin Pakpahan','marthin','$2y$12$RgU1i4t8H6j/RTmIqiM.a.qE8loqgHVHXr.Z3iL7oLpFIIHCtRIZa','082167969321','assets/img/karyawan/photos/05gxRkip4i1739796045.png','assets/img/karyawan/identity_cards/0Vx418SKFC1739796045.jpeg',3000000,'2025-02-01',1,NULL,'2025-02-17 12:40:45','2025-02-17 12:40:45'),
	(3,2,'yohanasitumorang73@gmail.com','Yohana Situmorang','yohana','$2y$12$OwIkjFmJZqKcatIgmyZUv.C4GVCEUqqPamkyp6InWoqQ9D0pXeiHq','082371814375','assets/img/karyawan/photos/Ymu5NqdSdZ1739866431.png','assets/img/karyawan/identity_cards/KsozM76We31739866431.jpeg',10000000,'2025-01-01',1,NULL,'2025-02-18 08:13:51','2025-02-18 08:13:51'),
	(4,2,'testingkaryawan@gmail.com','Testing Karyawan','testing','$2y$12$yKtn2TKL89lLsuiWOW/63e3Thnk4Ev1U/rlc4SRCi1X17equgqDzG','082208220822','assets/img/karyawan/photos/34mVxlthCy1739866498.webp','assets/img/karyawan/identity_cards/SttCOrjEiQ1739866498.jpeg',1000000,'2025-01-31',1,NULL,'2025-02-18 08:14:58','2025-02-18 08:14:58'),
	(7,2,'karyawan@gmail.com','Karyawan','karyawan','$2y$12$aQvLj6U6ZUyvE278eHhpEeCnoBVdJpM3QCKp8HCJBiKt2Qx2wQjYe','089908220833','assets/img/karyawan/photos/IAZMdwFWP31740733550.jpg','assets/img/karyawan/identity_cards/235OuuLoj01740733550.jpeg',4000000,'2025-02-01',1,NULL,'2025-02-28 09:05:50','2025-02-28 09:05:50');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
