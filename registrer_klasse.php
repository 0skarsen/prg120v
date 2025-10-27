<?php include 'db.php'; ?>
<!DOCTYPE html><html lang="no"><head><meta charset="UTF-8"><title>Registrer klasse</title></head><body>
<h2>Registrer klasse</h2>
<form method="POST">
  <label>Klassekode:</label><input type="text" name="klassekode" required>
  <label>Klassenavn:</label><input type="text" name="klassenavn" required>
  <label>Studiumkode:</label><input type="text" name="studiumkode" required>
  <button type="submit">Registrer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $kode = strtoupper(trim($_POST['klassekode']));
  $navn = trim($_POST['klassenavn']);
  $studium = trim($_POST['studiumkode']);
  try {
    $stmt = $pdo->prepare("INSERT INTO klasse VALUES (?, ?, ?)");
    $stmt->execute([$kode, $navn, $studium]);
    echo "<p>✅ Klasse $kode registrert.</p>";
  } catch (PDOException $e) {
    echo "<p>❌ Feil: klassekode finnes fra før.</p>";
  }
}
?>
<a href="index.php">Tilbake</a>
</body></html>
