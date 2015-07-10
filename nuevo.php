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
	<div class="titulo-formulario-login"> Crear nuevo topic </div>
	<form action="crear.php" method="post">
		<div class="formulario-interior">
		<div class="nuevo-usuario">
			<input type="text" placeholder="URL" value="" name="url"/>
		</div>
		<div class="nuevo-usuario">
			<input type="text" placeholder="Título" value="" name="titulo"/>
		</div>
		<div class="nuevo-usuario">
			<textarea placeholder="Descripción (Opcional)" value="" name="descripcion"></textarea>
		</div>
		<input class="boton-formulario" type="submit" />
	</div>
	</form>
</div>
<?php include('inc/footer.php'); ?>