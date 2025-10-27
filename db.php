<?php
$DB_HOST = 'osedv4399-prg120v.db.dokploy.usn.no'; // Your Dokploy host
$DB_NAME = 'osedv4399';
$DB_USER = 'osedv4399';
$DB_PASS = '8855osedv4399';

try {
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
