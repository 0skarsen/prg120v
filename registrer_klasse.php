<?php
include('db.php');

if (isset($_POST['klassekode'], $_POST['klassenavn'], $_POST['studiumkode'])) {
    $klassekode = $_POST['klassekode'];
    $klassenavn = $_POST['klassenavn'];
    $studiumkode = $_POST['studiumkode'];

    $stmt = $mysqli->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $klassekode, $klassenavn, $studiumkode);

    if ($stmt->execute()) {
        echo "Klasse registrert!";
    } else {
        echo "Feil: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="post">
    Klassekode: <input type="text" name="klassekode" required><br>
    Klassenavn: <input type="text" name="klassenavn" required><br>
    Studiumkode: <input type="text" name="studiumkode" required><br>
    <input type="submit" value="Registrer klasse">
</form>
