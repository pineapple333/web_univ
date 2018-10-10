<?php include('server.php') ?>
<?php 
if (isset($_POST['submit'])){
	$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
   $old_login = "";
   $new_login = "";
   $fname = "";
   $lname = "";
   $role = "";
   $pass = "";
   
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $role = $_POST['role'];
   $pass = $_POST['password'];
  $old_login = $_POST['old_login'];
  $new_login = $_POST['new_login'];
  
  $sql = "SELECT * FROM person WHERE login = '$old_login'";
 echo  print_r($sql);
 
  //$res = mysqli_query($con, $sql);
  
 $query ="UPDATE person SET login = '$new_login'  fname = '$fname' lname = '$lname' role = '$role' password = '$pass' WHERE login = '$old_login'";
 echo print_r($query);
 
 if(!mysqli_query($con, $query)){
  		die('error inserting new record');
  	}else{
		echo $newrecord = "1 record edited";
	}
	mysqli_close($con);
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
<form class="content" action="edit.php" method="post" entype = "multipart/form-data">
Old login:  <input type="text" name="old_login" /><br><br>
New login: <input type="text" name="new_login" /><br><br>
New first name: <input type="text" name="fname" /><br><br>
New second name: <input type="text" name="lname" /><br><br>
New_role: <input type="text" name="role" /><br><br>
New_password: <input type="text" name="password" /><br><br>
<button type="submit" name="submit" value="Upload image">Edit</button>
<p> <a href="admin.php?submit='1'" style="color: red">Back to admin page</a> </p>
</form>
</body>
</html>      