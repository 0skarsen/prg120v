<?php
include("db.php");

$students = $mysqli->query("SELECT brukernavn, fornavn, etternavn FROM student");

if(isset($_POST['submit'])){
    $brukernavn = $_POST['brukernavn'];

    $stmt = $mysqli->prepare("DELETE FROM student WHERE brukernavn=?");
    $stmt->bind_param("s", $brukernavn);

    if($stmt->execute()){
        echo "Student slettet!";
    } else {
        echo "Feil: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="post" onsubmit="return confirm('Er du sikker?');">
    Velg student:
    <select name="brukernavn" required>
        <?php while($row = $students->fetch_assoc()){ ?>
            <option value="<?php echo $row['brukernavn']; ?>"><?php echo $row['brukernavn'] . " - " . $row['fornavn'] . " " . $row['etternavn']; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="submit" value="Slett student">
</form>
