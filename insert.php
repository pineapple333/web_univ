<html>
<body>
<?php
if (isset($_POST['upload'])){
	
$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$fileTmpName = $_FILES['file3']['tmp_name'];
$fileName = $_FILES['file3']['name'];
$fileExt = explode('.',$fileName);
$file = $_FILES['file3'];
print_r($file);
die();
$fileActExt = strtolower($fileExt);
$fileNewName = uniqid('',true).".".$fileActExt;
$fileDestination = "image/".$fileNewName;
$sql="INSERT INTO person (login,fname,lname,role,password,picture) VALUES
('$_POST[login]','$_POST[fname]','$_POST[lname]',
'$_POST[role]','$_POST[pwd]','$fileDestination')";

if (!mysqli_query($con,$sql))
  {
  die('Error in mysqli_query');
  }

move_uploaded_file($fileNewName, $fileDestination);
header("Location: index2.php?success");

 /*$sql = 'SELECT * FROM person';
 $res = mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($res)){
	   echo $row['fname'];
   }*/

mysqli_close($con);
}
?>

</body>
</html>