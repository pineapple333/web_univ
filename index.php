<?php
  session_start();
?>
<form method="post"
  action = "index.php">
  
  <input type="text"
    name = "login">

  <input type="password"
    name = "password">

  <input type = "Submit">

</form>

<?php
  if (count($_POST)>0){
	  if($_POST['password'] == 'password'){
		  echo 'confirmed';
		  $_SESSION['login'] = $_POST['login'];
	  }
  }

?>
