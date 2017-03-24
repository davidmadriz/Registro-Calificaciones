<!DOCTYPE html>
<html>
	<?php {
		include("../../config/globals.php");
		include("../../includes/head.php");
		include("../../includes/header.php");
		} ?>
<body>

</body>




<?php

$user_id=null;
$sql1= "select * from secciones where id = ".$_GET["id"];
$query = $con->query($sql1);
$secciones = null;
if($query->num_rows>0){
while ($s=$query->fetch_object()){
  $secciones=$s;
  break;
}

  }
?>

<button class="btn btn-info" onclick="goBack()"> << Back</button> <br>

	<h1>Historial de Calificaciones</h1>

	<script>
	function goBack() {
	    window.history.back();
	}
	</script>



	<label class="col-2 col-form-label">Grado: </label>  <?php echo $secciones->grado; ?> 
  													  (<?php echo $secciones->seccion; ?>) <br>

  <label class="col-2 col-form-label">Asignatura: </label> <?php echo $secciones->asignatura; ?> 

	<?php 
		{
		$user_id=null;
		$sql2= "select * from calificaciones where periodoEscolar = 'II Periodo' and tipoCalificacion = 'Trabajo Cotidiano' and seccion_id=".$_GET["id"] ;
		$query = $con->query($sql2);
		}
?>
	<hr>
	<h3>Trabajo Cotidiano</h3>
	<?php if($query->num_rows>0):?>
	<hr>
	

			<table>
			<thead>
				<tr>
					<th>Tipo de Calificación</th>
					<th>Periodo Escolar</th>
					<th>Porcentaje Evaluado</th>
					<th>Fecha de Evaluación</th>
					<th></th>
				</tr>
			</thead>
			<?php while ($c=$query->fetch_array()):?>
			<tr>
				<td><?php echo $c["tipoCalificacion"]; ?></td>
				<td><?php echo $c["periodoEscolar"]; ?></td>
				<td><?php echo $c["porcentajeEvaluacion"]; ?></td>
				<td><?php echo $c["fechaEvaluacion"]; ?></td>
				<td calspan="2">
				<?php $sum_cotidiano += $c['porcentajeEvaluacion'];?>
				<a href="show.php?calificacion_id=<?php echo $c["id"]; ?> ">Mostrar</a> &middot;
				<a href="destroy.php?calificacion_id=<?php echo $c["id"]; ?> " onclick="return confirm('¿Seguro de eliminar este registro?')" >Eliminar</a>
				</td>
			</tr>
			<?php endwhile;?>
			</table>
			<H6 class="labels_evaluacion">Total Evaluado: <?php echo $sum_cotidiano;  ?></H6>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>

	<hr>

	<?php 
		{
		$user_id=null;
		$sql3= "select * from calificaciones where periodoEscolar = 'II Periodo' and tipoCalificacion = 'Trabajo Extra-Clase' and seccion_id=".$_GET["id"] ;
		$query = $con->query($sql3);
		}
?>


		<h3>Trabajo Extraclase</h3>
	<?php if($query->num_rows>0):?>
	<hr>
	

			<table>
			<thead>
				<tr>
					<th>Tipo de Calificación</th>
					<th>Periodo Escolar</th>
					<th>Porcentaje Evaluado</th>
					<th>Fecha de Evaluación</th>
					<th></th>
				</tr>
			</thead>
			<?php while ($e=$query->fetch_array()):?>
			<tr>
				<td><?php echo $e["tipoCalificacion"]; ?></td>
				<td><?php echo $e["periodoEscolar"]; ?></td>
				<td><?php echo $e["porcentajeEvaluacion"]; ?></td>
				<td><?php echo $e["fechaEvaluacion"]; ?></td>
				<td calspan="2">

				<?php $sum_extraclase += $e['porcentajeEvaluacion'];?>
				<a href="show.php?calificacion_id=<?php echo $e["id"]; ?> ">Mostrar</a> &middot;
				<a href="destroy.php?calificacion_id=<?php echo $e["id"]; ?> " onclick="return confirm('¿Seguro de eliminar este registro?')" >Eliminar</a>

					
				</td>
			</tr>
			<?php endwhile;?>
			</table>
			<H6 class="labels_evaluacion">Total Evaluado: <?php echo $sum_extraclase;  ?></H6>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>

	<hr>


	<?php 
		{
		$user_id=null;
		$sql4= "select * from calificaciones where periodoEscolar = 'II Periodo' and  tipoCalificacion = 'Prueba escrita' and seccion_id=".$_GET["id"] ;
		$query = $con->query($sql4);
		}
?>


		<h3>Pruebas Escritas</h3>
	<?php if($query->num_rows>0):?>
	<hr>
	

			<table>
			<thead>
				<tr>
					<th>Tipo de Calificación</th>
					<th>Periodo Escolar</th>
					<th>Porcentaje Evaluado</th>
					<th>Fecha de Evaluación</th>
					<th></th>
				</tr>
			</thead>
			<?php while ($p=$query->fetch_array()):?>
			<tr>
				<td><?php echo $p["tipoCalificacion"]; ?></td>
				<td><?php echo $p["periodoEscolar"]; ?></td>
				<td><?php echo $p["porcentajeEvaluacion"]; ?></td>
				<td><?php echo $p["fechaEvaluacion"]; ?></td>
				<td calspan="2">

				<?php $sum_pruebas += $e['porcentajeEvaluacion'];?>
				<a href="show.php?calificacion_id=<?php echo $p["id"]; ?> ">Mostrar</a> &middot;
				<a href="destroy.php?calificacion_id=<?php echo $p["id"]; ?> " onclick="return confirm('¿Seguro de eliminar este registro?')" >Eliminar</a>

					
				</td>
			</tr>
			<?php endwhile;?>
			</table>
			<H6 class="labels_evaluacion">Total Evaluado: <?php echo $sum_pruebas;  ?></H6>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>
			<hr>

	<?php 
		{
		$user_id=null;
		$sql5= "select * from calificaciones where periodoEscolar = 'II Periodo' and tipoCalificacion = 'Concepto' and seccion_id=".$_GET["id"] ;
		$query = $con->query($sql5);
		}
?>


		<h3>Concepto</h3>
	<?php if($query->num_rows>0):?>
	<hr>
	

			<table>
			<thead>
				<tr>
					<th>Tipo de Calificación</th>
					<th>Periodo Escolar</th>
					<th>Porcentaje Evaluado</th>
					<th>Fecha de Evaluación</th>
					<th></th>
				</tr>
			</thead>
			<?php while ($co=$query->fetch_array()):?>
			<tr>
				<td><?php echo $co["tipoCalificacion"]; ?></td>
				<td><?php echo $co["periodoEscolar"]; ?></td>
				<td><?php echo $co["porcentajeEvaluacion"]; ?></td>
				<td><?php echo $co["fechaEvaluacion"]; ?></td>
				<td calspan="2">

				<?php $sum_concepto += $co['porcentajeEvaluacion'];?>
				<a href="show.php?calificacion_id=<?php echo $co["id"]; ?> ">Mostrar</a> &middot;
				<a href="destroy.php?calificacion_id=<?php echo $co["id"]; ?> " onclick="return confirm('¿Seguro de eliminar este registro?')" >Eliminar</a>

				
				</td>
			</tr>
			<?php endwhile;?>
			</table>
			<H6 class="labels_evaluacion">Total Evaluado: <?php echo $sum_concepto;  ?></H6>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>

	<hr>



	<?php 
		{
		$user_id=null;
		$sql6= "select * from calificaciones where periodoEscolar = 'II Periodo' and tipoCalificacion = 'Asistencia' and seccion_id=".$_GET["id"];
		$query = $con->query($sql6);
		}
?>


		<h3>Asistencia</h3>
	<?php if($query->num_rows>0):?>
	<hr>
	

			<table>
			<thead>
				<tr>
					<th>Tipo de Calificación</th>
					<th>Periodo Escolar</th>
					<th>Porcentaje Evaluado</th>
					<th>Fecha de Evaluación</th>
					<th></th>
				</tr>
			</thead>
			<?php while ($as=$query->fetch_array()):?>
			<tr>
				<td><?php echo $as["tipoCalificacion"]; ?></td>
				<td><?php echo $as["periodoEscolar"]; ?></td>
				<td><?php echo $as["porcentajeEvaluacion"]; ?></td>
				<td><?php echo $as["fechaEvaluacion"]; ?></td>
				<td calspan="2">

				<?php $sum_asistencia += $as['porcentajeEvaluacion'];?>
				<a href="show.php?calificacion_id=<?php echo $as["id"]; ?> ">Mostrar</a> &middot;
				<a href="destroy.php?calificacion_id=<?php echo $as["id"]; ?> " onclick="return confirm('¿Seguro de eliminar este registro?')" >Eliminar</a>

				
				</td>
			</tr>
			<?php endwhile;?>
			</table>
			<H6 class="labels_evaluacion">Total Evaluado: <?php echo $sum_asistencia;  ?></H6>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>

</html>