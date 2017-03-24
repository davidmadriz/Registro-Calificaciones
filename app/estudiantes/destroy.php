<?php

if(!empty($_GET)){
			include "../../config/globals.php";
			
			$sql = "DELETE FROM estudiantes WHERE id=".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../../index.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../../index.php';</script>";

			}
}

?>