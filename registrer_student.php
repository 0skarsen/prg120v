<?php
include("db.php");
print("<h3>Registrer student</h3>");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $brukernavn, $fornavn, $etternavn, $klassekode);

    if ($stmt->execute()) {
        echo "Student registrert!";
    } else {
        echo "Feil: Brukernavn finnes fra før.";
    }
    $stmt->close();
}

// Dynamisk listeboks
$result = $conn->query("SELECT klassekode FROM klasse");
?>

<form method="post">
    Brukernavn: <input type="text" name="brukernavn" required><br>
    Fornavn: <input type="text" name="fornavn" required><br>
    Etternavn: <input type="text" name="etternavn" required><br>
    Klassekode:
    <select name="klassekode">
        <?php while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["klassekode"] . "'>" . $row["klassekode"] . "</option>";
        } ?>
    </select><br>
    <input type="submit" value="Registrer">
</form>
