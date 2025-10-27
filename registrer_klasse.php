<?php
include("db.php");
print("<h3>Registrer klasse</h3>");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    $stmt = $conn->prepare("INSERT INTO klasse VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $klassekode, $klassenavn, $studiumkode);

    if ($stmt->execute()) {
        echo "Klasse registrert!";
    } else {
        echo "Feil: Klassekode finnes fra før.";
    }
    $stmt->close();
}
?>

<form method="post">
    Klassekode: <input type="text" name="klassekode" required><br>
    Klassenavn: <input type="text" name="klassenavn" required><br>
    Studiumkode: <input type="text" name="studiumkode" required><br>
    <input type="submit" value="Registrer">
</form>
