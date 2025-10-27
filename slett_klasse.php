<?php
include('db.php');

$classes = $mysqli->query("SELECT klassekode, klassenavn FROM klasse");

if (isset($_POST['klassekode'])) {
    $klassekode = $_POST['klassekode'];
    
    // Check if students exist
    $check = $mysqli->prepare("SELECT COUNT(*) FROM student WHERE klassekode = ?");
    $check->bind_param("s", $klassekode);
    $check->execute();
    $check->bind_result($count);
    $check->fetch();
    $check->close();

    if ($count > 0) {
        echo "Kan ikke slette klasse med studenter!";
    } else {
        $stmt = $mysqli->prepare("DELETE FROM klasse WHERE klassekode=?");
        $stmt->bind_param("s", $klassekode);
        $stmt->execute();
        echo "Klasse slettet!";
        $stmt->close();
    }
}
?>

<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette klassen?');">
    Velg klasse: 
    <select name="klassekode">
        <?php while($row = $classes->fetch_assoc()): ?>
            <option value="<?= $row['klassekode'] ?>"><?= $row['klassekode'] ?> - <?= $row['klassenavn'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="submit" value="Slett klasse">
</form>
