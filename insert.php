<html>
<body>
<?php
$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sql="INSERT INTO person (login,fname,lname,role,password) VALUES
('$_POST[login]','$_POST[fname]','$_POST[lname]',
'$_POST[role]','$_POST[pwd]')";

if (!mysqli_query($con,$sql))
  {
  die('Error in mysqli_query');
  }
  
 $sql = 'SELECT * FROM person';
 $res = mysqli_query($sql,$conn);
   while($row = mysqli_fetch_assoc($res)){
	   echo $row['fname'];
   }

mysqli_close($con);
?>

</body>
</html>