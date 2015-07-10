<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Canal #programación @ChatHispano</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<link  rel="stylesheet" type="text/css" href="css/normalize.css" />
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<link  rel="stylesheet" type="text/css" href="css/styles.css" />

	</head>
<body>
<div class="barra-superior">
	<div class="contenido">
		<div class="logo"><a href="index.php">#programacion</a></div>
		
		<div class="menu-acciones">
			<ul>
				<?php
				if (!empty($_SESSION['admin'])) {
				?>
					<li><a href="admin.php">admin</a></li>
				<?php } ?>
				<li><a target="_blank" href="http://kiwi.chathispano.com/kiwi/?debug=1&entrar=true&nick=webchat-7725092&password=AA==&chan=#programacion">chat</a></li>
				<li><a href="nuevo.php">nuevo</a></li>
				
			</ul>
		</div>

		<div class="menu-buscador">
			<form action="index.php">
				<?php
				if (!empty($_GET['buscar'])) {
				?>
					<input type="text" placeholder="Buscar.." name="buscar" value="<?=$_GET['buscar']?>"/>
				<?php
				}
				else {
				?>
					<input type="text" placeholder="Buscar.." name="buscar"/>
				<?php } ?>
			</form>
		</div>
		
		<div class="menu-login">
			<?php
            if (empty($_SESSION['usuario'])) {
            ?>
			<a href="login.php">login</a>
			<?php
            }
            else {
            ?>
            Hola, <a href="usuario.php"><?=$_SESSION['usuario']?></a>!
            <a href="salir.php"> Salir</a>
             <?php } ?>
		</div>
	</div>
</div>

<div class="contenido">
<div class="zona-principal">