<?php
	include_once('server.php');
    $login = $_POST['login'];
    $role = $_POST['role'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password_1 = $_POST['pwd'];
    $db = mysqli_connect('127.0.0.1', 'root', '', 'testing');
    $query = "INSERT INTO person (login, fname, lname, role, password) 
          VALUES('$login', '$fname', '$lname', '$role', '$password_1')";
    if(!mysqli_query($db, $query)){
      echo "error inserting new record";
    }else{
      echo "1 record added to the database";
    }
    mysqli_close($db);
?>