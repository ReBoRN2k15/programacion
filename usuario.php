<?php include('inc/header.php'); ?>

<div class="formulario-login">
	<?php
        if (empty($_SESSION['usuario'])) {
        ?>
		No tienes permisos para estar aquí.
		<?php
		die();
        }
    ?>
	<div class="titulo-formulario-login"> Configuración usuario </div>
	<form action="actualizar.php" method="post">
		<div class="formulario-interior">
		<div class="login-usuario">
			<input type="text" placeholder="nombre de usuario" value="<?=$_SESSION['usuario']?>" name="usuario" required/>
		</div>
		<div class="login-usuario">
			<input type="password" placeholder="contraseña" value="" name="password" required/>
		</div>
		<div class="login-usuario">
			<input type="password" placeholder="nueva contraseña (opcional)" value="" name="newpassword"/>
		</div>
		<input class="boton-formulario" type="submit" value="Guardar" />
	</div>
	</form>
</div>
<?php include('inc/footer.php'); ?>