<?php
include("db.php");
print("<h3>Vis alle studenter</h3>");

$result = $conn->query("SELECT * FROM student");
echo "<table border='1'><tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['brukernavn']}</td><td>{$row['fornavn']}</td><td>{$row['etternavn']}</td><td>{$row['klassekode']}</td></tr>";
}
echo "</table>";
?>
