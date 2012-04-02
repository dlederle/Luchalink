First Project for CPSC350, *Applications of Databases*

Luchalink is (will be) a framework for connecting players to each other in order to have balanced competitive games.
It is built for the LAMP stack, and will maintain a players match history in different games and determine their skill ranking from there.

*Team Bench*:

Dylan

Ross

KDawg

Joe

HOW TO INSTALL Luchalink:

WARNING:

If you have already installed Luchalink, and for some reason want to run the installer again, PLEASE back your data up
before running the installer again.  You will either wipe out your current table contents if you run the installer again,
or you will recieve a foreign key constraint error when the installer tries to re-source the database.
We are not liable for any damages to your data that ensue if you choose to run the installer again on a system that
already has Luchalink installed.

So, you've gotten a copy of Luchalink on your system.  There's only one thing you need to do before running the installer.
With file/folder permissions, there are three groups:  User, Group, and Everyone Else.  In order to make the installer happy,
you need to make the permissions for all three of these groups to be read, write, and execute.  Here's how you do it:

In MacOS and Unix/Linux systems:
The command for this is, sans quotes, "chmod 777 Luchalink".  Run this command in the directory that contains the Luchalink folder.
There is no need to recursively change permissions, so omit the -R option.

In Windows:
The easiest way to do this in Windows is to right-click the Luchalink folder and click Properties.  Then, click into the Security tab
at the top of the page.  You should see a white box with two columns, Allow and Deny.  To the left of those is another column that
tells you what each permission is.  Above that box is another with groups and users.  Find your user or group and click it once.
The "Permissions for" field should change to match the user/group you selected.  Next, check the Allow boxes for everything EXCEPT
Special Permissions.  Double check to make sure that nothing is checked for recursive permissions.  Now click Apply, then OK.

Congrats!  The hard part is over.

Next, you need to run the installer.  This guide assumes that you've followed the instructions for setting up, and starting, your
LAMPP/XAMPP stack.  Make sure you have the hostname for your server, the username and password for the MySQL user you want to
give Luchalink to, and the name of the database, Luchalink.

Navigate to your localhost page in your favorite web browser.  On Unix/Linux, it should be, sans quotes:
	"localhost/Luchalink/installer/installForm.php"
Simply fill out the form with the requested information and click Proceed.  If all goes well, you should get the installDoer.php page with
four smiley faces.  If not, the system will report an error that you can research on the internet.

Congrats!  You now have Luchalink on your system.

HOW TO UNINSTALL Luchalink:

WARNING:  If you want to save your table contents before uninstalling, consider researching how to do a database dump, which creates an 
SQL file that can be sourced at a later date should you choose to install Luchalink again.  Please look up the specific command and 
arguments that go along with it for your particular version of MySQL.  We are not responsible for loss of data if you don't back
your data up.

All you have to do is, from either phpMyAdmin or the command line, drop the Luchalink database.  Please research the specific method for
doing so that applies to your particular XAMPP/LAMPP stack/version of MySQL.  Then, delete the Luchalink folder.

Congrats!  Luchalink is now uninstalled.
