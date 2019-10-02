<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head> 

<body> 

<h1>Hello World!</h1>
<h3>Do you see your secrets here o.O</h3>

<table>
<thead>
	<tr>
		<th>No.</th>
		<th>SECRET</th>
	</tr>
</thead>
<tbody>
	<?php
		$conn = pg_connect(getenv("DATABASE_URL"))
			or die ("Could not connect to server\n");

		if (isset($_POST['secret'])) {
			$secret = $_POST['secret'];
			$query = "INSERT INTO secrets (secret) VALUES ($1)";
			pg_prepare('insert_query', $query);
			pg_execute('insert_query', array($secret));
		}

		$result = pg_query($conn, "SELECT * FROM secrets");
		if (!$result) {
			echo "An error has occurred :O\n";
			exit;
		}

		while ($row = pg_fetch_row($result)) {
			echo "<tr>";
			echo "<td>" . $row[0] . "</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "</tr>";
		}
	?>
</tbody>
</table>

<?php
	$data = $_POST['data'];

	echo $data;
?>

</body> 

<script> 
	var val = "<?php echo $data; ?>"; 
</script> 

</html>
