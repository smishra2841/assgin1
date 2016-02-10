


<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["us-cdbr-iron-east-03.cleardb.net"];
$username = $url["bb54b7a6852acd"];
$password = $url["e4849472"];
$db = substr($url["heroku_cf76f2266f6f3d1"], 1);

$conn = new mysqli($server, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>