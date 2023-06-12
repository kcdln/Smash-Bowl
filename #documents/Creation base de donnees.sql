/* Creation de la BDD peu importe qu'elle existe deja ou non puis selection de celle-ci afin de pouvoir creer les tables */
DROP DATABASE IF EXISTS `smash_bowl`;

CREATE DATABASE `smash_bowl` /*!40100 COLLATE 'utf8_unicode_ci' */;

USE `smash_bowl`;

/* Creation de la table `user` ("Utilisateurs") */
CREATE TABLE `user` (
	`id_user` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`firstname` VARCHAR(255) NULL DEFAULT NULL,
	`lastname` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
    `role` SET('VISITOR', 'USER', 'COMMENTATOR', 'ADMINISTRATOR') NOT NULL DEFAULT 'VISITOR' COMMENT '\'VISITOR\' ("Visiteur"), \'USER\' ("Utilisateur"), \'COMMENTATOR\' ("Commentateur"), \'ADMINISTRATOR\' ("Administrateur")',
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_user`)
)
COMMENT='Contains the list of users who logged and used the application ("Utilisateurs")'
COLLATE='utf8_unicode_ci'
;

/* Creation de la table `team` ("Equipes") */
CREATE TABLE `team` (
	`id_team` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`country` VARCHAR(255) NOT NULL,
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_team`)
)
COMMENT='Contains the list of Super Bowl teams which integrated players ("Utilisateurs")'
COLLATE='utf8_unicode_ci'
;

/* Creation de la table `player` ("Joueurs") */
CREATE TABLE `player` (
	`id_player` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_team` INT(10) UNSIGNED NULL DEFAULT NULL,
	`jersey_number` TINYINT(2) UNSIGNED NOT NULL,
	`firstname` VARCHAR(255) NOT NULL,
	`lastname` VARCHAR(255) NOT NULL,
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_player`),
	CONSTRAINT `FK__player_team_id_team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON UPDATE CASCADE ON DELETE RESTRICT
)
COMMENT='Contains the list of players who can are in a team ("Joueurs")'
COLLATE='utf8_unicode_ci'
;

/* Creation de la table `match` ("Matchs") */
CREATE TABLE `match` (
	`id_match` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_team1` INT(10) UNSIGNED NOT NULL,
	`id_team2` INT(10) UNSIGNED NOT NULL,
	`date_start_at` DATE NOT NULL COMMENT 'Date format is \'YYYY-MM-DD\'',
	`hour_start_at` TIME NOT NULL COMMENT 'Hour format is \'HH:II:SS\'',
	`hour_end_at` TIME NOT NULL COMMENT 'Hour format is \'HH:II:SS\'',
	`status` ENUM('TO_COME','IN_PROGRESS', 'FINISHED', 'CANCELED') NOT NULL DEFAULT 'TO_COME' COMMENT '\'TO_COME\' ("A venir"),\'IN_PROGRESS\' ("En cours"), \'FINISHED\' ("Termine"), \'CANCELED\' ("Annule")',
	`weather` ENUM('CLEAR', 'SUNNY', 'CLOUDY', 'RAINY', 'STORMY', 'SNOWY', 'FOGGY') NOT NULL DEFAULT 'CLEAR' COMMENT '\'CLEAR\' ("Temps clair"), \'SUNNY\' ("Ensoleille"), \'CLOUDY\' ("Nuageux"), \'RAINY\' ("Pluvieux"), \'STORMY\' ("Orageux"), \'SNOWY\' ("Neigeux"), \'FOGGY\' ( "Brumeux")',
	`score_team1` SMALLINT(5) UNSIGNED NOT NULL DEFAULT 0,
	`score_team2` SMALLINT(5) UNSIGNED NOT NULL DEFAULT 0,
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_match`),
	CONSTRAINT `FK__match_team1_id_team` FOREIGN KEY (`id_team1`) REFERENCES `team` (`id_team`) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT `FK__match_team2_id_team` FOREIGN KEY (`id_team2`) REFERENCES `team` (`id_team`) ON UPDATE CASCADE ON DELETE RESTRICT
)
COMMENT='Contains the list of matches on which it is possible to bet ("Utilisateurs")'
COLLATE='utf8_unicode_ci'
;

/* Creation de la table `bet` ("Paris disponibles") */
CREATE TABLE `bet` (
	`id_bet` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_match` INT(10) UNSIGNED NOT NULL,
	`odds_team_1` DOUBLE(7,2) UNSIGNED NOT NULL DEFAULT 0,
	`odds_team_2` DOUBLE(7,2) UNSIGNED NOT NULL DEFAULT 0,
	`status` ENUM('READY', 'OPEN', 'CLOSED', 'CANCELED') NOT NULL DEFAULT 'READY' COMMENT '\'READY\' ("Pret"), \'OPEN\' ("Ouvert"), \'CLOSED\' ("Ferme"), \'CANCELED\' ("Annule")',
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_bet`),
	CONSTRAINT `FK__bet_match_id_match` FOREIGN KEY (`id_match`) REFERENCES `match` (`id_match`) ON UPDATE CASCADE ON DELETE RESTRICT
)
COMMENT='Contains the list of bets - to come, open, closed or canceled - which are available ("Pari")'
COLLATE='utf8_unicode_ci'
;

/* Creation de la table `userBetHistoric` ("Historique des mises des utilisateurs") */
CREATE TABLE `userBetHistoric` (
	`id_user_bet_historic` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_bet` INT(10) UNSIGNED NOT NULL,
	`id_user` INT(10) UNSIGNED NOT NULL,
    `id_team` INT(10) UNSIGNED NOT NULL,
	`amount` DOUBLE(14,2) UNSIGNED NOT NULL,
	`gain_or_loss` DOUBLE(21,4) NULL DEFAULT NULL,
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_user_bet_historic`),
	CONSTRAINT `FK__user_bet_historic_bet_id_bet` FOREIGN KEY (`id_bet`) REFERENCES `bet` (`id_bet`) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT `FK__user_bet_historic_user_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE ON DELETE RESTRICT,
	CONSTRAINT `FK__user_bet_historic_team_id_team` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON UPDATE CASCADE ON DELETE RESTRICT
)
COMMENT='Contains the historic of all bets made by users ("Historique des mises des utilisateurs")'
COLLATE='utf8_unicode_ci'
;

/* Creation de la table `comment` ("Commentaires") */
CREATE TABLE `comment` (
	`id_comment` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_user` INT(10) UNSIGNED NOT NULL,
	`short_description` VARCHAR(255) NOT NULL,
	`long_description` VARCHAR(2000) NULL DEFAULT NULL,
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP() COMMENT 'Automatic field',
	`deleted_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_comment`),
	CONSTRAINT `FK__comment_user_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE ON DELETE RESTRICT
)
COMMENT='Contains the list of comments written by a commentator for a match ("Commentaires")'
COLLATE='utf8_unicode_ci'
;
