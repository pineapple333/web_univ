<?php
function EstabConn(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "testing";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> connect_error);
    return $conn;
}
 
function CloseCon($conn){
    $conn -> close();
}
?>