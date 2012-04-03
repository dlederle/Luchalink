
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
	`display_name` varchar(20) DEFAULT 'n00b',
	-- `profile_pic` VARCHAR(50) DEFAULT '<h1>HERE BE THEIR PROFILE PIC </h1>',
	`profile_pic` blob,
	 PRIMARY KEY (`player_id`)
);

CREATE INDEX IDX_USERS_DISPLAY_NAME ON Users(display_name);
--
-- Table structure for table `Avatars`
--

DROP TABLE IF EXISTS `Avatars`;
CREATE TABLE `Avatars`(
	`game_id` varchar(10) NOT NULL,
	`avatar_id` int NOT NULL AUTO_INCREMENT,
	`owner_id` int NOT NULL,
	`user_name` varchar(20) DEFAULT 'n00b',
	`rank` varchar(30) DEFAULT 'n00b',
	`wins` int DEFAULT 0,
	`losses` int DEFAULT 0,
	`ties`  int DEFAULT 0,
	-- (5,2) = aaa.bb format
	PRIMARY KEY (avatar_id),
	CONSTRAINT users_avatar_id_fk
	FOREIGN KEY (owner_id)
	REFERENCES Users (player_id)
);

CREATE INDEX IDX_AVATAR_RANK ON Avatars(rank);
--
-- Table structure for table `Games`
--

DROP TABLE IF EXISTS `Games`;
CREATE TABLE `Games`(
	`title` varchar(40) NOT NULL DEFAULT 'noname',
	-- Ratings are K, K+, T, A.  U = Unrated
	`rating` varchar(2) NOT NULL DEFAULT 'U',
	`description` blob,
	-- Rank is akin to popularity --
	`rank` int DEFAULT 1500,
	-- Path to the game's directory on the server
	`path` varchar(30) NOT NULL DEFAULT 'games/',
	-- The ID in the query string of the game's homepage
	`titleID` varchar(10) NOT NULL,
	`author` varchar(50) NOT NULL,
	PRIMARY KEY(`titleID`)
);

CREATE INDEX IDX_GAMES_RANK ON Games(rank);
--
-- Table structure for table `Friends`
--

DROP TABLE IF EXISTS `Friends`;
CREATE TABLE `Friends`(
	`player_id` int NOT NULL,
	`friend_id` int NOT NULL
);

-- POPULATE THE FRIENDS TABLE HERE WITH MySQL QUERY

INSERT INTO Games (`title`, `rating`, `description`, `path`, `titleID`, `author`) VALUES ("Rock, Paper, Shotgun", "E", "This is a Rock, Paper, Scissor's Clone. Shotgun equals Scissors.", "games/rps/", "rps", "dlederle");

INSERT INTO Users (first_name, last_name, email, password) VALUES ('Bob', 'Smith', 'bsmith@mail.umw.edu', 'heysup');

INSERT INTO Avatars (game_id, owner_id, user_name) VALUES ('rps', 1, 'Default');
-- INSERT INTO Games (`title`,`rating`) VALUES ("Frogger 2","K+");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Syro, Year of the Dragon","K+");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Grand Theft Auto III","M");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Call of Duty 4:  Modern Warfare","M");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Taikyoku Shogi","U");
