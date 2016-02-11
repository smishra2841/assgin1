


<?php


$server = "us-cdbr-iron-east-03.cleardb.net";
$username = "b7cdb5f1d82d5a";
$password = "33a2484b";
$db ="heroku_f850fcf00ea9674";

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>