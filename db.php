<?php
// Dokploy database connection
$DB_HOST = 'osedv4399-prg120v.db.dokploy.usn.no'; // <-- replace with your actual Dokploy Host if different
$DB_NAME = 'osedv4399';
$DB_USER = 'osedv4399';
$DB_PASS = '8855osedv4399';

// Create connection
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
