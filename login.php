<?php include('inc/header.php'); ?>
<div class="formulario-login">
	<div class="titulo-formulario-login"> Usuario y contraseña </div>
	<form action="loguearse.php" method="post">
		<div class="formulario-interior">
		<div class="login-usuario">
			<input type="text" placeholder="nombre de usuario" value="" name="usuario"/>
		</div>
		<div class="login-usuario">
			<input type="password" placeholder="contraseña" value="" name="password"/>
		</div>
		<input class="boton-formulario" type="submit" />
	  </div>
	</form>
</div>
<?php include('inc/footer.php'); ?>