<?php
include("db.php");
print("<h3>Vis alle klasser</h3>");

$result = $conn->query("SELECT * FROM klasse");
echo "<table border='1'><tr><th>Kode</th><th>Navn</th><th>Studium</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['klassekode']}</td><td>{$row['klassenavn']}</td><td>{$row['studiumkode']}</td></tr>";
}
echo "</table>";
?>
