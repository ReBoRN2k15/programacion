<?php include('inc/header.php'); ?>

<div class="formulario-login">
	<?php
        if (empty($_SESSION['usuario']) || empty($_SESSION['admin'])) {
        ?>
		No tienes permisos para estar aquí.
		<?php
		die();
        }

    ?>
	<div class="titulo-formulario-login"> Crear nuevo usuario </div>
	<form action="nuevousuario.php" method="post">
		<div class="formulario-interior">
		<div class="login-usuario">
			<input type="text" placeholder="nombre de usuario" value="" name="usuario" required/>
		</div>
		<div class="login-usuario">
			<input type="password" placeholder="contraseña" value="" name="password" required/>
		</div>
		<div>
			¿Permisos de administración? <input type="checkbox"  name="admin" />
		</div>
			<input class="boton-formulario" type="submit" value="Crear Usuario" style="margin-top:10px;" />
		</div>
	</form>

	<div class="titulo-formulario-login" style="margin-top:20px;"> Lista de usuarios actuales </div>

		<div class="formulario-interior">


				<ul>
				<?php
					include('inc/variables.php');
					$db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd"); 
					$query = "SELECT id,usuario, admin FROM usuarios";	
					$result = mysqli_query($db, $query);
					while(($usuario = mysqli_fetch_array($result))) {
				?>
						<li><?=$usuario['usuario']?> ~ 
							
						<?php
							if ($usuario['admin'] == 1) {
						?>
							<a href="cambiarAdmin.php?id=<?=$usuario['id']?>&admin=0"> Quitar Admin
						<?php
							}
							else {
						?>
							<a href="cambiarAdmin.php?id=<?=$usuario['id']?>&admin=1"> Poner Admin
						<?php

							}
						?>
						</a>
						~

						<a href="borrarusuario.php?id=<?=$usuario['id']?>"> Eliminar</a>

						</li>
				<?php

					}

				?>
				</ul>
			
				
		</div>

	</div>


<?php include('inc/footer.php'); ?>