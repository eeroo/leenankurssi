<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = ($_GET['q']);

$con = mysqli_connect('magnesium','16beerok','salasana','db16beerok');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajaxharjindex");
$sql="SELECT * FROM tuotteet WHERE Ryhma = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Tuotenimi</th>
<th>Toimittaja</th>
<th>Ryhmä</th>
<th>Määrä</th>
<th>Yksikköhinta</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Tuotenimi'] . "</td>";
    echo "<td>" . $row['Toimittaja'] . "</td>";
    echo "<td>" . $row['Ryhma'] . "</td>";
    echo "<td>" . $row['Maara'] . "</td>";
    echo "<td>" . $row['Yksikkohinta'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>