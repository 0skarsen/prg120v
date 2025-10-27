<?php include 'db.php'; ?>
<!DOCTYPE html><html lang="no"><head><meta charset="UTF-8"><title>Slett student</title></head><body>
<h2>Slett student</h2>
<form method="POST" onsubmit="return confirm('Er du sikker på at du vil slette denne studenten?');">
  <label>Velg student:</label>
  <select name="brukernavn" required>
    <?php
      foreach($pdo->query("SELECT brukernavn FROM student") as $rad) {
        echo "<option value='{$rad['brukernavn']}'>{$rad['brukernavn']}</option>";
      }
    ?>
  </select>
  <button type="submit">Slett</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $bruker = $_POST['brukernavn'];
  $stmt = $pdo->prepare("DELETE FROM student WHERE brukernavn = ?");
  $stmt->execute([$bruker]);
  echo "<p>✅ Student $bruker slettet.</p>";
}
?>
<a href="index.php">Tilbake</a>
</body></html>
