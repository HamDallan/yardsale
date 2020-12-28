-- -------------------------------------------------------------
-- TablePlus 3.12.0(354)
--
-- https://tableplus.com/
--
-- Database: hallam
-- Generation Time: 2020-12-28 19:33:05.9690
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `caption` varchar(255) NOT NULL,
  `price` bigint(20) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `profile_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `price` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) NOT NULL,
  `batch_id` char(36) NOT NULL,
  `family_hash` varchar(255) DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sequence`),
  UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  KEY `telescope_entries_batch_id_index` (`batch_id`),
  KEY `telescope_entries_family_hash_index` (`family_hash`),
  KEY `telescope_entries_created_at_index` (`created_at`),
  KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) NOT NULL,
  `tag` varchar(255) NOT NULL,
  KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  KEY `telescope_entries_tags_tag_index` (`tag`),
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
('1', '2014_10_12_000000_create_users_table', '1'),
('2', '2014_10_12_100000_create_password_resets_table', '1'),
('3', '2018_08_08_100000_create_telescope_entries_table', '1'),
('4', '2019_08_19_000000_create_failed_jobs_table', '1'),
('5', '2020_11_15_174723_create_profiles_table', '1'),
('6', '2020_11_17_153720_create_posts_table', '1'),
('7', '2020_11_18_185656_creates_profile_user_pivot_table', '1'),
('8', '2020_12_10_194323_request_table', '1');

INSERT INTO `posts` (`id`, `user_id`, `caption`, `price`, `image`, `city`, `created_at`, `updated_at`) VALUES
('2', '3', '-easel\r\n-tshirt (x3)\r\n-boots       \r\n-stool', '15', 'uploads/rbCxQ3HIm4uiynXFZzv1jyBuEaEsNmW6JHPSjOAF.jpeg', 'Halifax', '2020-12-28 22:37:44', '2020-12-28 22:37:44'),
('3', '3', '-Bicycle', '50', 'uploads/N2MVj8BvMd4BUSac0uZhGrzo58Sjf35EPsN5y5a7.jpeg', 'Halifax', '2020-12-28 22:38:54', '2020-12-28 22:38:54'),
('4', '2', '-Smart Watch', '200', 'uploads/JoIxscUaSY2JyHaY9xrzfBRcY3QSoJsZg7BO8zOB.jpeg', 'Halifax', '2020-12-28 22:40:21', '2020-12-28 22:40:21');

INSERT INTO `profiles` (`id`, `user_id`, `title`, `description`, `url`, `image`, `created_at`, `updated_at`) VALUES
('1', '1', 'Admin Profile', NULL, NULL, 'profile/pZw8I2rEHnKOyY12F2VhSCUJYd9pnPOx1yaKdAci.jpeg', NULL, '2020-12-28 21:05:14'),
('2', '2', 'HamDallan', 'Just selling some things', NULL, 'profile/7chgdo9zVlkw6o9B3DXPQ3GiOhaXWISJ5q1bgK4C.jpeg', '2020-12-28 22:33:18', '2020-12-28 23:23:22'),
('3', '3', 'DanHallam', NULL, NULL, NULL, '2020-12-28 22:36:02', '2020-12-28 22:36:02'),
('4', '4', 'Emilyjane', NULL, NULL, NULL, '2020-12-28 23:27:11', '2020-12-28 23:27:11');

INSERT INTO `requests` (`id`, `price`, `item`, `address`, `buyer`, `seller`, `status`, `post_id`, `created_at`, `updated_at`) VALUES
('1', '200', 'Watch', 'Halifax', 'emilymaceachern7@gmail.com', 'standingtelescopes@gmail.com', 'pending', '4', '2020-12-28 23:27:26', '2020-12-28 23:27:26');

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `city`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', 'Admin', 'dn212516@dal.ca', 'Admin', NULL, '$2y$10$8gfMhoVEtCvf9TRNENPv/eEGgzIslq1aQUnNvmdgVYpz0cWgRVS7G', 'Halifax', 'Admin', NULL, NULL, NULL),
('2', 'Daniel G Hallam', 'standingtelescopes@gmail.com', 'HamDallan', NULL, '$2y$10$OwM35qnlhhOvuElwz75djuOpLrZ0vUrVRHcFn0fiJRKWGyiIieosq', 'Halifax', 'user', NULL, '2020-12-28 22:33:18', '2020-12-28 22:33:18'),
('3', 'Dan Hallam', 'dan.hallam@email.com', 'DanHallam', NULL, '$2y$10$I/yrh6qGtUXycAegFYFZE.3rPJtdFuwaQulGFkMz7P6EzXCwrRYrm', 'Halifax', 'user', NULL, '2020-12-28 22:36:02', '2020-12-28 22:36:02'),
('4', 'Emily', 'emilymaceachern7@gmail.com', 'Emilyjane', NULL, '$2y$10$apU0m4btZBsW.6/Z2ScGd..4cA/z0599fENrCJjdFmIefAVKnF4ey', 'Halifax', 'user', NULL, '2020-12-28 23:27:11', '2020-12-28 23:27:11');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;