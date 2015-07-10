<?php include('inc/header.php'); ?>
<?php 
	//Limito la busqueda 
	$TAMANO_PAGINA = 10; 

	//examino la página a mostrar y el inicio del registro a mostrar 
	if (!empty($_GET['pagina'])) {
		$pagina = $_GET["pagina"]; 
	}
	else {
		$pagina = NULL;
	}
	if (!$pagina) { 
	   	$inicio = 0; 
	   	$pagina=1; 
	} 
	else { 
	   	$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
	}
?>
	<ul class="topics">
		<?php
			$numero_noticia = 1;
			include('inc/variables.php');
			$db = mysqli_connect("$db_name","$mysql_user","$mysql_password","$mysql_mybd"); 
			$query = "select topics.id,topics.url,topics.titulo,topics.descripcion,topics.fecha,topics.id_usuario,usuarios.usuario from topics, usuarios where (topics.id_usuario = usuarios.id) ORDER BY topics.fecha DESC";
			if (!empty($_GET['buscar'])) {
				echo "<div class='buscando'>Buscando..";
				$buscar = $_GET['buscar'];
				$query = "select topics.id,topics.url,topics.titulo,topics.descripcion,topics.fecha,topics.id_usuario,usuarios.usuario from topics, usuarios where (topics.id_usuario = usuarios.id) AND ((topics.titulo like '%$buscar%') OR (topics.descripcion like '%$buscar%')) ORDER BY topics.fecha DESC";
			}
			
			$result = mysqli_query($db, $query);
			//$query = "select topics.id,topics.url,topics.titulo,topics.descripcion,topics.fecha from topics where 1";
			
			$num_total_registros = mysqli_num_rows($result); 
			if (!empty($_GET['buscar'])) {
				echo "se han encontrado un total de <b>$num_total_registros</b> resultados.</div>";
			}
			//calculo el total de páginas 
			$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
			$query = "select topics.id,topics.url,topics.titulo,topics.descripcion,topics.fecha,topics.id_usuario,usuarios.usuario from topics, usuarios where (topics.id_usuario = usuarios.id) ORDER BY topics.fecha DESC limit $inicio,$TAMANO_PAGINA";
			if (!empty($_GET['buscar'])) {
				$buscar = $_GET['buscar'];
				$query = "select topics.id,topics.url,topics.titulo,topics.descripcion,topics.fecha,topics.id_usuario,usuarios.usuario from topics, usuarios where (topics.id_usuario = usuarios.id) AND ((topics.titulo like '%$buscar%') OR (topics.descripcion like '%$buscar%')) ORDER BY topics.fecha DESC limit $inicio,$TAMANO_PAGINA";
			}
			$result = mysqli_query($db, $query);
			//$topics = mysqli_fetch_array($result, MYSQLI_ASSOC);
   
        	while(($topic = mysqli_fetch_array($result))) {
		?>
		<li><span class="numero"><?=$numero_noticia?>.</span>
			<div class="topic">
				<div class="titulo-topic">
					 <a href="<?=$topic['url'];?>"><?=$topic['titulo'];?></a>
					<div class="texto-topic">
						<?=$topic['descripcion'];?>
					</div>
				</div>
				<div class="info-topic">
					 <?php $date = new DateTime ($topic['fecha']); ?>
					 <?=date_format($date,'d-m-Y H:i:s')?> by <?=$topic['usuario']?>
					 <?php
            			if (!empty($_SESSION['usuario'])) {
            		 ?>
            		 	~ <a href="borrar.php?id=<?=$topic['id']?>">borrar</a>
            		 <?php } ?>
				</div>
			</div>
		</li>
		<?php 
				$numero_noticia++;
			}
		?>

	</ul>
<div class="numero-paginas"> 
<?php
	//muestro los distintos índices de las páginas, si es que hay varias páginas 
if ($total_paginas > 1){ 
?>
Pág.
<?php
   	for ($i=1;$i<=$total_paginas;$i++){ 
      	if ($pagina == $i) 
         	//si muestro el índice de la página actual, no coloco enlace 
         	echo $pagina . " "; 
      	else 
         	//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
         	echo "<a href='index.php?pagina=" . $i . "'>" . $i . "</a> "; 
   	} 
}
?>
</div>
<?php include('inc/footer.php'); ?>