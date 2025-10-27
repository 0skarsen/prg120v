<?php include 'db.php'; ?>
<!DOCTYPE html><html lang="no"><head><meta charset="UTF-8"><title>Slett klasse</title></head><body>
<h2>Slett klasse</h2>
<form method="POST" onsubmit="return confirm('Er du sikker på at du vil slette denne klassen?');">
  <label>Velg klasse:</label>
  <select name="klassekode" required>
    <?php
      foreach($pdo->query("SELECT klassekode FROM klasse") as $rad) {
        echo "<option value='{$rad['klassekode']}'>{$rad['klassekode']}</option>";
      }
    ?>
  </select>
  <button type="submit">Slett</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $kode = $_POST['klassekode'];
  $stmt = $pdo->prepare("SELECT COUNT(*) FROM student WHERE klassekode = ?");
  $stmt->execute([$kode]);
  if ($stmt->fetchColumn() > 0) {
    echo "<p>❌ Kan ikke slette klassen – den har studenter.</p>";
  } else {
    $del = $pdo->prepare("DELETE FROM klasse WHERE klassekode = ?");
    $del->execute([$kode]);
    echo "<p>✅ Klasse $kode slettet.</p>";
  }
}
?>
<a href="index.php">Tilbake</a>
</body></html>

