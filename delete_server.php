<?php session_start(); ?>
<?php require_once('classes\delete_class.php');
		require_once('classes\connection_class.php');

$delete = new DeleteControllerClass;
$login = $_POST['login'];
$con = OpenCon();
$delete->delete_someone($con, $login);
CloseCon($con);

?>