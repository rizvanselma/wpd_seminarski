-- Adminer 5.2.1 MySQL 8.0.42 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `laravel`;
CREATE DATABASE `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_author_id_foreign` (`author_id`),
  CONSTRAINT `blogs_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blogs` (`id`, `title`, `description`, `author_id`, `picture`, `created_at`, `updated_at`) VALUES
(1,	'aut',	'Impedit omnis aut expedita. Inventore laudantium praesentium ullam nam velit dicta et quis. Laboriosam quos eveniet voluptatem nihil eius.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(2,	'eaque',	'Placeat sed reiciendis neque voluptas. Magni atque libero odit tenetur in reiciendis non. Accusamus dicta repudiandae sunt quo et eveniet sed.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(3,	'aut',	'Illum illum ut qui delectus blanditiis enim voluptatum sint. Fugiat non consectetur voluptas quam debitis est.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(4,	'saepe',	'Quibusdam a voluptates ab similique recusandae ipsum. Rerum est aliquam sint aliquam veritatis quia eligendi dolorem. Labore quis adipisci laborum ut laboriosam facilis quia.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(5,	'laudantium',	'Magnam maiores corporis in. Fugiat a distinctio neque odit. Sed et est voluptatem. Ex nam sint voluptates. Cupiditate nihil quas iusto voluptas fugiat necessitatibus.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(6,	'quaerat',	'Assumenda sint neque officia sunt laboriosam rerum nobis. Ea laboriosam voluptatem numquam ad. Ipsa labore quia dolores sed sit. Deserunt optio similique ea architecto dolores quasi.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(7,	'sunt',	'Earum tenetur eum rerum nihil perferendis accusantium. Perspiciatis quo soluta consequuntur commodi sequi doloribus.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(8,	'a',	'Impedit et et natus deleniti laborum quae. Cupiditate doloribus magnam ipsum culpa voluptatem possimus tenetur. Quam eligendi ipsa exercitationem ut velit provident. Modi quia quia in.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(9,	'hic',	'Id in officiis aut vel et. Labore sapiente harum dolores maxime dolorem qui soluta aut. Et quidem consequatur eum aut. Qui consequatur nulla quis fugiat itaque.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26'),
(10,	'nisi',	'Quis omnis aliquam et blanditiis non nobis. Debitis earum ullam sed sunt. Voluptate asperiores illo adipisci ea consequuntur.',	1,	'http://localhost:8000/600x400.svg',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `title` = VALUES(`title`), `description` = VALUES(`description`), `author_id` = VALUES(`author_id`), `picture` = VALUES(`picture`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` bigint unsigned NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_blog_id_foreign` (`blog_id`),
  KEY `comments_author_id_foreign` (`author_id`),
  CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'2025_04_28_110331_create_blogs_table',	1),
(4,	'2025_04_29_084045_create_comments_table',	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `migration` = VALUES(`migration`), `batch` = VALUES(`batch`);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('V2O4kz5VG2Dt90Mj6uwWKqqxq9wSnZoy4kkeKCJv',	NULL,	'172.18.0.1',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGc0dDJNRVRhdjNMb2dNd3FCTFdzcDNNd3Z0TE4xd0NrUUNlZjRWdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1745920433)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `ip_address` = VALUES(`ip_address`), `user_agent` = VALUES(`user_agent`), `payload` = VALUES(`payload`), `last_activity` = VALUES(`last_activity`);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Selma Rizvan',	'karadza3006@gmail.com',	'2025-04-29 09:53:26',	'$2y$12$k90tbj82FEv6PVWfp4LLrOd1UlDLB5rsO5R8QKoOJ1Md3HF76kxKW',	'67SSPN6zGf',	'2025-04-29 09:53:26',	'2025-04-29 09:53:26')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `email` = VALUES(`email`), `email_verified_at` = VALUES(`email_verified_at`), `password` = VALUES(`password`), `remember_token` = VALUES(`remember_token`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

-- 2025-04-29 09:54:43 UTC
