<?php
	session_start();
	include('inc/variables.php');
	$username = $_POST['usuario'];
	$password = $_POST['password'];

	$feedback = "&username=".$username;
	/* Si no hay usuario o contraseña redirigimos con el correspondiente error.. */
	if (strlen($username) < 1) {
		header('Location: login.php?error=1');
		die();
	}
	if (strlen($password) < 1) {
		header('Location: login.php?error=2'); 
		die();
	}
	try {
      $db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd"); 
      if (mysqli_connect_errno()) {
		    printf("Falló la conexión failed: %s\n", $db->connect_error);
		    exit();
		}
		/* comprobar que el username y la clave concuerdan */
	    $query = "SELECT id,usuario,password,admin from usuarios WHERE ((usuario like '$username') AND (password like '$password'))";
	    $result1 = mysqli_query($db, $query);
        $result = mysqli_fetch_array($result1, MYSQLI_ASSOC);
 
	    if (empty($result) == true) {
	    	header("Location: login.php?error=3$feedback");
			die();
	    } 

	    $_SESSION['id'] = $result['id'];
        $_SESSION['usuario'] = $result['usuario'];
        if ($result['admin'] == 1) {
        	$_SESSION['admin'] = 1;
        }
        header("Location: index.php?msg=0"); 
        die();    
	} catch(PDOException $e) {
	    echo $e->getMessage();
       exit();
	}
?>