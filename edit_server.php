<?php session_start(); ?>
<?php 
	require_once('classes\edit_server_class.php');
	require_once('classes\connection_class.php');
	$con = OpenCon();
	//create the object to edit someone
	$EditObj = new EditServerClass;
  
	//execute meethods in the oreder needed
	$EditObj->get_params($_POST['old_login'], $_POST['new_login'], $_POST['fname'],
						$_POST['lname'], $_POST['role'], $_POST['pwd']);
	
	$EditObj->create_query();
	$EditObj->exec_query($con);
	
	CloseCon($con);
/*
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
	*/
?>
