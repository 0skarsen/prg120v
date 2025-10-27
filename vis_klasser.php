<?php include 'db.php'; ?>
<!DOCTYPE html><html lang="no"><head><meta charset="UTF-8"><title>Vis alle klasser</title></head><body>
<h2>Alle klasser</h2>
<table border="1" cellpadding="5">
<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>
<?php
foreach ($pdo->query("SELECT * FROM klasse") as $rad) {
  echo "<tr><td>{$rad['klassekode']}</td><td>{$rad['klassenavn']}</td><td>{$rad['studiumkode']}</td></tr>";
}
?>
</table>
<a href="index.php">Tilbake</a>
</body></html>

