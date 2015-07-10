<?php
	session_start();
	if (empty($_SESSION['usuario'])) {
		header('Location: index.php?error=1');
	}
	include('inc/variables.php');
	$username = $_SESSION['usuario'];
	$id =$_SESSION['id'];
	$newusername = $_POST['usuario'];
	$password = $_POST['password'];
	$newpassword = $password;
	if (!empty($_POST['newpassword'])) {
		$newpassword = $_POST['newpassword'];
	}

	$id =$_SESSION['id'];

	$db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd");
	$query = "UPDATE usuarios SET usuario='$newusername', password='$newpassword' WHERE ((usuario = '$username') AND (password = '$password'))";
	$result1 = mysqli_query($db, $query);
    
    $query = "SELECT usuario FROM usuarios WHERE id=$id";
	$result1 = mysqli_query($db, $query);
    $result = mysqli_fetch_array($result1, MYSQLI_ASSOC);

     if (empty($result) == true) {
	    	header("Location: index.php?error=69");
			die();
	 } 
    $_SESSION['usuario'] = $result['usuario'];


	header('Location: usuario.php');

?>