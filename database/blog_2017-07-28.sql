# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.5-10.2.7-MariaDB)
# Схема: blog
# Время создания: 2017-07-28 06:36:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `created_at`, `updated_at`)
VALUES
	(1,3,2,'Add comment (one)','2017-07-25 09:23:40','2017-07-25 09:23:40'),
	(2,3,2,'Add comment (two, $post->addComment($request))','2017-07-25 09:25:35','2017-07-25 09:25:35'),
	(3,3,2,'Add new comment (three, $this->comments()->create)','2017-07-25 09:33:35','2017-07-25 09:33:35'),
	(4,3,2,'Add new comment with validation (four)','2017-07-25 09:38:52','2017-07-25 09:38:52'),
	(5,3,2,'Add new comment with limits per low and high length (five).','2017-07-25 09:41:37','2017-07-25 09:41:37'),
	(6,5,1,'I am Haloway, I am a holyday!','2017-07-26 06:27:07','2017-07-26 06:27:07');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы post_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_tag`;

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;

INSERT INTO `post_tag` (`post_id`, `tag_id`)
VALUES
	(0,0),
	(1,2),
	(1,5),
	(1,6),
	(1,7),
	(1,13),
	(1,14),
	(1,20),
	(1,25),
	(1,26),
	(1,27),
	(2,2),
	(2,5),
	(2,6),
	(2,7),
	(2,13),
	(2,27),
	(3,2),
	(3,13),
	(3,20),
	(3,25),
	(3,26),
	(3,27),
	(5,27),
	(6,27),
	(7,1),
	(7,27),
	(8,3),
	(8,4),
	(8,7),
	(8,14),
	(8,20),
	(8,25),
	(8,27);

/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'Test #1','Add a post',3,'2017-07-25 09:20:38','2017-07-25 09:20:38'),
	(2,'Test #2','Add a post and comment for this',3,'2017-07-25 09:21:02','2017-07-25 09:21:02'),
	(3,'Test #3','Add a post on more after the now.',5,'2017-12-26 14:07:20','2017-12-26 14:07:25'),
	(5,'Test #4','Automatically adding tag \'something/all\' (*).',3,'2017-07-28 04:07:21','2017-07-28 04:07:21'),
	(6,'Test #5','My next stage - shall learned a final lesson of Laravel (#32) and learn not understood of me lessons.',3,'2017-07-28 04:13:24','2017-07-28 04:13:24'),
	(7,'My mind','Windows 7 must have for clearing and optimization on my notebook. But I can do it only after my work.',3,'2017-07-28 04:36:01','2017-07-28 04:36:01'),
	(8,'Larecast powered project','Larecast course with name \"Laravel 5.4 From Scratch\" was finished. Next: other ideas shall be implemented on this project. I created this task for me.',3,'2017-07-28 06:32:29','2017-07-28 06:32:29');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'personal','2017-07-27 15:25:41','2017-07-27 15:25:41'),
	(2,'public','2017-07-27 15:25:55','2017-07-27 15:25:55'),
	(3,'private','2017-07-27 15:26:17','2017-07-27 15:26:17'),
	(4,'projects','2017-07-27 15:26:35','2017-07-27 15:26:35'),
	(5,'work','2017-07-27 15:26:52','2017-07-27 15:26:52'),
	(6,'workflow','2017-07-27 15:27:04','2017-07-27 15:27:04'),
	(7,'php','2017-07-27 15:27:17','2017-07-27 15:27:17'),
	(8,'ruby','2017-07-27 15:27:29','2017-07-27 15:27:29'),
	(9,'python','2017-07-27 15:27:40','2017-07-27 15:27:40'),
	(10,'javascript','2017-07-27 15:27:53','2017-07-27 15:27:53'),
	(11,'finances','2017-07-27 15:28:06','2017-07-27 15:28:06'),
	(12,'games','2017-07-27 15:28:27','2017-07-27 15:28:27'),
	(13,'utils','2017-07-27 15:28:39','2017-07-27 15:28:39'),
	(14,'development','2017-07-27 15:28:58','2017-07-27 15:28:58'),
	(15,'deadline','2017-07-27 15:29:31','2017-07-27 15:29:31'),
	(16,'memento','2017-07-27 15:29:46','2017-07-27 15:29:46'),
	(17,'holiday','2017-07-27 15:30:08','2017-07-27 15:30:08'),
	(18,'WaR:TH','2017-07-27 15:30:42','2017-07-27 15:30:42'),
	(19,'graphical','2017-07-27 15:31:02','2017-07-27 15:31:02'),
	(20,'web','2017-07-27 15:31:15','2017-07-27 15:31:15'),
	(21,'installation','2017-07-27 15:32:18','2017-07-27 15:32:18'),
	(22,'charapter','2017-07-27 15:33:17','2017-07-27 15:33:17'),
	(23,'script','2017-07-27 15:33:30','2017-07-27 15:33:30'),
	(24,'api','2017-07-27 15:33:41','2017-07-27 15:33:41'),
	(25,'learning','2017-07-27 15:49:45','2017-07-27 15:49:45'),
	(26,'manual','2017-07-27 15:50:02','2017-07-27 15:50:02'),
	(27,'*','2017-07-28 10:36:35','2017-07-28 10:36:35');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id`, `user_id`, `body`, `completed`, `created_at`, `updated_at`)
VALUES
	(1,3,'Shall go to the HoMM? No! Shall copy <The Prince of the Atlantics> fragment from pages of notebook to files on notepad',0,'2017-07-24 08:43:52','2017-07-24 08:43:52'),
	(2,3,'Learn more lessons about Laravel',1,'2017-07-24 15:45:05','2017-07-24 15:45:05'),
	(3,3,'Create a ToDoList microsite powered by Laravel',1,'2017-07-24 15:46:19','2017-07-24 15:46:19'),
	(4,5,'Push all to the repository.',1,'2017-07-24 15:46:48','2017-07-24 15:46:48'),
	(5,3,'Take a shower on this evening',1,'2017-07-27 04:14:18','2017-07-27 04:14:18'),
	(6,8,'Laravel lessons: ending course.',1,'2017-07-27 06:19:04','2017-07-27 06:19:04'),
	(7,8,'Take a salary',1,'2017-07-27 06:20:02','2017-07-27 06:20:02'),
	(8,3,'Shall ended a Laravel course on Laracast.com.',1,'2017-07-28 05:45:31','2017-07-28 05:45:31'),
	(9,3,'Understans all Laravel 5.4 from scratch course.',0,'2017-07-28 13:26:38','2017-07-28 13:26:38');

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(3,'Dmitry','mironenko@gorodok.net','$2y$10$Ka.k2Pda5ExvHHcJOZg3ke9mTQxh.pvo.D9.f2TUQm38sV3tdi7GW','i9vTzzGaxHYvFa27hE2GvPCqJi5nwDnHZu0lSK3dQjjMhvC4xiVMYOMXgYO0','2017-07-26 04:24:28','2017-07-26 04:24:28'),
	(5,'Halvey','halo@way.org','$2y$10$eHf4sY0k5XneesMJINSH7u7wIDNuSa9abQZoawFvzRCqHqc4pZPoO','WWIGPeD6ARLZlfC342N0g2KxPC8R3vCETnXMb4gCVHdWxmcs4ZnqFjs0yigv','2017-07-26 06:24:25','2017-07-26 06:24:25'),
	(8,'guest','270d8f79fe-bb0838@inbox.mailtrap.io','$2y$10$UytNepQxn1YPs6uwatnjD.C/memQoG87sGFK0UdeBb0QP1I3xeari',NULL,'2017-07-27 05:26:03','2017-07-27 05:26:03');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
