
DROP DATABASE IF EXISTS Luchalink;
CREATE DATABASE IF NOT EXISTS Luchalink;
GRANT ALL PRIVILEGES ON Luchalink.* TO 'luchauser'@'localhost' identified by 'kevinislame';
USE Luchalink;

--
-- Table structure for table `users`
--

-- In the register page, I'm only requiring a password and an email
-- The rest can be put up after in a "details" page
-- -dlederle

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users`(
	`player_id` int(100) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(20) DEFAULT 'n00b',
	`last_name` varchar(30) DEFAULT 'n00b',
	`email` varchar(100) NOT NULL DEFAULT '',
	`password` varchar(40) NOT NULL,
	-- password will use SHA1 hash, that's 40 characters long
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
	`wins` int DEFAULT 0,
	`losses` int DEFAULT 0,
	`ties`  int DEFAULT 0,
	-- (5,2) = aaa.bb format
	`win/loss_ratio` dec(5,2) DEFAULT 000.00,
	PRIMARY KEY (`user_name`)
);

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `Games`;
CREATE TABLE `Games`(
	`title` varchar(40) NOT NULL DEFAULT 'noname',
	-- Ratings are K, K+, T, A.  U = Unrated
	`rating` varchar(2) NOT NULL DEFAULT 'U',
	PRIMARY KEY(`title`)
