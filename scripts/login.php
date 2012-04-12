<?php
ini_set('session_save_path', '/home/users/web/b1426/moo.utrujillonet/cgi-bin/tmp/');
session_name('test');
if(@session_start() == false){session_destroy();session_start();}

	include_once ("conecta.inc.php");
	$conexion = new Conexion("utcnetdb");
	
	$user = $_POST["user"];
	$pass = md5($_POST["password"]);

	$sqlUser = "select * from usertbl where userName = '$user' ";
	$dataUser = $conexion->consulta($sqlUser);
	$rowUser = $dataUser->fetch_array(MYSQLI_ASSOC);
		$userDb = $rowUser["userName"];
		$passDb = $rowUser["password"];


		//echo $user." ".$pass." -------- ". $userDb ." ". $passDb;
		if( ($user == $userDb) && ($pass && $passDb) ){
			$_SESSION["userName"] = $user;
			$_SESSION["idUser"] = $rowUser["idUserTbl"];

			//echo "Nombre de Usuario: ". $_SESSION["userName"];

			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=/pages/comentarios.php">';
		}else{
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=/pages/badLogin.html">';
		}
?>