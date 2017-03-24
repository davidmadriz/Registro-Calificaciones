<?php {

if(!empty($_POST)){
	if(isset($_POST["codigo_inst"]) &&isset($_POST["nombre_inst"]) &&isset($_POST["regional"]) &&isset($_POST["director"]) &&isset($_POST["profesor"]) &&isset($_POST["identificacion"])&&isset($_POST["email"])){
		if($_POST["codigo_inst"]!=""&& $_POST["nombre_inst"]!=""&&$_POST["regional"]!=""&& $_POST["director"]!=""&& $_POST["profesor"]!=""&& $_POST["identificacion"]!=""&& $_POST["email"]!=""){
			include "../../config/globals.php";
			
			$sql = "update config_inst set codigo_inst=\"$_POST[codigo_inst]\",	nombre_inst=\"$_POST[nombre_inst]\", regional=\"$_POST[regional]\",	director=\"$_POST[director]\", profesor=\"$_POST[profesor]\", identificacion=\"$_POST[identificacion]\", email=\"$_POST[email]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../../index.php';</script>";

			}
		}
	}
}




	} ?>