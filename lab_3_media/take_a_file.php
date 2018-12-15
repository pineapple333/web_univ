<?php
require_once('connection.php');
$conn = EstabConn();
$query = "SELECT src FROM files WHERE id='" . $_POST['id'] . "' AND type='" . $_POST['type'] . "'";
$result = $conn->query($query);
if (mysqli_num_rows($result)){
	$row = mysqli_fetch_array($result);
	echo $row['src'];
}else
	echo "not found";
CloseCon($conn);
?>