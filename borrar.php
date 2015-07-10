<?php
	session_start();
	if(empty($_SESSION['id'])) {
		header("Location: index.php");
		die();
	}
	include('inc/variables.php');
	$id="";
	$id = $_GET['id'];
	$db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd"); 
	$query = "DELETE FROM topics WHERE id = '$id'";
 	$result = mysqli_query($db, $query);
 	header("Location: index.php");
?>