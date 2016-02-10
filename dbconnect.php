


<?php


$server = "us-cdbr-iron-east-03.cleardb.net";
$username = "bb54b7a6852acd";
$password = "e4849472";
$db ="heroku_cf76f2266f6f3d1";

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>