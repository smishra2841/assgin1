


<?php


$server = "us-cdbr-iron-east-03.cleardb.net";
$username = "b677b9a020f66f ";
$password = "bcb9f155";
$db ="heroku_c959fc9f09570a9";

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>