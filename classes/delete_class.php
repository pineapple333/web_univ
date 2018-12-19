<?php require_once('connection_class.php');

class DeleteControllerClass{

	function delete_someone($con, $login){
		if (!$con)
		  {
		  die('Could not connect: ' . mysqli_error());
		  }
		  
		 $sql ="DELETE FROM person WHERE login = '$login'";
		 if(!mysqli_query($con, $sql)){
				die('error deleting the record');
			}else{
				echo $newrecord = "1 record deleted from the database";
			}
	}

}


?>