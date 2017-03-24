<?php

if(!empty($_GET)){
			include "../../config/globals.php";
			
			$sql = "DELETE FROM calificaciones WHERE id=".$_GET["calificacion_id"];
			$sql2 = "DELETE FROM calificacionesestudiantes WHERE calificacion_id =".$_GET["calificacion_id"];
			$query = $con->query($sql);
			$query2 = $con->query($sql2);
			if($query!=null and $query2 != null){
				print "<script>alert(\"Eliminado exitosamente.\");window.history.back();</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar, Intentelo de nuevo.\");window.history.back();</script>";

			}
}

?>