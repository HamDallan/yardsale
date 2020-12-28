-- -------------------------------------------------------------
-- TablePlus 3.12.0(354)
--
-- https://tableplus.com/
--
-- Database: hallam
-- Generation Time: 2020-12-28 19:20:33.3400
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `city`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', 'Admin', 'dn212516@dal.ca', 'Admin', NULL, '$2y$10$8gfMhoVEtCvf9TRNENPv/eEGgzIslq1aQUnNvmdgVYpz0cWgRVS7G', 'Halifax', 'Admin', NULL, NULL, NULL),
('2', 'Daniel G Hallam', 'standingtelescopes@gmail.com', 'HamDallan', NULL, '$2y$10$OwM35qnlhhOvuElwz75djuOpLrZ0vUrVRHcFn0fiJRKWGyiIieosq', 'Halifax', 'user', NULL, '2020-12-28 22:33:18', '2020-12-28 22:33:18'),
('3', 'Dan Hallam', 'dan.hallam@email.com', 'DanHallam', NULL, '$2y$10$I/yrh6qGtUXycAegFYFZE.3rPJtdFuwaQulGFkMz7P6EzXCwrRYrm', 'Halifax', 'user', NULL, '2020-12-28 22:36:02', '2020-12-28 22:36:02');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;