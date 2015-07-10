<?php
	session_start();
	if (empty($_SESSION['usuario']) || empty($_SESSION['admin'])) {
		header('Location: index.php?error=1');
	}
	include('inc/variables.php');

	if (empty($_GET['id'])) {
		header('Location: admin.php');
		die();
	}
	$id = $_GET['id'];


	$db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd");
	$query = "DELETE FROM topics where (id_usuario = $id)";
	$result1 = mysqli_query($db, $query);

	$query = "DELETE FROM usuarios where (id = $id)";
	$result1 = mysqli_query($db, $query);
    
    if (($_SESSION['id'] == $id) AND ($admin == 0)) {
    	unset($_SESSION["admin"]);
    }


	header('Location: admin.php');

?>