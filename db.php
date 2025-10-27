<<?php
$DB_HOST = 'dokploy-hostname';   // replace with your Dokploy host
$DB_NAME = 'prg120';             // your database name
$DB_USER = 'dokploy-username';   // your username
$DB_PASS = 'dokploy-password';   // your password

// Create connection
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
