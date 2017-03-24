<?php

if(!empty($_POST)){
	if(isset($_POST["apellido_1"])  &&isset($_POST["apellido_2"]) &&isset($_POST["nombre_1"]) &&isset($_POST["nombre_2"]) &&isset($_POST["identificacion"]) &&isset($_POST["dob"]) &&isset($_POST["sexo"])&&isset($_POST["edad"]) &&isset($_POST["situacion_actual"])){

		if($_POST["apellido_1"]!=""&&$_POST["apellido_2"]!=""&&$_POST["nombre_1"]!=""&&$_POST["identificacion"]!=""&&$_POST["dob"]!=""&&$_POST["sexo"]!=""&&$_POST["edad"]!=""&&$_POST["situacion_actual"]!=""){
			include "../../config/globals.php";
			
			$sql = "update estudiantes set apellido_1=\"$_POST[apellido_1]\",apellido_2=\"$_POST[apellido_2]\",nombre_1=\"$_POST[nombre_1]\",nombre_2=\"$_POST[nombre_2]\",identificacion=\"$_POST[identificacion]\",dob=\"$_POST[dob]\",sexo=\"$_POST[sexo]\",edad=\"$_POST[edad]\",situacion_actual=\"$_POST[situacion_actual]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../secciones/index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../../index.php';</script>";

			}
		}
	}
}



?>