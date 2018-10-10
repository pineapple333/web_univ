<?php
session_start();
if(isset($_GET['submit'])){
     header('location: index.php');
  }
  if(isset($_POST['submit'])){
  	$login = $_POST['login'];
    $role = $_POST['role'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password_1 = $_POST['password_1'];
  	$db = mysqli_connect('127.0.0.1', 'root', '', 'testing');
  	$query = "INSERT INTO person (login, fname, lname, role, password) 
  			  VALUES('$login', '$fname', '$lname', '$role', '$password_1')";
  	if(!mysqli_query($db, $query)){
  		die('error inserting new record');
  	}
  	$newrecord = '1 record added to the database';
  }
  ?>
<!Doctype html>
<html>
<head>
	<title>User registration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<h2>Register </h2>
	</div>
	<!--Display error messages here -->
	<form action="register.php" method="post" entype = "multipart/form-data">
		<div class="input-group">
			<label>login</label>
			<input type="text" name="login">
		</div>
		<div class="input-group">
			<label>Role</label>
			<input type="text" name="role">
		</div>
		<div class="input-group">
			<label>First name</label>
			<input type="text" name="fname">
		</div>
		<div class="input-group">
			<label>Second name</label>
			<input type="text" name="lname">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="password_1">
		</div>
		<div class="input-group">
			<label>Submit</label>
			<button type="submit" name="submit" class="btn">Register</button>
		</div>
		<p> <a href="register.php?submit='1'" style="color: red;">Go back to your web page</a> </p>
	</form>
	<?php
	echo $newrecord;
	?>
</body>
</html>