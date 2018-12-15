<?php session_start(); ?>
<?php

$con = mysqli_connect("127.0.0.1", "root", "", "testing");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }
  $login = $_POST['login'];
 $sql ="DELETE FROM person WHERE login = '$login'";
 if(!mysqli_query($con, $sql)){
  		die('error deleting the record');
  	}else{
		echo $newrecord = "1 record deleted from the database";
	}
	
?>