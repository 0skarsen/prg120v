<?php
include("db.php");

// Get all classes for dropdown
$classes = $mysqli->query("SELECT klassekode, klassenavn FROM klasse");

if(isset($_POST['submit'])){
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    $stmt = $mysqli->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $brukernavn, $fornavn, $etternavn, $klassekode);

    if($stmt->execute()){
        echo "Student registrert!";
    } else {
        echo "Feil: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="post">
    Brukernavn: <input type="text" name="brukernavn" required><br>
    Fornavn: <input type="text" name="fornavn" required><br>
    Etternavn: <input type="text" name="etternavn" required><br>
    Klasse: 
    <select name="klassekode" required>
        <?php while($row = $classes->fetch_assoc()){ ?>
            <option value="<?php echo $row['klassekode']; ?>"><?php echo $row['klassekode'] . " - " . $row['klassenavn']; ?></option>
        <?php } ?>
    </select><br>
    <input type="submit" name="submit" value="Registrer student">
</form>
