<HTML>
	<!-- This page created with assistance from Erik Nosar of CPSC-350, Section 1 -->
	<!-- Permission to use this design has been granted by Erik Nosar, and an electronic record of
		related communications is available upon request.  -->
	<!-- Page has been modified to conform to the needs of Joe Proffitt of CPSC-350, Section 1 -->
	<!-- The functionality of the installer has been analyzed and understood.  This is not a mindless "copy and paste" -->
	<HEAD>
		<TITLE>Luchalink Installer</TITLE>
	</HEAD>
	<BODY>
		<header>
			<h1>Luchalink Installer</h1>
			Installation in progress...
			<br />
			<hr />
		</header>
		<!-- Let's get to work :D  -->
		<?php
			$hostname = $_POST['hostname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$database = $_POST['database'];
			$successImage = "success.png";
			$failImage = "fail.png";

			#Connect to the MySQL server.
			$db = new mysqli($hostname,$username,$password);

			#If the DB credentials are bad...
			if(!$db)
			{
				die("<li>img src=\"$failImage\"/>Can't connect to the database server." .
					"  Are you sure your credentials are correct? <a href=\"installForm.php\">Go back</a></li>");
			}
			#If the DB credentials are good...
			print("<li><img src=\"$successImage\"/> Connected to MySQL server</li>");

			#Get the database up and running...
			$database = $db->real_escape_string($database);
			$db->query("CREATE DATABASE IF NOT EXISTS $database")
				or die("<li><img src=\"$failImage\"/>Unable to create database." .
					"  Are you sure your credentials are correct? <a href=\"installForm.php\">Go back</a></li>");
			print("<li><img src=\"$successImage\"/> Created database</li>");

			#Select the database...
			$db->select_db($database)
				or die("<li><img src=\"$failImage\"/>Unable to select database." .
					"  Are you sure your credentials are correct? <a href=\"installForm.php\">Go back</a></li>");
			print("<li><img src=\"$successImage\"/> Selected database</li>");

			#Capture the following string from the following line to "sqlSyntax;"
			$query = <<<sqlSyntax
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
	`profile_pic` VARCHAR(50) DEFAULT '<h1>HERE BE THEIR PROFILE PIC </h1>',
	 PRIMARY KEY (`player_id`)
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
	-- Path to the game's directory on the server
	`path` varchar(30) NOT NULL DEFAULT 'games/',
	-- The ID in the query string of the game's homepage
	`titleID` varchar(10) NOT NULL,
	`author` varchar(50) NOT NULL,
	PRIMARY KEY(`title`)
);

--
-- Table structure for table `Friends`
--

DROP TABLE IF EXISTS `Friends`;
CREATE TABLE `Friends`(
	`player_id` int NOT NULL,
	`friend_id` int NOT NULL
);

-- POPULATE THE FRIENDS TABLE HERE WITH MySQL QUERY

INSERT INTO Games (`title`, `rating`, `path`, `titleID`, `author`) VALUES ("Rock, Paper, Shotgun", "E", "games/rps/", "rps", "dlederle");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Frogger 2","K+");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Syro, Year of the Dragon","K+");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Grand Theft Auto III","M");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Call of Duty 4:  Modern Warfare","M");
-- INSERT INTO Games (`title`,`rating`) VALUES ("Taikyoku Shogi","U");

sqlSyntax;

			#Use the above block to query the given DB...
			$db->multi_query($query)
				or die("<li><img src=\"$failImage\"/>Unable to fill database: " . $db->error .
					".  Are you sure your credentials are correct? <a href=\"installForm.php\">Go back</a></li>");
			print("<li><img src=\"$successImage\"/>Filled in database.</li>");

			#Let's make a db_connect.php file...
			#The ../ ensures that the file is created in the Luchalink root folder.
			$db_connect = fopen("../db_connect.php", "w")
				or die("<li><img src=\"$failImage\"/> Unable to modify db_connect.php: " . $db->error .
				" Make sure the user that Apache is running under can modify the file.  Make sure the Luchalink" .
				" folder itself has 777 permissions (chmod 777 Luchalink -- DO NOT USE -R).<a href=\"installForm.php\">Go back</a></li>");

			fwrite($db_connect, "<?php" . "\n");

			fwrite($db_connect, "\$db = new mysqli('$hostname', '$username', '$password', '$database');" . "\n");
			fwrite($db_connect, 'if($db->connect_errno) {' . "\n");
			fwrite($db_connect, 'echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;' . "\n");
			fwrite($db_connect, "} ?>" . "\n");
			fclose($db_connect);
		?>
	</BODY>
</HTML>
