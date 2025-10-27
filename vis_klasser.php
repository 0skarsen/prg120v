<?php
include("db.php");

$result = $mysqli->query("SELECT * FROM klasse");
?>

<h2>Alle klasser</h2>
<table border="1">
<tr>
    <th>Klassekode</th>
    <th>Klassenavn</th>
    <th>Studiumkode</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['klassekode']; ?></td>
    <td><?php echo $row['klassenavn']; ?></td>
    <td><?php echo $row['studiumkode']; ?></td>
</tr>
<?php } ?>
</table>
