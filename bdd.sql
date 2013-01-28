# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: caketrek
# Generation Time: 2013-01-28 07:44:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) unsigned NOT NULL COMMENT 'l''utilisateur ayant posté le commentaire',
  `comment` text NOT NULL,
  `notation` tinyint(1) NOT NULL COMMENT 'notation de 0 à 5',
  `object_type` tinyint(1) DEFAULT NULL COMMENT '1 : guide comments || 2 : Journeys comments || 3 : tourists comments || 4 : tracks comments',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table guide_submission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guide_submission`;

CREATE TABLE `guide_submission` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tourist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table guides
# ------------------------------------------------------------

DROP TABLE IF EXISTS `guides`;

CREATE TABLE `guides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `languages` varchar(255) DEFAULT NULL,
  `trek_number` int(4) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `guides` WRITE;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;

INSERT INTO `guides` (`id`, `languages`, `trek_number`, `qualification`, `tourist_id`)
VALUES
	(1,'French',NULL,'bien',1);

/*!40000 ALTER TABLE `guides` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table journeys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `journeys`;

CREATE TABLE `journeys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `max_participant` int(4) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL COMMENT 'the id of the journey creator',
  `zone_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `journeys` WRITE;
/*!40000 ALTER TABLE `journeys` DISABLE KEYS */;

INSERT INTO `journeys` (`id`, `name`, `creation_date`, `max_participant`, `tourist_id`, `zone_id`)
VALUES
	(1,'Super voyages','2013-04-21 05:00:00',5,1,2);

/*!40000 ALTER TABLE `journeys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table journeys_tourists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `journeys_tourists`;

CREATE TABLE `journeys_tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `journey_id` int(11) NOT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `journeys_tourists` WRITE;
/*!40000 ALTER TABLE `journeys_tourists` DISABLE KEYS */;

INSERT INTO `journeys_tourists` (`id`, `journey_id`, `tourist_id`)
VALUES
	(1,1,1),
	(2,1,2);

/*!40000 ALTER TABLE `journeys_tourists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table journeys_tracks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `journeys_tracks`;

CREATE TABLE `journeys_tracks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `journey_id` int(11) unsigned NOT NULL,
  `track_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `journey_id` (`journey_id`),
  KEY `track_id` (`track_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tourists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tourists`;

CREATE TABLE `tourists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `last_name` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `nationality` varchar(80) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tourists` WRITE;
/*!40000 ALTER TABLE `tourists` DISABLE KEYS */;

INSERT INTO `tourists` (`id`, `last_name`, `first_name`, `age`, `nationality`, `user_id`)
VALUES
	(1,'Blanc-Pain ','Pierre',20,'Francais',3),
	(2,'Florent ','Chataignier',22,'France',1);

/*!40000 ALTER TABLE `tourists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tracks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tracks`;

CREATE TABLE `tracks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `distance` varchar(50) DEFAULT '',
  `difficulty_level` tinyint(1) DEFAULT NULL COMMENT 'Niveau de difficulté de 0 à 5 (5 étant le plus difficile)',
  `guide_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(40) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`)
VALUES
	(1,'florent','flochataignier@gmail.com','test'),
	(2,'guillaume','gbesnard72@gmail.com','vazy'),
	(3,'pierre','pierre.blancpain@gmail.com','test');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vote
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `journey_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `tourist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;

INSERT INTO `vote` (`id`, `journey_id`, `guide_id`, `tourist_id`)
VALUES
	(1,1,1,1);

/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table zone
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zone`;

CREATE TABLE `zone` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `zone` WRITE;
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;

INSERT INTO `zone` (`id`, `name`, `pays`)
VALUES
	(1,'Sahara','Afrique'),
	(2,'Himalaya','France');

/*!40000 ALTER TABLE `zone` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
