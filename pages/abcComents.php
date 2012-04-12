<?php
ini_set('session_save_path', '/home/users/web/b1426/moo.utrujillonet/cgi-bin/tmp/');
session_name('test');
session_start();
?>
<!DOCTYPE HTML>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/css/styleIni.css" />
	<link rel="stylesheet" href="/css/login.css" />
</head>
<body>

<div id="container">
	<header></header>
	<div class="line"></div>
	<div id="access">
		<?php	
			include_once("../scripts/conecta.inc.php");
			$conexion = new Conexion("utcnetdb");

			$idUser 		= $_SESSION["idUser"];
			$tipoProyecto 	= $_POST["tipoProyecto"];
			$nombreProyecto = $_POST["nombreProyecto"];
			$calificacion 	= $_POST["calificacion"];
			$comentarios 	= $_POST["comentarios"];
			$status			= "1";


			/*foreach($_POST as $key => $value){
				echo $key." ".$value."<br />";
			}*/


			$sql = "insert into proyectostbl(fkUserTbl, fkTipoProyecto, nombreProyecto, calificacion, comentarios, status) values(?,?,?,?,?,?)";
			
			$stmt = $conexion->preparaConsulta($sql);
			mysqli_stmt_bind_param($stmt,"iisiss",$idUser,$tipoProyecto,$nombreProyecto,$calificacion,$comentarios,$status);
			mysqli_stmt_execute($stmt) or die(mysqli_error($conexion->getLink()));
			mysqli_stmt_close($stmt);

		?>

		<div class="toolTip tpYellow borderContent clearfix" >
            <div>
                <img src="/img/light-bulb-off.png" alt="Tip!" />
                Tus comentarios han sido guardados, Muchas Gracias por tu preferencia!!
            </div> 
        </div>

	</div><!-- /access -->
</div> <!-- /container -->

</body>
</html>
