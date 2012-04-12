<a href="/pages/login.html" title="Inicar Sesion para Evaluar" class="btn coments">Escribir Comentarios</a>
<div class="clear-fix"></div>			

<div class="clientHdr">

	<ul class="skill-list no-list">
		
		<?php
			include_once("../scripts/conecta.inc.php");

			$conexion = new Conexion("utcnetdb");
			$sqlProyecto = "SELECT * FROM usertbl inner join proyectostbl on idUserTbl = fkUserTbl
  								order by idProyecto desc";
			$dataProyecto = $conexion->consulta($sqlProyecto);
			while($rowProyecto = $dataProyecto->fetch_array(MYSQLI_ASSOC)):

				if($rowProyecto["razonSocial"] == "") 
					$cliente = htmlentities($rowProyecto["nombre"]) ." ". htmlentities($rowProyecto["apellidoPaterno"]) ." ". htmlentities($rowProyecto["apellidoMaterno"]);
				else 
					$cliente = $rowProyecto["razonSocial"];
		?>

		<li>
			<h3><?php echo $cliente; ?>&nbsp;<span class="nameProject"><?php echo $rowProyecto["nombreProyecto"]; ?></span></h3>
			<span class="skill-list-item-name">Calificación</span>
			<div class="skill-list-item-level">
				
				<?php for($i = 0; $i < $rowProyecto["calificacion"]; $i++): ?>
					<span></span>
				<?php endfor; ?>

			</div>
			
			<div class="skill-list-item-period">
				<?php echo $rowProyecto["comentarios"]; ?>
			</div>

		</li><!-- fin del li -->

		<?php endwhile;	?>
		
	</ul>

</div><!-- clientHdr -->

