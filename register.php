<?php include('server.php') ?>
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
	<?php include("errors.php");?>
	<form action="register.php" method="post" entype = "multipart/form-data">
		<div class="input-group">
			<label>login</label>
			<input type="text" name="login1">
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
			<label>Confirm password</label>
			<input type="text" name="password_2">
		</div>
		<div class="input-group">
			<label>Submit</label>
			<button type="submit" name="register" class="bnt">Register</button>
		</div>
	</form>
</body>
</html>