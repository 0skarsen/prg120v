<?php include 'db.php'; ?>
<!DOCTYPE html><html lang="no"><head><meta charset="UTF-8"><title>Registrer student</title></head><body>
<h2>Registrer student</h2>
<form method="POST">
  <label>Brukernavn:</label><input type="text" name="brukernavn" required>
  <label>Fornavn:</label><input type="text" name="fornavn" required>
  <label>Etternavn:</label><input type="text" name="etternavn" required>
  <label>Klassekode:</label>
  <select name="klassekode" required>
    <?php
      foreach($pdo->query("SELECT klassekode FROM klasse") as $row) {
        echo "<option value='{$row['klassekode']}'>{$row['klassekode']}</option>";
      }
    ?>
  </select>
  <button type="submit">Registrer</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bruker = strtolower(trim($_POST['brukernavn']));
  $fornavn = trim($_POST['fornavn']);
  $etternavn = trim($_POST['etternavn']);
  $klasse = $_POST['klassekode'];
  try {
    $stmt = $pdo->prepare("INSERT INTO student VALUES (?, ?, ?, ?)");
    $stmt->execute([$bruker, $fornavn, $etternavn, $klasse]);
    echo "<p>✅ Student $bruker registrert.</p>";
  } catch (PDOException $e) {
    echo "<p>❌ Feil: brukernavn finnes fra før.</p>";
  }
}
?>
<a href="index.php">Tilbake</a>
</body></html>

