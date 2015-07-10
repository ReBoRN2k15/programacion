<?php
	session_start();
	include('inc/variables.php');
	if (empty($_SESSION['id'])) {
		header("Location: index.php?error=1");
		die();
	}
	$usuario = "";
	$password ="";
	$admin="";

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$admin = $_POST['admin'];
	if ($admin == 'on') {
		$admin = 1;
	}
	else {
		$admin = 0;
	}


	if (strlen($usuario) < 1) {
		echo "Error la longitud del usuario debe ser superior a 1";
		die();
	}
	if (strlen($password) < 1) {
		echo "Error la longitud de la contraseña debe ser superior a 1";
		die();
	}

	try {
      $db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd"); 
      if (mysqli_connect_errno()) {
		    printf("Falló la conexión failed: %s\n", $db->connect_error);
		    exit();
		}

	    $query = "INSERT INTO usuarios (usuario, password, admin) VALUES 
	    							('$usuario','$password','$admin') ";
	    $result = mysqli_query($db, $query);
 
   
        header("Location: admin.php?msg=0"); 
        die();    
	} catch(PDOException $e) {
	    echo $e->getMessage();
       exit();
	}


?>