<?php
	session_start();
	include('inc/variables.php');
	$url = "";
	$titulo ="";
	$descripcion="";
	$id_usuario = $_SESSION['id'];
	$fecha = date('Y-m-d H:i:s');

	$url=$_POST['url'];
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];

	if (strlen($url) < 1) {
		header("Location: nuevo.php?error=1&url=$url&titulo=$titulo");
		die();
	}
	if (strlen($titulo) < 1) {
		header("Location: nuevo.php?error=1&url=$url&titulo=$titulo");
		die();
	}

	try {
      $db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd"); 
      if (mysqli_connect_errno()) {
		    printf("Falló la conexión failed: %s\n", $db->connect_error);
		    exit();
		}

	    $query = "INSERT INTO topics (url,titulo,descripcion,id_usuario,fecha) VALUES 
	    							('$url','$titulo','$descripcion','$id_usuario','$fecha') ";
	    $result = mysqli_query($db, $query);
 
   
        header("Location: index.php?msg=0"); 
        die();    
	} catch(PDOException $e) {
	    echo $e->getMessage();
       exit();
	}


?>