<?php
include("db.php");

$classes = $mysqli->query("SELECT klassekode, klassenavn FROM klasse");

if(isset($_POST['submit'])){
    $klassekode = $_POST['klassekode'];

    // Check if any students exist
    $check = $mysqli->prepare("SELECT COUNT(*) as count FROM student WHERE klassekode=?");
    $check->bind_param("s", $klassekode);
    $check->execute();
    $res = $check->get_result()->fetch_assoc();
    if($res['count'] > 0){
        echo "Kan ikke slette: det finnes studenter i denne klassen!";
    } else {
        $stmt = $mysqli->prepare("DELETE FROM klasse WHERE klassekode=?");
        $stmt->bind_param("s", $klassekode);
        if($stmt->execute()){
            echo "Klasse slettet!";
        } else {
            echo "Feil: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<form method="post" onsubmit="return confirm('Er du sikker?');">
    Velg klasse:
    <select name="klassekode" required>
        <?php while($row = $classes->fetch_assoc()){ ?>
            <option value="<?php echo $row['klassekode']; ?>"><?php echo $row['klassekode'] . " - " . $row['klassenavn']; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="submit" value="Slett klasse">
</form>
