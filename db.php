<?php
$DB_HOST = 'localhost';      // Dokploy uses localhost
$DB_NAME = 'osedv4399';      // your database name
$DB_USER = 'osedv4399';      // your database username
$DB_PASS = '8855osedv4399';  // your database password

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
