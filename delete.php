<?php include('server.php') ?>
<?php
if(isset($_POST['submit'])){
	
$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $login = $_POST['login'];
 $sql ="DELETE FROM person WHERE login = '$login'";
 if(!mysqli_query($db, $sql)){
  		die('error inserting new record');
  	}else{
		echo $newrecord = "1 record added to the database";
	}
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title> Model </title>
	<link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<form class="content" action="delete.php" method="post" entype = "multipart/form-data">
Login: <input type="text" name="login" /><br><br>
<button type="submit" name="delete" value="Upload image">Delete</button>
<p> <a href="admin.php?submit='1'" style="color: red">Back to 'admin' page</a> </p>
</form>
</body>
</html>