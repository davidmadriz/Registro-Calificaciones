<?php

if(!empty($_POST)){
	if(isset($_POST["seccion_id"]) &&isset($_POST["apellido_1"]) &&isset($_POST["apellido_2"]) &&isset($_POST["nombre_1"]) &&isset($_POST["nombre_2"]) &&isset($_POST["identificacion"]) &&isset($_POST["dob"]) &&isset($_POST["sexo"])&&isset($_POST["edad"]) &&isset($_POST["situacion_actual"])){

		if($_POST["seccion_id"]!=""&& $_POST["apellido_1"]!=""&&$_POST["apellido_2"]!=""&&$_POST["nombre_1"]!=""&&$_POST["identificacion"]!=""&&$_POST["dob"]!=""&&$_POST["sexo"]!=""&&$_POST["edad"]!=""&&$_POST["situacion_actual"]!=""){
			include "../../config/globals.php";
			
			$sql = "insert into estudiantes(seccion_id,apellido_1,apellido_2,nombre_1,nombre_2, identificacion, dob, sexo, edad, situacion_actual) value (\"$_POST[seccion_id]\",\"$_POST[apellido_1]\",\"$_POST[apellido_2]\",\"$_POST[nombre_1]\",\"$_POST[nombre_2]\",\"$_POST[identificacion]\",\"$_POST[dob]\",\"$_POST[sexo]\",\"$_POST[edad]\",\"$_POST[situacion_actual]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../secciones/index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar, complete todos los campos del formulario.\");window.location='../../secciones/index.php';</script>"; /*Mismo error*/
				}
			}else
					print "<script>alert(\"No se pudo agregar, complete todos los campos del formulario.\");window.location='../../index.php';</script>"; /*Mismo error*/
	}
}
?>