<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
  <script src="script/jquery-1.8.1.js"></script>
<script src = "script/script.js"></script>
	 
  <form method="post" entype = "multipart/form-data">
  	<?php //include('errors.php'); ?>
  	<div class="input-group">
  		<label>login</label>
  		<input type="text" id = "log">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" id = "pwd">
  	</div>

  </form>
    	<div class="input-group">
  		<div id = "presslog">login</div>
  	</div>
  <p> <a href="viewer.php?submit='1'" style="color: red">continue as a viewer</a> </p>
</body>
</html>