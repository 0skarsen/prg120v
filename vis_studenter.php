<?php include 'db.php'; ?>
<!DOCTYPE html><html lang="no"><head><meta charset="UTF-8"><title>Vis alle studenter</title></head><body>
<h2>Alle studenter</h2>
<table border="1" cellpadding="5">
<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>
<?php
foreach ($pdo->query("SELECT * FROM student") as $rad) {
  echo "<tr><td>{$rad['brukernavn']}</td><td>{$rad['fornavn']}</td><td>{$rad['etternavn']}</td><td>{$rad['klassekode']}</td></tr>";
}
?>
</table>
<a href="index.php">Tilbake</a>
</body></html>
