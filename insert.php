<html>
<body>
<?php
if (isset($_POST['upload'])){
	
$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$image = $_FILES['image']['name'];
$fileTmpName = $_FALES['file']['tmp_name'];
$fileName = $_FILES['image']['name'];
$fileExt = explode('.',$fileName);
$fileActExt = strtolower(end());
$fileNewName = uniqid('',true).".".$fileActExt;
$fileDestination = "image/".$fileNewName;
$sql="INSERT INTO person (login,fname,lname,role,password,picture) VALUES
('$_POST[login]','$_POST[fname]','$_POST[lname]',
'$_POST[role]','$_POST[pwd]','$fileTmpName')";

if (!mysqli_query($con,$sql))
  {
  die('Error in mysqli_query');
  }

move_uploaded_file($fileTmpName, $fileDestination);
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