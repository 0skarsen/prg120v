<?php
include("db.php");

$result = $mysqli->query("SELECT s.brukernavn, s.fornavn, s.etternavn, k.klassenavn
                          FROM student s
                          JOIN klasse k ON s.klassekode = k.klassekode");
?>

<h2>Alle studenter</h2>
<table border="1">
<tr>
    <th>Brukernavn</th>
    <th>Fornavn</th>
    <th>Etternavn</th>
    <th>Klasse</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['brukernavn']; ?></td>
    <td><?php echo $row['fornavn']; ?></td>
    <td><?php echo $row['etternavn']; ?></td>
    <td><?php echo $row['klassenavn']; ?></td>
</tr>
<?php } ?>
</table>
