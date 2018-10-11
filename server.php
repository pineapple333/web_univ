<?php
session_start();

// initializing variables
$login = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testing');

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

  if (count($errors) === 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM person WHERE login='$login' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['login'] = $login;
  	  $_SESSION['success'] = "You are now logged in";
      if($_SESSION['login']==='admin_log'){
        header('location: admin.php');
      }else{
        header('location: user.php');
      }
  	}else {
  		array_push($errors, "Wrong login/password combination");
  	}
  }
}

?>