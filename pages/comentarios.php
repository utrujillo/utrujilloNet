<?php
ini_set('session_save_path', '/home/users/web/b1426/moo.utrujillonet/cgi-bin/tmp/');
session_name('test');
session_start();

include_once("../scripts/conecta.inc.php");
$conexion = new Conexion("utcnetdb");

$sqlUser = "select concat(nombre,' ',apellidoPaterno,' ',apellidoMaterno) as nombreCompleto,
				 razonSocial from usertbl where userName = '". $_SESSION["userName"] ."'";
$dataUser = $conexion->consulta($sqlUser);
$rowUser = $dataUser->fetch_array(MYSQLI_ASSOC);

($rowUser["razonSocial"] != "") ? ($cliente = htmlentities($rowUser["razonSocial"]) ) : ($cliente = htmlentities($rowUser["nombreCompleto"]) );

?>
<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Comentarios</title>
	<link rel="stylesheet" href="/css/styleIni.css" />
	<link rel="stylesheet" href="/css/login.css">
</head>
<body>
	<div id="container">
		<form action="/pages/abcComents.php" name="comentsFrm" id="comentsFrm" method="post" >
			<ul>
				<li>
					<h2>Realizar sus comentarios</h2>
					<span class="requiredNotification">* Elementos requeridos</span>
				</li>
				<li>
					<label for="usuario">Usuario</label>
					<span class="clientProy"><?php echo $cliente; ?></span>		
				</li>

				<li>
					<label for="proyecto">Proyecto</label>
					<input type="text" id="nombreProyecto" name="nombreProyecto" placeholder="Nombre del Proyecto" required />
				</li>

				<li class="clear">
					<label for="tipoProyecto">Tipo de Proyecto</label>
					<select name="tipoProyecto" id="tipoProyecto">
						<option value="0">- Seleccionar -</option>
						<?php
							$sqlTp = "select * from tipoproyectotbl";
							$dataTp = $conexion->consulta($sqlTp);
							while($rowTp = $dataTp->fetch_array(MYSQLI_ASSOC)):
						?>
						
						<option value="<?php echo $rowTp["idTipoProyecto"] ?>"><?php echo $rowTp["tipoProyecto"]; ?></option>
						
						<?php endwhile; ?>
					</select>
				</li>
				
				<li>
					<label for="calificacion">Calificacion</label>
					<select name="calificacion" id="calificacion">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5" selected="selected">5</option>
					</select>
				</li>
				
				<li>
					<label for="Comentarios">Comentarios</label>
					<textarea name="comentarios" id="comentarios" required></textarea>
				</li>

				<li>
					<input type="submit" name="send" id="send" value="Comentar" />
				</li>

			</ul>
		</form>

	</div><!-- #container -->

</body>
</html>