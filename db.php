<?php
$host = "b-studentsql-1.usn.no";  // Viktig: riktig database-server
$db = "osedv4399";                // Din database
$user = "osedv4399";              // Ditt brukernavn
$pass = "855osedv4399";           // Ditt passord

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Tilkobling feilet: " . $conn->connect_error);
}
?>
