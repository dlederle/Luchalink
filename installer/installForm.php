<HTML>
	<!-- This page created with assistance from Erik Nosar of CPSC-350, Section 1 -->
	<!-- Permission to use this design has been granted by Erik Nosar, and an electronic record of
		related communications is available upon request.  -->
	<!-- Page has been modified to conform to the needs of Joe Proffitt of CPSC-350, Section 1 -->
	<!-- The functionality of the installer has been analyzed and understood.  This is not a mindless "copy and paste" -->
	<HEAD>
		<TITLE>The Luchalink Installer</TITLE>
	</HEAD>
	<BODY>
		<header>
			<h1>Luchalink Installer</h1>
			This page simply acts as a form to get information you should have on hand from setting up your Apache-PHP-MySQL stack.
			<br />
			All information is passed into the installer via POST, so your information is secure.
			<br />
			<hr />
		</header>
		<div id="nav">
			<ul>
				<li id="step-1" class="active">
					<h1>Step 1</h1>
					<h2>Database Configuration</h2>
				</li>
				<li id="step-2">
					<h1>Step 2</h1>
					<h2>Installation</h2>
				</li>
				<li id="step-3">
					<h1>Step 3</h1>
					<h2>Create Admin Account</h2>
				</li>
				<li id="step-4">
					<h1>Step 4</h1>
					<h2>Finalize Installation</h2>
				</li>
			</ul>
		</div>
		<div id="content">
			<h1>Configure the Database</h1>
			<p>Please enter the configuration details of the MySQL server you wish to use with Luchalink</p>
			<form method="POST" action="installDoer.php">
				<ul>
					<li>
						<h1>Hostname</h1>
						<input name="hostname" />
					</li>
					<li>
						<h1>MySQL Username</h1>
						<input name="username" />
					</li>
					<li>
						<h1>Password</h1>
						<input name="password" type="password"/>
					</li>
					<li>
						<h1>Database</h1>
						<input name="database" />
					</li>
					<li>
						<button type="submit">Proceed</button>
					</li>
				</h1>
			</form>
		</div>
		<footer></footer>
	</BODY>
</HTML>
