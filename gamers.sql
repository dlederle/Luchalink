
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
	 PRIMARY KEY (`player_id`)
);

DROP TABLE IF EXISTS `User_info`;
CREATE TABLE `Users_info`(
	`player_id` int NOT NULL AUTO_INCREMENT,
	`email` varchar(100) NOT NULL DEFAULT '',
	`password` varchar(40) NOT NULL,
	`display_name` varchar(20) DEFAULT 'n00b'
	`profile_pic` blob,
	CONSTRAINT users_player_id_fk
	FOREIGN KEY (player_id)
	REFERENCES Users (player_id)
);

--
-- Table structure for table `Avatars`
--

DROP TABLE IF EXISTS `Avatars`;
CREATE TABLE `Avatars`(
	`game_id` int NOT NULL,
	`avatar_id` int NOT NULL,
	`user_name` varchar(20) DEFAULT 'n00b',
	`rank` varchar(30) DEFAULT 'n00b',
	`wins` int DEFAULT 0,
	`losses` int DEFAULT 0,
	`ties`  int DEFAULT 0,
	-- (5,2) = aaa.bb format
	`win/loss_ratio` dec(5,2) DEFAULT 000.00,
	PRIMARY KEY (avatar_id),
	CONSTRAINT users_avatar_id_fk
	FOREIGN KEY (avatar_id)
	REFERENCES Users (player_id)
);

--
-- Table structure for table `Games`
--

DROP TABLE IF EXISTS `Games`;
CREATE TABLE `Games`(
	`title` varchar(40) NOT NULL DEFAULT 'noname',
	-- Ratings are K, K+, T, A.  U = Unrated
	`rating` varchar(2) NOT NULL DEFAULT 'U',
	-- Rank is akin to popularity --
	`rank` int DEFAULT 1500,
	PRIMARY KEY(`title`)
);

--
-- Table structure for table `Friends`
--

DROP TABLE IF EXISTS `Friends`;
CREATE TABLE `Friends`(
	`player_id` int NOT NULL,
	`friend_id` int NOT NULL,
);

-- POPULATE THE FRIENDS TABLE HERE WITH MySQL QUERY

INSERT INTO Games (`title`,`rating`) VALUES ("Frogger 2","K+");
INSERT INTO Games (`title`,`rating`) VALUES ("Syro, Year of the Dragon","K+");
INSERT INTO Games (`title`,`rating`) VALUES ("Grand Theft Auto III","M");
INSERT INTO Games (`title`,`rating`) VALUES ("Call of Duty 4:  Modern Warfare","M");
INSERT INTO Games (`title`,`rating`) VALUES ("Taikyoku Shogi","U");
