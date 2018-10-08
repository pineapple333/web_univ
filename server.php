<?php
session_start();

// initializing variables
$login = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testing');

// REGISTER USER
if (isset($_POST['register'])) {
	// receive all input values from the form
  $login = mysqli_real_escape_string($db, $_POST['login1']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($login)) { array_push($errors, "login is required"); }
  if (empty($role)) { array_push($errors, "Role is required"); }
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Second name is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM person WHERE login='$login' OR password = '$password' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['login'] == $login) { //??????
      array_push($errors, "login already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;

  	$query = "INSERT INTO person (login, fname, lname, role, password) 
  			  VALUES('$login', '$fname', '$lname', '$role' '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['login'] = $login;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login'])) {
	
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($login)) {
  	array_push($errors, "Login is required");
  }
  if (empty($login)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM person WHERE login='$login' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['login'] = $login;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong login/password combination");
  	}
  }
}

?>