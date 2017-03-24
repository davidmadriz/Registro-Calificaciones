<?php

if(!empty($_POST)){
	if(isset($_POST["grado"]) &&isset($_POST["seccion"]) &&isset($_POST["asignatura"])){
		if($_POST["grado"]!=""&& $_POST["seccion"]!=""&&$_POST["asignatura"]!=""){
			include "../../config/globals.php";
			
			$sql = "update secciones set grado=\"$_POST[grado]\",seccion=\"$_POST[seccion]\",asignatura=\"$_POST[asignatura]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='index.php';</script>";

			}
		}
	}
}



?>