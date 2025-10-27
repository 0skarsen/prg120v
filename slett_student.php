<?php
include("db.php");
print("<h3>Slett student</h3>");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST["brukernavn"];
    $conn->query("DELETE FROM student WHERE brukernavn='$brukernavn'");
    echo "Student slettet.";
}

$result = $conn->query("SELECT brukernavn FROM student");
?>

<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette studenten?');">
    Velg student:
    <select name="brukernavn">
        <?php while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["brukernavn"] . "'>" . $row["brukernavn"] . "</option>";
        } ?>
    </select>
    <input type="submit" value="Slett">
</form>
