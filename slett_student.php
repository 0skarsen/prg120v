<?php
include('db.php');

$students = $mysqli->query("SELECT brukernavn, fornavn, etternavn FROM student");

if (isset($_POST['brukernavn'])) {
    $brukernavn = $_POST['brukernavn'];

    $stmt = $mysqli->prepare("DELETE FROM student WHERE brukernavn=?");
    $stmt->bind_param("s", $brukernavn);
    $stmt->execute();
    echo "Student slettet!";
    $stmt->close();
}
?>

<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette studenten?');">
    Velg student:
    <select name="brukernavn">
        <?php while($row = $students->fetch_assoc()): ?>
            <option value="<?= $row['brukernavn'] ?>"><?= $row['brukernavn'] ?> - <?= $row['fornavn'] ?> <?= $row['etternavn'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="submit" value="Slett student">
</form>
