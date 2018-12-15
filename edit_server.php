<?php session_start(); ?>
<?php 
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
  
  $old_login = $_POST['old_login'];
  $new_login = $_POST['new_login'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $role = $_POST['role'];
  $pass = $_POST['pwd'];

  //$res = mysqli_query($con, $sql);
  
  $query ="UPDATE person SET login = '$new_login',  fname = '$fname', lname = '$lname', role = '$role', password = '$pass' WHERE login = '$old_login'";
 //echo print_r($query);
 
  if(!mysqli_query($con, $query)){
  		die('error inserting new record');
  	}else{
		echo $newrecord = "1 record edited";
	}
	mysqli_close($con);
?>
