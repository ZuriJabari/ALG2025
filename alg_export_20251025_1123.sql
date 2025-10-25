-- MySQL dump 10.13  Distrib 9.4.0, for macos15.4 (arm64)
--
-- Host: 127.0.0.1    Database: alg
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_day_speaker`
--

DROP TABLE IF EXISTS `event_day_speaker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_day_speaker` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_day_id` bigint unsigned NOT NULL,
  `speaker_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_day_speaker_event_day_id_speaker_id_unique` (`event_day_id`,`speaker_id`),
  KEY `event_day_speaker_speaker_id_foreign` (`speaker_id`),
  CONSTRAINT `event_day_speaker_event_day_id_foreign` FOREIGN KEY (`event_day_id`) REFERENCES `event_days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_day_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_day_speaker`
--

LOCK TABLES `event_day_speaker` WRITE;
/*!40000 ALTER TABLE `event_day_speaker` DISABLE KEYS */;
INSERT INTO `event_day_speaker` VALUES (1,1,1,NULL,0,'2025-10-24 09:45:15','2025-10-25 07:40:44'),(2,2,1,NULL,0,'2025-10-24 09:45:15','2025-10-25 07:40:44'),(3,1,2,NULL,0,'2025-10-24 10:10:19','2025-10-24 10:10:19'),(4,1,3,NULL,0,'2025-10-24 10:39:51','2025-10-24 11:40:47'),(5,1,4,NULL,0,'2025-10-24 10:40:25','2025-10-24 10:40:25'),(6,1,5,NULL,0,'2025-10-24 10:40:51','2025-10-24 11:41:08'),(7,1,6,NULL,0,'2025-10-24 10:41:12','2025-10-25 06:01:37'),(8,1,7,NULL,0,'2025-10-25 06:02:01','2025-10-25 06:02:01'),(9,1,8,NULL,0,'2025-10-25 06:02:54','2025-10-25 06:02:54'),(10,1,9,NULL,0,'2025-10-25 06:03:16','2025-10-25 06:03:16'),(11,1,10,NULL,0,'2025-10-25 06:03:41','2025-10-25 06:03:41'),(12,1,11,NULL,0,'2025-10-25 06:04:05','2025-10-25 06:04:05'),(13,1,12,NULL,0,'2025-10-25 06:04:48','2025-10-25 06:04:48'),(14,2,13,NULL,0,'2025-10-25 06:05:25','2025-10-25 06:05:25'),(15,2,14,NULL,0,'2025-10-25 06:10:44','2025-10-25 06:10:44'),(16,2,15,NULL,0,'2025-10-25 06:11:06','2025-10-25 06:11:06'),(17,2,16,NULL,0,'2025-10-25 06:11:28','2025-10-25 06:11:28'),(18,2,17,NULL,0,'2025-10-25 06:11:46','2025-10-25 06:11:46'),(19,2,18,NULL,0,'2025-10-25 06:12:14','2025-10-25 06:12:14'),(20,2,19,NULL,0,'2025-10-25 06:12:52','2025-10-25 06:12:52'),(21,2,20,NULL,0,'2025-10-25 06:13:18','2025-10-25 06:13:18'),(22,2,21,NULL,0,'2025-10-25 06:13:54','2025-10-25 06:13:54'),(23,2,22,NULL,0,'2025-10-25 06:14:23','2025-10-25 06:14:23'),(24,2,23,NULL,0,'2025-10-25 06:14:45','2025-10-25 06:14:45'),(25,2,24,NULL,0,'2025-10-25 06:15:08','2025-10-25 06:15:08'),(26,2,25,NULL,0,'2025-10-25 06:15:25','2025-10-25 06:15:25'),(27,2,26,NULL,0,'2025-10-25 06:16:01','2025-10-25 06:16:01'),(28,2,27,NULL,0,'2025-10-25 06:16:42','2025-10-25 06:16:42'),(29,2,28,NULL,0,'2025-10-25 06:17:58','2025-10-25 06:17:58'),(30,2,29,NULL,0,'2025-10-25 06:18:18','2025-10-25 06:18:18'),(31,2,30,NULL,0,'2025-10-25 06:18:40','2025-10-25 06:18:40'),(32,2,31,NULL,0,'2025-10-25 06:19:08','2025-10-25 06:19:08');
/*!40000 ALTER TABLE `event_day_speaker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_days`
--

DROP TABLE IF EXISTS `event_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_days` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_days_event_id_foreign` (`event_id`),
  CONSTRAINT `event_days_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_days`
--

LOCK TABLES `event_days` WRITE;
/*!40000 ALTER TABLE `event_days` DISABLE KEYS */;
INSERT INTO `event_days` VALUES (1,2,'Day One',NULL,NULL,NULL,0,'2025-10-24 09:16:55','2025-10-24 09:16:55'),(2,2,'Day Two',NULL,NULL,NULL,0,'2025-10-24 09:45:15','2025-10-24 09:45:15');
/*!40000 ALTER TABLE `event_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_sessions`
--

DROP TABLE IF EXISTS `event_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_sessions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `day_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_sessions_event_id_foreign` (`event_id`),
  KEY `event_sessions_day_id_foreign` (`day_id`),
  CONSTRAINT `event_sessions_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `event_days` (`id`) ON DELETE SET NULL,
  CONSTRAINT `event_sessions_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_sessions`
--

LOCK TABLES `event_sessions` WRITE;
/*!40000 ALTER TABLE `event_sessions` DISABLE KEYS */;
INSERT INTO `event_sessions` VALUES (1,2,1,'Session I',NULL,'09:00:00','10:00:00',0,'2025-10-24 09:45:15','2025-10-24 09:45:15'),(2,2,1,'Session 2','Theme: Bridging the Divides; Building Trust & Responding to Africa’s Youths Quest to Lead','14:30:00','17:40:00',0,'2025-10-24 09:45:15','2025-10-24 10:22:47'),(3,2,2,'Session 3','The Legacy of Public Institutions in Modeling A “Good Society” & a Culture of Ethical Leadership','09:00:00','10:30:00',0,'2025-10-24 10:24:41','2025-10-24 10:24:41'),(4,2,2,'Session 4','Theme: Welcome to the Annual Leaders Gathering','10:30:00','11:30:00',0,'2025-10-24 10:25:43','2025-10-24 10:25:43'),(5,2,2,'Session 5','Opportunities for Development with a Focus on Human Capital Investment','11:30:00','12:45:00',0,'2025-10-24 10:26:48','2025-10-24 10:26:48'),(6,2,2,'Session 6','Theme: Shaping Leadership for the Africa We Want','14:20:00','15:45:00',0,'2025-10-24 10:31:07','2025-10-24 10:31:07'),(7,2,2,'Final Keynote Speech & Closing Remarks',NULL,'16:00:00','17:00:00',0,'2025-10-24 11:20:40','2025-10-24 11:20:40');
/*!40000 ALTER TABLE `event_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_speaker`
--

DROP TABLE IF EXISTS `event_speaker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_speaker` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `speaker_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `event_speaker_event_id_speaker_id_unique` (`event_id`,`speaker_id`),
  KEY `event_speaker_speaker_id_foreign` (`speaker_id`),
  CONSTRAINT `event_speaker_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_speaker`
--

LOCK TABLES `event_speaker` WRITE;
/*!40000 ALTER TABLE `event_speaker` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_speaker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `year` smallint unsigned NOT NULL,
  `display_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_description` text COLLATE utf8mb4_unicode_ci,
  `hero_cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_cta_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_content_type` enum('image','youtube') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `hero_video_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_at` datetime DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_cta_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_cta_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('upcoming','past') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'upcoming',
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`),
  KEY `events_year_index` (`year`),
  KEY `events_status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (2,2024,'2024 Annual Leaders Gathering','2024-alg-2024','ALG 2024','2024 The Annual Leaders Gathering',NULL,NULL,NULL,NULL,NULL,'image',NULL,NULL,'2024-11-14 11:56:18','Sheraton Kampala Hotel','ALG2024',NULL,NULL,NULL,NULL,1,'past',0,'2025-10-24 08:56:43','2025-10-24 23:25:51'),(3,2025,'2025 Annual Leaders Gathering','2025-2025-annual-leaders-gathering','2025 Annual Leaders Gathering','Building Together for Impact',NULL,NULL,NULL,NULL,NULL,'youtube','https://youtu.be/npP4oEplfYk?si=UGfzv8mvX7vQMsu2',NULL,'2025-11-22 09:00:00','Victoria Hall, Kampala Sheraton Hotel','ALG2025',NULL,NULL,NULL,NULL,1,'upcoming',0,'2025-10-24 11:46:52','2025-10-24 15:06:08');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_event_id_foreign` (`event_id`),
  CONSTRAINT `features_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `heroes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cta_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int NOT NULL DEFAULT '0',
  `content_type` enum('image','video') COLLATE utf8mb4_unicode_ci DEFAULT 'image',
  `video_url` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` enum('youtube','vimeo','local') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'youtube',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `heroes_event_id_foreign` (`event_id`),
  CONSTRAINT `heroes_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heroes`
--

LOCK TABLES `heroes` WRITE;
/*!40000 ALTER TABLE `heroes` DISABLE KEYS */;
INSERT INTO `heroes` VALUES (1,2,'2024 The Annual Leaders Gathering','The 2024 edition of the Annual Leaders Gathering took place on November 14th and 16th at the esteemed Sheraton Hotel. This transformative event brought together thought leaders, visionaries, and changemakers to explore innovative pathways to impactful leadership and foster global collaboration.\n',NULL,NULL,1,0,'image',NULL,'youtube','2025-10-24 11:28:07','2025-10-24 11:28:07'),(2,3,'Building Together for Impact','Inspiring Excellence Through Transformative Leadership.','Reserve your seat','http://localhost/register',1,0,'video','https://youtu.be/npP4oEplfYk?si=UGfzv8mvX7vQMsu2','youtube','2025-10-24 11:49:35','2025-10-24 15:38:45');
/*!40000 ALTER TABLE `heroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (4,'App\\Models\\Domain\\Speaker',1,'c95f7ce5-1a44-42c4-b9b7-e1473b703aaa','headshot','Awel','01K8ASQB8K7PHQP8DBCY8R4S4M.png','image/png','public','public',670950,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 09:45:15','2025-10-24 09:45:15'),(5,'App\\Models\\Domain\\Speaker',2,'e681e70b-72af-440f-805b-faec4e9b4581','headshot','Magnus','01K8ATTRK1FXV0DACWPVNGQF5T.png','image/png','public','public',645706,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:04:35','2025-10-24 10:04:35'),(6,'App\\Models\\Domain\\Speaker',3,'50236ac7-7093-4060-baf1-7e5d8755e407','headshot','CLare','01K8AVAS7DPN5MVPYQZMV70QAE.png','image/png','public','public',521341,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:13:20','2025-10-24 10:13:20'),(7,'App\\Models\\Domain\\Speaker',4,'68ef229c-88a8-450a-a5e6-c9708d707cbd','headshot','Raaaymond','01K8AVJY08T9NTK0WGM9DKWBD1.png','image/png','public','public',492590,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:17:47','2025-10-24 10:17:47'),(8,'App\\Models\\Domain\\Speaker',5,'6794fa4a-5a1a-4b85-b88e-6458a60933e7','headshot','Dr-Kigozi','01K8AVQAM0ND08WP6JZJHSQEMS.png','image/png','public','public',926805,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:20:11','2025-10-24 10:20:11'),(9,'App\\Models\\Domain\\Speaker',6,'dade04af-0330-4eee-a370-37b4741d11fd','headshot','Kingdavid','01K8AWHQPGG0J6M3PJ8GSC5EGQ.png','image/png','public','public',449496,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:34:37','2025-10-24 10:34:37'),(10,'App\\Models\\Domain\\Speaker',7,'3761224a-fef9-453b-9f5c-07ce491a789c','headshot','Lynette','01K8AX1E1FB0CMQ9TWVAE1TZVT.png','image/png','public','public',538916,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:43:11','2025-10-24 10:43:11'),(11,'App\\Models\\Domain\\Speaker',8,'98089a1c-9d55-49ad-8b9a-f5955b931662','headshot','Audrey','01K8AX4BRSSYV9382AWTF8SFZZ.png','image/png','public','public',575808,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:44:47','2025-10-24 10:44:47'),(12,'App\\Models\\Domain\\Speaker',9,'f3f8471c-8a8c-4148-a2c9-384e777a8d4e','headshot','memo','01K8AX7QBK9FVYTQCJC7JYC7PC.png','image/png','public','public',523280,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:46:37','2025-10-24 10:46:37'),(13,'App\\Models\\Domain\\Speaker',10,'34a2bf92-03c4-44a9-be2c-e75bfcbe806c','headshot','Julie','01K8AXAF89S541G4W495FMC4YK.png','image/png','public','public',449350,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:48:07','2025-10-24 10:48:07'),(14,'App\\Models\\Domain\\Speaker',11,'0dc29b29-6165-4da9-80cd-2c9aa487489c','headshot','Twasiima','01K8AXE0H5D9S8RMKPGW23P0C2.png','image/png','public','public',474960,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:50:03','2025-10-24 10:50:03'),(15,'App\\Models\\Domain\\Speaker',12,'f5a2ce97-e8d2-4049-9666-dfd2953417eb','headshot','Zuhuraa','01K8AXHWS5GN7P6345B1GKJP73.png','image/png','public','public',442737,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:52:10','2025-10-24 10:52:11'),(16,'App\\Models\\Domain\\Speaker',13,'07a02fee-9083-46d6-b061-b966d96839a7','headshot','Edgar','01K8AXNP3HFVJMTGH6TSB7E8R6.png','image/png','public','public',775450,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:54:15','2025-10-24 10:54:15'),(17,'App\\Models\\Domain\\Speaker',14,'38c4e0bb-99ac-4d9c-b0d6-f118253d3136','headshot','William','01K8AXS2XHGRDATA5A1H2WER2D.png','image/png','public','public',260660,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:56:06','2025-10-24 10:56:06'),(18,'App\\Models\\Domain\\Speaker',15,'8d2cd07c-2e50-4a5a-bbc9-b4809819f9a9','headshot','Sekitoleko','01K8AXW43H09EY8AKDVKSSN8HA.png','image/png','public','public',349954,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:57:46','2025-10-24 10:57:46'),(19,'App\\Models\\Domain\\Speaker',16,'f3f8a04f-dd94-4d67-ae14-a5e249ce4760','headshot','Sameer','01K8AXZ19NWA5A9QM2AQW3JFQX.png','image/png','public','public',621107,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 10:59:21','2025-10-24 10:59:21'),(20,'App\\Models\\Domain\\Speaker',17,'1d583366-236d-43db-8f42-ca96d9265e4b','headshot','Ibrahim','01K8AY11P74YNQFFEJHDJF56ZT.png','image/png','public','public',241466,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:00:27','2025-10-24 11:00:27'),(21,'App\\Models\\Domain\\Speaker',18,'1e9777bc-8d04-4f36-a43f-4d7a9200894c','headshot','Barbra','01K8AY3CRNEPXHGQQEDRDA3CYE.png','image/png','public','public',772420,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:01:44','2025-10-24 11:01:44'),(22,'App\\Models\\Domain\\Speaker',19,'c1729281-7215-4fe7-8d7e-8f4e843100ae','headshot','Lucy','01K8AY7DT2PDAFVY44JM8CKFB2.png','image/png','public','public',396543,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:03:56','2025-10-24 11:03:56'),(23,'App\\Models\\Domain\\Speaker',20,'cdfc5aef-58f8-492d-8533-10606dba971a','headshot','Karen','01K8AY9S51V9BBAEKC8MMHDZJ7.png','image/png','public','public',378216,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:05:13','2025-10-24 11:05:13'),(24,'App\\Models\\Domain\\Speaker',21,'e33d6dce-3f20-4bb1-b129-1ff225d517bd','headshot','Michael','01K8AYDCWBZQTWCPW7SJ959A6M.png','image/png','public','public',514184,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:07:12','2025-10-24 11:07:12'),(25,'App\\Models\\Domain\\Speaker',22,'3c7884d0-6c89-4882-92d0-70040c4ddddb','headshot','Naaisa','01K8AYJJ3QRA6WT1QHFT5WSB0C.png','image/png','public','public',1021918,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:10:01','2025-10-24 11:10:01'),(26,'App\\Models\\Domain\\Speaker',23,'0b45cba5-6235-42a7-8c62-9a26b19969e9','headshot','ANdrew','01K8AYMX550H19ZXXKRNXCGJ3Q.png','image/png','public','public',993788,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:11:18','2025-10-24 11:11:18'),(27,'App\\Models\\Domain\\Speaker',24,'45f6a254-6ed6-43a4-be26-e218f2c220df','headshot','Caathyrose','01K8AYQ8H2FG5S72256E3BTQGS.png','image/png','public','public',723880,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:12:35','2025-10-24 11:12:35'),(28,'App\\Models\\Domain\\Speaker',25,'0487f087-c02c-49bb-8af4-d1d9dbc41085','headshot','Niyitegeka','01K8AYRYEQJ704WE1PCG9EEFH5.png','image/png','public','public',668588,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:13:30','2025-10-24 11:13:30'),(29,'App\\Models\\Domain\\Speaker',26,'87da5552-576b-4cd8-be59-82784e78d65b','headshot','Busulwa','01K8AYVB158XS4X4NGNYQQ8BP2.png','image/png','public','public',461435,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:14:49','2025-10-24 11:14:49'),(30,'App\\Models\\Domain\\Speaker',27,'d4f83074-1ef7-4fe9-a26b-c6b3791af635','headshot','Reginald','01K8AYXHHK0ZCCMK4D79Z8680J.png','image/png','public','public',364775,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:16:01','2025-10-24 11:16:01'),(31,'App\\Models\\Domain\\Speaker',28,'d48df427-aeee-4c1f-9917-0453da166ff4','headshot','Judy','01K8AYYRYT1FR7TD93CQ3VMSFX.png','image/png','public','public',544047,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:16:41','2025-10-24 11:16:41'),(32,'App\\Models\\Domain\\Speaker',29,'2a4c016c-2e86-417b-9f85-3b42ae123ffd','headshot','iaain','01K8AZ0EG73N0W8ZJ2QXZV3KHY.png','image/png','public','public',549026,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:17:36','2025-10-24 11:17:36'),(33,'App\\Models\\Domain\\Speaker',30,'3719d18e-cb83-40bd-ab8e-f004369fb317','headshot','Kwame','01K8AZ36CY3SM0FBP8H39N3Q7M.png','image/png','public','public',518299,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:19:06','2025-10-24 11:19:06'),(34,'App\\Models\\Domain\\Speaker',31,'6cc7c108-1795-4f29-b358-776e6273583b','headshot','Dr-Magara','01K8AZ6GAP8HYRCXA60J94XMXY.png','image/png','public','public',595096,'[]','[]','{\"avatar\": true}','[]',1,'2025-10-24 11:20:54','2025-10-24 11:20:54'),(36,'App\\Models\\Domain\\Hero',2,'e14c0774-088e-4ab8-b7be-7bb36ce274fe','hero','hero1','01K8B0V108AN2BFCSEN0PRHAMQ.jpg','image/jpeg','public','public',1045953,'[]','[]','{\"hero_web\": true}','[]',1,'2025-10-24 11:49:35','2025-10-24 11:49:36'),(38,'App\\Models\\Domain\\Hero',1,'27d26231-2a6f-4696-bf5a-09f724231e31','hero','hero1','01K8D1XSE0BAAY3DYZ32SVMR3Y.jpg','image/jpeg','public','public',1045953,'[]','[]','{\"hero_web\": true}','[]',1,'2025-10-25 06:47:03','2025-10-25 06:47:04');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  KEY `menu_items_parent_id_foreign` (`parent_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,NULL,'About ALG','/about','_self',1,0,'2025-10-24 07:21:33','2025-10-24 23:53:40'),(2,1,NULL,'Speakers','/speakers','_self',1,0,'2025-10-24 21:05:54','2025-10-24 21:05:54'),(3,1,NULL,'ALG 2024 Recap','/events/2024','_self',1,0,'2025-10-24 21:07:21','2025-10-24 21:07:21'),(4,2,NULL,'LéO Africa Institute','https://leoafricainstitute.org','_blank',1,0,'2025-10-24 22:01:38','2025-10-24 22:01:38'),(5,2,NULL,'Huduma Fellowship','https://leoafricainstitute.org/huduma','_self',1,0,'2025-10-24 22:02:48','2025-10-24 22:02:48'),(6,2,NULL,'YELP','https://leoafricainstitute.org/yelp','_self',1,0,'2025-10-24 22:03:27','2025-10-24 22:03:27'),(7,2,NULL,'YELP LéO Africa Review','https://leoafricareview.com','_blank',1,0,'2025-10-24 22:04:01','2025-10-24 22:04:27');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_handle_unique` (`handle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Main Menu','Primary','2025-10-24 07:20:20','2025-10-24 07:20:20'),(2,'Footer Menu','Secondary','2025-10-24 07:20:30','2025-10-24 07:20:30');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_10_24_052346_create_media_table',2),(5,'2025_10_24_052404_create_events_table',2),(6,'2025_10_24_052405_create_speakers_table',2),(7,'2025_10_24_052406_create_testimonials_table',2),(8,'2025_10_24_052407_create_features_table',2),(9,'2022_12_14_083707_create_settings_table',3),(10,'2025_10_24_052830_site_settings',3),(11,'2025_10_24_052831_home_settings',3),(12,'2025_10_24_054820_add_annual_fields_to_events_table',3),(13,'2025_10_24_054821_add_event_id_to_features_table',3),(14,'2025_10_24_054822_create_event_speaker_table',3),(15,'2025_10_24_055723_create_sessions_table',4),(16,'2025_10_24_055724_create_session_items_table',5),(17,'2025_10_24_055725_create_session_item_speaker_table',5),(18,'2025_10_24_093700_add_hero_fields_to_events_table',6),(19,'2025_10_24_100610_create_event_days_table',7),(20,'2025_10_24_100620_add_day_id_to_event_sessions_table',7),(21,'2025_10_24_100630_add_category_to_speakers_table',7),(22,'2025_10_24_101430_create_menus_table',8),(23,'2025_10_24_101440_create_menu_items_table',8),(24,'2025_10_24_102900_create_event_day_speaker_table',9),(25,'2025_10_24_103600_add_date_text_to_event_days_table',10),(26,'2025_10_24_104500_add_display_year_to_events_table',10),(27,'2025_10_24_105600_add_theme_to_event_days_table',11),(28,'2025_10_24_110000_create_session_speaker_table',12),(29,'2025_10_24_111000_create_heroes_table',13),(30,'2025_10_24_111200_add_hashtag_to_events_table',14),(31,'2025_10_24_130000_add_quote_to_speakers_table',15),(32,'2025_10_24_140000_add_hero_content_type_to_events_table',16),(36,'2025_10_24_140100_add_content_type_to_heroes_table',17),(37,'2025_10_24_140200_add_video_type_to_heroes_table',17),(38,'2025_10_24_140300_fix_content_type_enum_in_heroes_table',17),(39,'2025_10_25_000000_create_newsletter_subscriptions_table',18),(40,'2025_10_25_020000_create_seat_reservations_table',18);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter_subscriptions`
--

DROP TABLE IF EXISTS `newsletter_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newsletter_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletter_subscriptions_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_subscriptions`
--

LOCK TABLES `newsletter_subscriptions` WRITE;
/*!40000 ALTER TABLE `newsletter_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seat_reservations`
--

DROP TABLE IF EXISTS `seat_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seat_reservations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` enum('Media','Public/Government','Corporate','Business','Civil Society') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seat_reservations`
--

LOCK TABLES `seat_reservations` WRITE;
/*!40000 ALTER TABLE `seat_reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `seat_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_item_speaker`
--

DROP TABLE IF EXISTS `session_item_speaker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_item_speaker` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_item_id` bigint unsigned NOT NULL,
  `speaker_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_item_speaker_session_item_id_speaker_id_unique` (`session_item_id`,`speaker_id`),
  KEY `session_item_speaker_speaker_id_foreign` (`speaker_id`),
  CONSTRAINT `session_item_speaker_session_item_id_foreign` FOREIGN KEY (`session_item_id`) REFERENCES `session_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_item_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_item_speaker`
--

LOCK TABLES `session_item_speaker` WRITE;
/*!40000 ALTER TABLE `session_item_speaker` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_item_speaker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_items`
--

DROP TABLE IF EXISTS `session_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `moderator_id` bigint unsigned DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_items_session_id_foreign` (`session_id`),
  KEY `session_items_moderator_id_foreign` (`moderator_id`),
  CONSTRAINT `session_items_moderator_id_foreign` FOREIGN KEY (`moderator_id`) REFERENCES `speakers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `session_items_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `event_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_items`
--

LOCK TABLES `session_items` WRITE;
/*!40000 ALTER TABLE `session_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_speaker`
--

DROP TABLE IF EXISTS `session_speaker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session_speaker` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `session_id` bigint unsigned NOT NULL,
  `speaker_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_speaker_session_id_speaker_id_unique` (`session_id`,`speaker_id`),
  KEY `session_speaker_speaker_id_foreign` (`speaker_id`),
  CONSTRAINT `session_speaker_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `event_sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `session_speaker_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_speaker`
--

LOCK TABLES `session_speaker` WRITE;
/*!40000 ALTER TABLE `session_speaker` DISABLE KEYS */;
INSERT INTO `session_speaker` VALUES (1,1,1,'Opening Remarks',0,'2025-10-24 09:45:15','2025-10-25 07:40:44'),(2,2,1,'Panelist',0,'2025-10-24 09:45:15','2025-10-25 07:40:44'),(3,1,2,'Welcome Address',0,'2025-10-24 10:10:19','2025-10-24 10:10:19'),(4,1,3,'Keynote Address',0,'2025-10-24 10:39:51','2025-10-24 11:40:47'),(5,1,4,'Moderator',0,'2025-10-24 10:40:25','2025-10-24 10:40:25'),(6,1,5,'Closing Reflections',0,'2025-10-24 10:40:51','2025-10-24 11:41:08'),(7,2,6,'Panelist',0,'2025-10-24 10:41:12','2025-10-25 06:01:37'),(8,6,1,'Panelist',0,'2025-10-24 11:39:54','2025-10-25 07:40:44'),(9,2,7,'Panelist',0,'2025-10-25 06:02:01','2025-10-25 06:02:01'),(10,2,8,'Panelist',0,'2025-10-25 06:02:54','2025-10-25 06:02:54'),(11,2,9,'Panelist',0,'2025-10-25 06:03:16','2025-10-25 06:03:16'),(12,2,10,'Moderator',0,'2025-10-25 06:03:41','2025-10-25 06:03:41'),(13,2,11,'Moderator',0,'2025-10-25 06:04:05','2025-10-25 06:04:05'),(14,2,12,'Closing Reflections',0,'2025-10-25 06:04:48','2025-10-25 06:04:48'),(15,3,13,'Master of Ceremony',0,'2025-10-25 06:05:25','2025-10-25 06:05:25'),(16,3,14,'Panelist',0,'2025-10-25 06:10:44','2025-10-25 06:10:44'),(17,3,15,'Panelist',0,'2025-10-25 06:11:06','2025-10-25 06:11:06'),(18,3,16,'Panelist',0,'2025-10-25 06:11:28','2025-10-25 06:11:28'),(19,3,17,'Panelist',0,'2025-10-25 06:11:46','2025-10-25 06:11:46'),(20,3,18,'Moderator',0,'2025-10-25 06:12:14','2025-10-25 06:12:14'),(21,4,19,'Opening Keynote',0,'2025-10-25 06:12:52','2025-10-25 06:12:52'),(22,4,20,'Moderator',0,'2025-10-25 06:13:18','2025-10-25 06:13:18'),(23,4,21,'Panelist',0,'2025-10-25 06:13:54','2025-10-25 06:13:54'),(24,4,22,'Panelist',0,'2025-10-25 06:14:23','2025-10-25 06:14:23'),(25,5,23,'Panelist',0,'2025-10-25 06:14:45','2025-10-25 06:14:45'),(26,5,24,'Panelist',0,'2025-10-25 06:15:08','2025-10-25 06:15:08'),(27,5,25,'Panelist',0,'2025-10-25 06:15:25','2025-10-25 06:15:25'),(28,5,26,'Moderator',0,'2025-10-25 06:16:01','2025-10-25 06:16:01'),(29,6,27,'Panelist',0,'2025-10-25 06:16:42','2025-10-25 06:16:42'),(30,6,28,'Panelist',0,'2025-10-25 06:17:58','2025-10-25 06:17:58'),(31,6,29,'Panelist',0,'2025-10-25 06:18:18','2025-10-25 06:18:18'),(32,6,30,'Moderator',0,'2025-10-25 06:18:40','2025-10-25 06:18:40'),(33,7,31,'Keynote Speaker',0,'2025-10-25 06:19:08','2025-10-25 06:19:08');
/*!40000 ALTER TABLE `session_speaker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('aFZsE0JGEnzDgpbgJbPpOxcMQWJd0iNvVYcSNZOw',NULL,'192.168.65.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTzZBcWpNMVBBOTU1VXkzenJsU1U4aHIxeUZDN3RZeXdETFFWTUg4UiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvZXZlbnRzLzIwMjQiO3M6NToicm91dGUiO3M6MTE6ImV2ZW50cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9fQ==',1761378303),('IrA79wLT3T7VkICMzuEdPZksoZ7HFNvXkQQ6xLRS',1,'192.168.65.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36','YTo5OntzOjY6Il90b2tlbiI7czo0MDoiNzZKVjJwZXVKWHMyNTlmaVRwVVJvSkh1N3V6ZW5kOXBYTWxFNVFPWSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vbG9jYWxob3N0L2V2ZW50cy8yMDI1IjtzOjU6InJvdXRlIjtzOjExOiJldmVudHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRkLi5YeVNOckZvMVpRWHBvQzdwUmsuSXkzQ1lxOTBtNVIwcGYxaE1Xa1h6UlRFckVGMi91YSI7czoyMjoiUEhQREVCVUdCQVJfU1RBQ0tfREFUQSI7YTowOnt9czo4OiJmaWxhbWVudCI7YTowOnt9czo2OiJ0YWJsZXMiO2E6MTp7czo0MToiMjRlMzlmOWY5ZTg0YTNmYmYyNTVjNjA5MGM0YWY0NTZfcGVyX3BhZ2UiO3M6MjoiNTAiO319',1761378303),('nHqRAekdCcjw13Au3MPHfZJlCbfSlozOdgAVGcF0',NULL,'192.168.65.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0.1 Safari/605.1.15','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNFF4cldaUEpRa0ozbzhJVjVxdFJwaG9LTUN1ZXRjUjN5eU5qbnBzVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjI6Imh0dHA6Ly9sb2NhbGhvc3QvYWJvdXQiO3M6NToicm91dGUiO3M6NToiYWJvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319',1761378835);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `payload` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_group_name_unique` (`group`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `speakers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_bio` text COLLATE utf8mb4_unicode_ci,
  `quote` text COLLATE utf8mb4_unicode_ci,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `speakers_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `speakers`
--

LOCK TABLES `speakers` WRITE;
/*!40000 ALTER TABLE `speakers` DISABLE KEYS */;
INSERT INTO `speakers` VALUES (1,'Awel Uwihanganye','Co-founder & Program Lead at LéO Africa Institute','LéO Africa Institute',NULL,'awel-uwihanganye','Awel Uwihanganye is an accomplished management & leadership specialist with expert skills in executive management, communications and public relations, resource mobilization, diplomacy, and leadership development.\n\nAs a founder of several change initiatives, he is keenly interested in entrepreneurship, in the power of ideas, to change lives, shape society, and advance development, and \'envisions Africa as a frontier for opportunity and growth with a confident, self-aware generation of rising African leaders at the center of this renaissance\'.\n\nHe is a proud alumnus of Concordia University-Montreal Canada, a privileged fellow of the African Leadership Initiative—East Africa, and a Member of the Aspen Institute\'s Global Leadership Network.','The Annual Leaders\' Gathering is a convening and ideas platform to facilitate conversations and meeting of minds among leaders at the forefront of changing society.','https://x.com/Uwihanganye_A','https://t.co/cBgKqDIhjV','https://leoafricainstitute.org',0,'2025-10-24 07:28:02','2025-10-25 07:40:44'),(2,'Magnus Mchunguzi','Co-founder LéO Africa Institute & Chief Executive Yellow dot Africa','LéO Africa Institute',NULL,'magnus-mchunguzi','Magnus Mchunguzi is a distinguished leader with extensive experience in organizational development and strategic leadership. As the Co-Founder and Chairman of the Leadership Enlightenment Organization (LEO), he drives innovation in governance and ethical leadership across East Africa.\n\nWith a passion for transformative leadership, Magnus has dedicated his career to developing and implementing innovative solutions that address complex organizational challenges. His approach combines strategic thinking with practical implementation, ensuring sustainable impact in the organizations he works with.',NULL,NULL,NULL,NULL,0,'2025-10-24 10:04:35','2025-10-24 10:04:35'),(3,'Clare Akamanzi','Chief Executive Officer, NBA Africa','NBA Africa','Keynote Address','clare-akamanzi','Clare Akamanzi is a transformative leader and the Chief Executive Officer of NBA Africa. Her vision and drive have helped shape impactful economic policies that boost business growth and development across the continent.\n\nKnown for her commitment to enhancing Africa’s global presence, Clare has tirelessly advocated for strategic investments in Africa’s youth and future leaders.\n\nAt #ALG2024, Clare will set the stage with a keynote address, inspiring conversations that drive innovation, inclusivity, and progress for Africa.','The obvious way to identify a team is qualification but for me, the second thing is the attitude of people. Without the right attitude, even the most qualified fail to get results.',NULL,NULL,NULL,0,'2025-10-24 10:13:20','2025-10-24 11:40:47'),(4,'Raymond Mujuni','YELP Fellow Class of 2017',NULL,NULL,'raymond-mujuni','Mujuni Raymond is a reputable and seasoned communications professional with core expertise in governance, International Relations and International Development. Raymond Mujuni is a co-founder of the African Institute for Investigative Journalism and a columnist for the Nation Media Group in Uganda. Raymond combines his robust knowledge in law, current affairs, governance, international trade and finance with incisive analysis and robust social networks to create newer perceptions of problems, solutions and strategies.\n',NULL,'https://twitter.com/qataharraymond','https://www.linkedin.com/in/mujuniraymond','http://qatahar.com/',0,'2025-10-24 10:17:47','2025-10-24 10:17:47'),(5,'Prof. Maggie Kigozi','Ugandan Entrepreneur, Chairperson of the Board at Zuri Model Farm Ltd','Zuri Model Farm Ltd','Closing Reflections','prof-maggie-kigozi','Margaret Blick Kigozi is a Ugandan medical doctor, business consultant, educator, and sportswoman. She is a consultant at the United Nations Industrial Development Organization. She formerly served as the executive director of the Uganda Investment Authority, from 1999 until 2011.\n','LeO Africa Institute is a born child of the ideas of the Africa Leadership Institute. We are so excited to see Awel take Ali Mufuruki’s legacy of building a critical mass of ethical, and values-based leaders forward.',NULL,NULL,NULL,0,'2025-10-24 10:20:11','2025-10-24 11:41:08'),(6,'KingDavid Ayo-Loto','Creative Storyteller/Artist, Lagos - Nigeria',NULL,'Panelist','kingdavid-ayo-loto','KingDavid Ayo-Loto is a Nigerian creative storyteller, artist, and social media content creator known for deconstructing stereotypes about Africans. He is also recognized as a viral social media sensation and a rising figure in content creation. \n',NULL,NULL,NULL,NULL,0,'2025-10-24 10:34:37','2025-10-24 10:34:37'),(7,'Lynette Chen','Executive Director, Africa Leadership Initiative','Africa Leadership Initiative','Panelist','lynette-chen','Lynette Chen is an African development expert, having actively contributed to initiatives such as the BEE Charter and the Presidential International Advisory Council on ICT in South Africa. She was formerly a senior government and public affairs manager at Hewlett Packard South Africa (HP), being exposed to African and international business while implementing progressive policies in line with BEE principles.\n\nFrom 2004 to 2006, Lynette served as a Director and Chairperson of the NEPAD Business Foundation’s ICT Sector working group. In 2006 she was seconded by HP to serve as the CEO of the NEPAD Business Foundation (NBF) and was appointed on a full time basis at the NBF in 2007.She is deeply passionate about the continent and believes that in order for social and economic transformation to take place, we need to advocate for private sector-led initiatives aligned to the African Union’s NEPAD programmes. Through her leadership, she has grown the NBF from a staff compliment of 2 to a dynamic team of 20. In 2011 NBF established an office in Mozambique and in 2013 expanded into Zambia and Malawi and most recently, established an office in Ethiopia in 2015. \n\nLynette also serves on the Board of Directors of FANRPAN, a continental organization focusing on impacting policies in the agriculture sector. She also previously served as Vice-Chair of Enablis, an entrepreneurship development programme that emanated from the United Nations G8 Dot Force task team in 2001.\n\nAs a representative for private sector in Africa, Lynette is often invited by multilateral and regional organisations such the United Nations, African Union Commission, UNECA, African Development Bank to provide input and insight in the development of African and regional integration strategies.\n\nLynette has qualifications in Communications and Public Relations and completed the African Leadership Programme from Wits Business School in South Africa in 2007. She became a Fellow of the Aspen Institute’s African Leadership Initiative in 2015 and serves as its Executive Director.',NULL,NULL,NULL,NULL,0,'2025-10-24 10:43:11','2025-10-24 10:43:11'),(8,'Audrey S-Darko','Founder and Chief Executive Officer, Sabon Sake, West Africa','Sabon Sake','Panelist','audrey-s-darko','Audrey S-Darko is a Ghanaian climate-tech entrepreneur and founder of Sabon Sake, a company that converts agricultural waste into organic fertilizer to help farmers increase their crop yields and restore degraded soil. An alumnus of Ashesi University, she leads Sabon Sake, which provides soil regeneration products and training, and was a winner of the US Department of State Climate Entrepreneurs Competition','The best way to bring young Africans to the table and get involved in decision-making, policymaking, and strategy to facilitate this has to be implemented.',NULL,NULL,NULL,0,'2025-10-24 10:44:47','2025-10-24 11:42:23'),(9,'Memo Some','Climate Activist, Nairobi Kenya / YELP Fellow Class of 2023',NULL,'Panelist','memo-some','Memo Some is a Kenyan conservationist, advocate, and the founder and CEO of WildNow Foundation. Her career focuses on wildlife conservation, sustainable development, and empowering local communities, with a particular mission to preserve indigenous ecological knowledge.',NULL,NULL,NULL,NULL,0,'2025-10-24 10:46:37','2025-10-24 10:46:37'),(10,'Dr Julie Gichuru','President & CEO, Africa Leadership & Dialogue Institute','Africa Leadership & Dialogue Institute',NULL,'dr-julie-gichuru','Dr. Julie Gichuru is the founder and President and CEO of the Africa Leadership and Dialogue Institute (ALADI), a pan African organisation that drives progress and influence through African storytelling, knowledge building, agenda setting and leadership development.','Africa is a resource-rich continent, but also perception poor because even the rest of the world thinks of it as poor too. It starts with us, changing this perception.',NULL,NULL,NULL,0,'2025-10-24 10:48:07','2025-10-24 11:41:58'),(11,'Twasiima Bigirwa','Author & Feminist Lawyer',NULL,NULL,'twasiima-bigirwa','Twasiima Bigirwa is an African writer and artist born and bred in present day Uganda. She spends most of her time in liminal spaces dreaming to weave goodness and vitality into the world. Her intention is to use her art to undo from the colonial imagination and with that, conjure into existence new worlds. Twasiima writes in english and runyankore.\n',NULL,NULL,NULL,NULL,0,'2025-10-24 10:50:03','2025-10-24 10:50:03'),(12,'Zuhura Sinare Muro','Managing Partner, Impact Leadership Academy, Tanzania','Impact Leadership Academy, Tanzania',NULL,'zuhura-sinare-muro','Zuhura is a certified board director, certified Board chairperson, certified Emotional Intelligence Practitioner & Master Trainer, Certified Coach, HR Practitioner, and Aspen Global Leadership Network Fellow.\n\nShe has over 20 years of experience in providing Strategic HR advice, corporate training, and executive coaching.\n\nShe works with managers and senior leaders to support the change management process and create value for shareholders and other stakeholders, both in private and public-owned business enterprises.\nZuhura has been leading transformation in business enterprises through providing strategic oversight to management teams across several industries:  media, banking, insurance, social security fund, real estate, manufacturing, telecommunication, mining, energy, and not-for-profit organizations. She has strong board leadership experience within private companies with East Africa footprints, state owned enterprises, public institutions, and private sector business forums of Tanzania. Her current focus is supporting businesses to harness the human side of innovation to create sustainable success, at both oversight (as board director) and executive level through training and consultancy engagements. \n\n \nZuhura is passionate about Women in Leadership and runs an initiative under Impact Leadership Academy of enhancing female talent pool and referral to decision making roles. She designs and conducts several programs for building confidence and capacity for young women leaders in Sub Sahara Africa.\nShe is a recipient of Women In Management Africa (WIMA) award of 50 Influential women in management in Africa 2022. She is also featured in the International Finance Corporation (IFC) Report 2021 – “Leading Tanzania Women in Financial Services” for her achievements in board leadership role in the Banking sector and support for women in leadership.','I have a lot of hope in Africa, and that hope is in the abundance of young people. We have to shift from where we were in terms of branding our continent and the perception, move away from blaming history and becoming real.',NULL,NULL,NULL,0,'2025-10-24 10:52:10','2025-10-24 11:41:28'),(13,'Edgar Mwine','Program Officer Regional Programme Security Dialogue for East Africa, Huduma Fellow Class of 2023',NULL,NULL,'edgar-mwine','Mwine Edgar, is a Graduate of Economics, extroverted researcher and social commentator.\n\nI seek to use my passion and experience in economics and statistical analysis to understand varied social and economic challenges but also to design models to solve them.\n\nI’m a founder member of youth advocacy group – Youth Employment Support – Uganda (YES-UG) and have previously worked with the LéO Africa Institute as Programmes coordinator, Africa Institute for Energy Governance as a Research Associate and currently working with the Ministry of Internal Affairs, as an Immigration Officer.',NULL,NULL,NULL,NULL,0,'2025-10-24 10:54:15','2025-10-24 10:54:15'),(14,'William Babigumira','Certified Trade Adviser & Head of Faculty at the LéO Africa Institute','LéO Africa Institute',NULL,'william-babigumira','William Babigumira\'s professional experience spans the Public and Private sectors (a total of eighteen years) with extensive managerial and consulting experience in international business strategy, entrepreneurship, e-commerce, project management, and enterprise development.\n\nWilliam is the Chief Executive Officer of Pentascope Strategy Consult Ltd and Head of Faculty at LéO Africa Institute.',NULL,NULL,NULL,NULL,0,'2025-10-24 10:56:06','2025-10-24 10:56:06'),(15,'Saxon Ssekitoleko','Drilling & Completions Engineer, TotalEnergies E&P Uganda| YELP Fellow Class of 2024',NULL,NULL,'saxon-ssekitoleko','Saxon Ssekitoleko is a Ugandan drilling and completions engineer currently working for TotalEnergies E&P Uganda. ',NULL,NULL,NULL,NULL,0,'2025-10-24 10:57:46','2025-10-24 10:57:46'),(16,'Sameer Luyombo','Director & Analyst, Taibah International Schools','Taibah International Schools',NULL,'sameer-luyombo','Sameer Luyombo is a technology and social development specialist who is the Director at Taibah International Schools Ltd.. He is also associated with the LéO Africa Institute and has participated in leadership programs, where he has discussed his personal journey in understanding ethical leadership. \n',NULL,NULL,NULL,NULL,0,'2025-10-24 10:59:21','2025-10-24 10:59:21'),(17,'Ibrahim Wanume Mwima','Investments Officer - Infrastructure, Uganda Development Bank','Uganda Development Bank',NULL,'ibrahim-wanume-mwima','Ibrahim Wanume Mwima is an Investments Officer at Uganda Development Bank (UDB), specializing in infrastructure. He holds a Bachelor of Science in Mechanical Engineering and has participated in events like the LéO Africa Institute Annual Leaders Gathering 2024. \n',NULL,NULL,NULL,NULL,0,'2025-10-24 11:00:27','2025-10-24 11:00:27'),(18,'Barbra Kasekende','Head of the Advisory Department, Uganda Development Bank','Uganda Development Bank',NULL,'barbra-kasekende','Barbara Kasekende is a Ugandan businesswoman and corporate executive who serves as the head of the Advisory Department at Uganda Development Bank, the country\'s only indigenous, government-owned development financial institution. She took up this position in February 2022.\n',NULL,NULL,NULL,NULL,0,'2025-10-24 11:01:44','2025-10-24 11:01:44'),(19,'Lucy Mbabazi','Managing Director, Better than Cash Alliance and Chairperson Emeritus, LéO Africa Institute',' LéO Africa Institute','Keynote','lucy-mbabazi','Lucy is the Managing Director at the United Nations hosted Better Than Cash Alliance. Since 2020, she has been leading the Alliance’s Africa Policy, Advocacy & Partnerships efforts, working with regional and continental organizations to accelerate the adoption and usage of digital payments as a catalyst for digital financial inclusion for every African, notably the successful integration of responsible digital payments and digital public infrastructure into the African Continental Free Trade Area (AfCFTA) Protocol on Digital Trade.\n\nBefore joining the United Nations, Nshuti served as Ecobank Group Manager, Push Payments & Merchant Acquiring, leading the development and deployment of merchant payment solutions for 33 countries across Africa: Country Manager Rwanda, Burundi, and Malawi for Visa Inc. and Strategy and Policy Advisor to Rwanda Development Board IT Department.\n\nNshuti is President Emeritus of Girls in ICT Rwanda, which is inspiring more Rwandan and African girls to choose careers in STEM; Board Chair Emeritus Leo Africa Institute, which is nurturing Young & Emerging Leaders across Africa; Former Non-Executive Director of BBOXX Rwanda Board, which is powering Rwandan homes with solar electricity; Former Chair Rwanda Internet Community Association (RICTA), which represents the interests of Rwandans on the internet, and former Advisory Board Member to Girl Effect, which worked to equip Rwanda’s adolescent girls to reach their full potential.\n\nNshuti holds a Master of Science in Public Policy from Harvard Kennedy School of Government and a Bachelor of Science in Information Technology & Management from Laroche University.',NULL,NULL,NULL,NULL,0,'2025-10-24 11:03:56','2025-10-24 11:03:56'),(20,'Karen Nankwanga','Energy and Sustainability Practitioner, YELP Fellow, Class of 2022 and WWF Uganda Country Office','WWF Uganda Country Office',NULL,'karen-nankwanga','Karen Nankwanga is an energy lawyer and project management practitioner (PMP) who focuses on renewable energy policy, sustainability, and climate change. She works with countries in Europe and Sub-Saharan Africa to help them meet net-zero carbon goals and has researched renewable energy financing and integration. She is also a fellow and has moderated sessions at events related to African governance. \n',NULL,NULL,NULL,NULL,0,'2025-10-24 11:05:13','2025-10-24 11:05:13'),(21,'Michael Mugisha','Department of International Development, London School of Economics','London School of Economics',NULL,'michael-mugisha','While working at Ibero Uganda, Michael also taught undergraduate classes at Makerere University in the field of economic demography. Michael holds MSc. degrees in Economics and Development Management, respectively from LSE and the London Metropolitan University and a BSc. in Population Studies from Makerere University.\n',NULL,NULL,NULL,NULL,0,'2025-10-24 11:07:12','2025-10-24 11:07:12'),(22,'Naïssa Umutoni Karekezi','Business Development Supervisor, African Management Institute YELP Fellow Class of 2024',NULL,NULL,'naissa-umutoni-karekezi','Naissa is a business development and leadership sourcing supervisor at African Management Institute. Her professional impact demonstrates transformation at scale.\n\nShe has successfully supervised the recruitment of over 3,800 participants for youth employment programs, and managed the selection of 240 Growth Guides across 15 districts for MasterCard Foundation initiatives in Rwanda.\n\nBeyond her technical competencies in strategic planning and organizational leadership lies her transformative vision—that systematic talent identification and development can serve as Africa\'s new currency, creating sustainable employment while building the entrepreneurial ecosystem our continent needs.',NULL,NULL,NULL,NULL,0,'2025-10-24 11:10:01','2025-10-24 11:10:01'),(23,'Andrew Mbigiti','Media and Publicity Supervisor, CNOOC Uganda, Huduma Fellow Class of 2024',NULL,NULL,'andrew-mbigiti','Media and Publicity Supervisor, CNOOC Uganda, Huduma Fellow Class of 2024',NULL,NULL,NULL,NULL,0,'2025-10-24 11:11:18','2025-10-24 11:11:18'),(24,'Catherinerose Barretto','Co-founder Binary (Labs) and Member Board of Directors, LéO Africa Institute',NULL,NULL,'catherinerose-barretto','Catherinerose Barretto is in pursuit of creating a future that is equitable, where the principles of diversity, equity and inclusion are understood and practiced. She is invested in building inclusive ecosystems and creating a workforce with skills that are in demand.\n\nShe has extensive experience working in talent acquisition and skills development in Eastern and Southern Africa; and supporting African start-ups, SMEs and entrepreneurs to develop solutions and build sustainable ventures.\n\nShe is a Fellow of the African Leadership EA Initiative and a member of the Aspen Global Leadership Network; Board member of the Alliance Francaise de Dar es Salaam; Steering Committee member for the Skills For Employment Tanzania Project, Board member of the African Leadership Initiative EA, and Founding Curator of the Dar es Salaam Global Shapers Hub.\n','Human Capital is the invisible infrastructure that builds economies. Unlike machines that depreciate over time, human Capital appreciates. It is the only investment that goes home each evening and returns with even more potential.',NULL,NULL,NULL,0,'2025-10-24 11:12:35','2025-10-24 11:44:23'),(25,'Michael Niyitegeka','Executive Director, Refactory and CDL Africa Country Manager for Uganda',NULL,NULL,'michael-niyitegeka','Executive Director, Refactory and CDL Africa Country Manager for Uganda',NULL,NULL,NULL,NULL,0,'2025-10-24 11:13:30','2025-10-24 11:13:30'),(26,'Priscilla Busulwa','Lawyer and Legal Consultant at Impact Investments, YELP Fellow Class of 2024',NULL,NULL,'priscilla-busulwa','Lawyer and Legal Consultant at Impact Investments, YELP Fellow Class of 2024\n',NULL,NULL,NULL,NULL,0,'2025-10-24 11:14:48','2025-10-24 11:14:48'),(27,'Reginald Tumusiime','Chief Executive Officer, CapitalSavvy',NULL,NULL,'reginald-tumusiime','Chief Executive Officer, CapitalSavvy','Africa is a rich continent, but the challenge is with the mindset. The Africa I want is one filled with productive young people who understand their space in this world and are ready to do the work.',NULL,NULL,NULL,0,'2025-10-24 11:16:01','2025-10-24 11:43:18'),(28,'Judy Lumumba','YELP Fellow, Class of 2019',NULL,NULL,'judy-lumumba','YELP Fellow, Class of 2019',NULL,NULL,NULL,NULL,0,'2025-10-24 11:16:41','2025-10-24 11:16:41'),(29,'Iain Usiri','CEO & co-founder @Ramani, YELP Fellow, Class of 2024',NULL,NULL,'iain-usiri','CEO & co-founder @Ramani, YELP Fellow, Class of 2024',NULL,NULL,NULL,NULL,0,'2025-10-24 11:17:36','2025-10-24 11:17:36'),(30,'Kwame Rugunda ','Executive Chairman Savannah Group & Senior Faculty Member LéO Africa Institute',NULL,NULL,'kwame-rugunda','An Electrical Engineer and Mathematician by training with experience in telecommunications, civic technology, and management consulting for governments.',NULL,NULL,NULL,NULL,0,'2025-10-24 11:19:06','2025-10-24 11:19:06'),(31,'Dr James Magara','Author, Futurist, Leadership Consultant & Dentist',NULL,NULL,'dr-james-magara','Dr. James Magara is a visionary leader who serves as founder, chairman, and board member across several influential organizations in Uganda and beyond. From establishing Jubilee Dental, to chairing the Uganda Heart Institute, Yobel Biashara Initiative  and the Uganda Jubilee Network, to shaping the future of dentistry as Dean of the School of Dentistry at Uganda Christian University (UCU), his leadership spans healthcare, education, and national transformation. He also contributes as a board member with Intercessors for Africa, among other impactful institutions. Through these roles, Dr. Magara continues to drive excellence, innovation, and transformation across multiple sectors.','The three stones that lay the foundation for progress are leadership, institutions, and people. If you\'re given a position to lead and you don\'t govern yourself, you\'ll make the same mistakes.',NULL,NULL,NULL,0,'2025-10-24 11:20:54','2025-10-24 11:42:59');
/*!40000 ALTER TABLE `speakers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','olara.lamara@gmail.com',NULL,'$2y$12$d..XySNrFo1ZQXpoC7pRk.Iy3CYq90m5R0pf1hMWkXzRTErEF2/ua',NULL,'2025-10-24 05:15:41','2025-10-24 06:23:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-25 11:23:24
