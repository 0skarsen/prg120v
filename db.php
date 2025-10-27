<?php
$host = "localhost";
$db = "osedv4399";
$user = "osedv4399";
$pass = "855osedv4399";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Tilkobling feilet: " . $conn->connect_error);
}
?>
