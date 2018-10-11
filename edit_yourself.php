<?php include('server.php') ?>
<?php 
if (isset($_POST['submit'])){
	$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
   $new_login = "";
   $fname = "";
   $lname = "";
   $role = "";
   $pass = "";
   
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $role = $_POST['role'];
   $pass = $_POST['password'];
  $new_login = $_POST['new_login'];
  $old_login = $_SESSION['login'];
 
  //$res = mysqli_query($con, $sql);
  
 $query ="UPDATE person SET login = '$new_login',  fname = '$fname', lname = '$lname', role = '$role', password = '$pass' WHERE login = '$old_login'";
 $_SESSION['login'] = $new_login;
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
<form class="content" action="edit_yourself.php" method="post" entype = "multipart/form-data">
New login: <input type="text" name="new_login" /><br><br>
New first name: <input type="text" name="fname" /><br><br>
New second name: <input type="text" name="lname" /><br><br>
New_role: <input type="text" name="role" /><br><br>
New_password: <input type="text" name="password" /><br><br>
<button type="submit" name="submit" value="Upload image">Edit</button>
<p> <a href="user.php?submit='1'" style="color: red;">Back to 'user' page</a> </p>
</form>
</body>
</html>      