<?php
$db = new mysqli('localhost', 'root', '@$i78GeIM0', 'Luchalink');
if($db->connect_errno) {
echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
