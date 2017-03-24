
<!DOCTYPE html>
<html>
	<?php include("../../includes/head.php") ?>
	<?php include("../../includes/header.php") ?>

<body>
<h2>Completando calificaciones</h2>

<!-- Informacion que ya se encuentra guardada en el sistema -->
<?php 
$user_id=null;
$sql1= "select * from secciones where id = ".$_POST["seccion_id"];
$query = $con->query($sql1);
$secciones = null;
if($query->num_rows>0){
while ($s=$query->fetch_object()){
  $secciones=$s;
  break;
}

  }
?>




<div style="width: 98%; margin: auto;">
<hr>
  <label><?php echo $s->grado; ?></label> (<?php echo $s->seccion; ?>) <br>

  <label class="col-2 col-form-label">Asignatura</label> : <?php echo $s->asignatura; ?> 
  <br>
  <label  class="col-2 col-form-label">Periodo de Evaluación: </label> <?php echo ($_POST["periodoEscolar"]); ?>
  <br>
  <label  class="col-2 col-form-label">Tipo de Evaluación: </label> <?php echo ($_POST["tipoCalificacion"]); ?>
<br>
	 <label  class="col-2 col-form-label">Puntos de Evaluación: </label> <?php echo ($_POST["puntosEvaluacion"]); ?>
<br>	
	 <label  class="col-2 col-form-label">Porcentaje de Evaluación: </label> <?php echo ($_POST["porcentajeEvaluacion"]); ?>
	 

	<hr>
</div>


	<?php {
		$user_id=null;
		$sql= "select * from estudiantes where seccion_id=".$_POST["seccion_id"];
		$query = $con->query($sql);
		} ?>

	<?php if($query->num_rows>0):?>

<form method="POST">
	<table name="calificacion">
		<thead>
			<tr>
				<th>Estudiante</th>
				<th>Identificación</th>
				<th>Puntos Obtenidos</th>
				<th>Porcentaje Obtenido</th>
				<th>Calificación</th>
			</tr>
		</thead>

			<?php while ($r=$query->fetch_array()):?>
		<tbody>
				<td><?php echo $r["apellido_1"]." ".$r["apellido_2"]." ".$r["nombre_1"]." ".$r["nombre_2"];  ?></td>
				<td><?php echo $r["identificacion"]; ?></td>	
				<td><input type="number" name="puntosObtenidos[]"></td>		
				<td><input type="number"  name="porcentajeObtenido[]"></td>		
				<td><input type="number"  name="calificacion[]"></td>
				<td style="border-color: white;"><input type="text" name="calificacion_id[]" value="<?php echo ($c->id); ?>"></td> 
				<td style="border-color: white;"><input type="hidden" name="estudiante_id[]" value="<?php echo $r["id"];?>"></td> 
				
		</tbody>
			<?php endwhile;?>
	</table>
	<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros de estudiantes  en el sistema</p>
<?php endif;?>
	<br><br>
	<button type="submit" name="calificar" class="btn btn-danger">Generar Calificaciones</button>
 </form>


</body>
</html>

<?php }}}} ?>


<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['calificar'])){
			include "../../config/globals.php";

				
				$items1 = ($_POST['estudiante_id']);
				$items2 = ($_POST['puntosObtenidos']);
				$items3 = ($_POST['porcentajeObtenido']);
				$items4 = ($_POST['calificacion']);
				$items5 = ($_POST['calificacion_id']);
				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 10 ARRAYS UNO POR CADA INPUT////////////
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    
				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
				    $item5 = current($items5);



				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				  
				  
				    $estudiante_id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $puntosObtenidos=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $porcentajeObtenido=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $calificacion=(( $item4 !== false) ? $item4 : ", &nbsp;");
				    $calificacion_id=(( $item5 !== false) ? $item5 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$estudiante_id.',"'.$puntosObtenidos.'","'.$porcentajeObtenido.'","'.$calificacion.'","'.$calificacion_id.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql3 = "INSERT INTO calificacionesestudiantes (estudiante_id, puntosObtenidos, porcentajeObtenido, calificacion, calificacion_id) VALUES $valoresQ";


					//change con
					$sqlRes=$con->query($sql3) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    $item4 = next( $items4 );
				    $item5 = next( $items5 );
				    
				    // Check terminator
				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false) break;
				    	print "<script>alert(\"Calificacion Completada correctamente\");window.location='../secciones/index.php';</script>";
				    	

    
				}
		
				

				}

			?>