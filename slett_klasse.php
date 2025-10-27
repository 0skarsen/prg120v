<?php
include("db.php");
print("<h3>Slett klasse</h3>");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST["klassekode"];
    $check = $conn->query("SELECT * FROM student WHERE klassekode='$klassekode'");
    if ($check->num_rows > 0) {
        echo "Kan ikke slette: Det finnes studenter i denne klassen.";
    } else {
        $conn->query("DELETE FROM klasse WHERE klassekode='$klassekode'");
        echo "Klasse slettet.";
    }
}

$result = $conn->query("SELECT klassekode FROM klasse");
?>

<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette klassen?');">
    Velg klasse:
    <select name="klassekode">
        <?php while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["klassekode"] . "'>" . $row["klassekode"] . "</option>";
        } ?>
    </select>
    <input type="submit" value="Slett">
</form>
