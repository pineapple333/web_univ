<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<?php
$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
 $sql = 'SELECT * FROM person';
 $res = mysqli_query($con, $sql);

?>
<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">Sales Data of Electronic Division</caption>
		<thead>
			<tr>
			    <th>Number</th>
				<th>login</th>
				<th>fname</th>
				<th>lname</th>
				<th>role</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_assoc($res))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['login'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['role'].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
</table>
</body>
</html>