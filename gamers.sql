
DROP DATABASE IF EXISTS Luchalink;
CREATE DATABASE IF NOT EXISTS Luchalink;
USE Luchalink;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users`(
	`player_id` int(100) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(20) DEFAULT 'n00b',
	`last_name` varchar(30) DEFAULT 'n00b',
	`email` varchar(100) NOT NULL DEFAULT '',
	`user_name` varchar(20) DEFAULT 'n00b',
	PRIMARY KEY (`player_id`)
	-- NEED FOREIGN KEY TO JOIN TABLES...USE `user_name` as F.K.
);

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `Players`;
CREATE TABLE `Players`(
	`user_name` varchar(20) DEFAULT 'n00b',
	-- password will use SHA1 hash, that's 40 characters long
	`password` varchar(40) NOT NULL,
	`wins` int DEFAULT 0,
	`losses` int DEFAULT 0,
	`ties`  int DEFAULT 0,
	-- (5,2) = aaa.bb format
	`win/loss_ratio` dec(5,2) DEFAULT 000.00,
	PRIMARY KEY (`user_name`)
);
