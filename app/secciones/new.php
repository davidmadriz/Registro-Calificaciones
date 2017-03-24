<?php

if(!empty($_POST)){
	if(isset($_POST["grado"]) &&isset($_POST["seccion"]) &&isset($_POST["asignatura"])){
		if($_POST["grado"]!=""&& $_POST["seccion"]!=""&&$_POST["asignatura"]!=""){
			include "../../config/globals.php";
			
			$sql = "insert into secciones(grado,seccion,asignatura) value (\"$_POST[grado]\",\"$_POST[seccion]\",\"$_POST[asignatura]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar, complete todos los campos del formulario.\");window.location='index.php';</script>"; /*Mismo error*/
				}
			}else
					print "<script>alert(\"No se pudo agregar, complete todos los campos del formulario.\");window.location='index.php';</script>"; /*Mismo error*/
	}
}
?>
