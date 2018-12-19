<?php 

Class EditServerClass{
	
	private $old_login = "";
	private $new_login = "";
	private $fname = "";
	private $lname = "";
	private $role = "";
	private $pass = "";
	private $query = "";

	function get_params($old_login, $new_login, $fname, $lname, $role, $pass){
		$this->old_login = $old_login;
		$this->new_login = $new_login;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->role = $role;
		$this->pass = $pass;
	}
	
	//I might create a new class for queries
	function create_query(){
		$this->query ="UPDATE person SET login = '$this->new_login',  fname = '$this->fname', 
		lname = '$this->lname', role = '$this->role', password = '$this->pass' 
		WHERE login = '$this->old_login'";
		return $this->query;
	}
	
	function exec_query($con){
		if (!$con)
		{
			die('Could not connect: ' . mysqli_error());
		}

		if(!mysqli_query($con, $this->query)){
			die('error inserting new record');
		}else{
			echo $newrecord = "1 record edited";
		}
	}
}

?>
