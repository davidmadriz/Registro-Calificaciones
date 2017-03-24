<!DOCTYPE html>
<html>
	<?php {
		include("../../config/globals.php");
		include("../../includes/head.php");
		} ?>
<body>
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
<?php include("../../includes/header.php") ?>

<div style="width: 98%; margin: auto;">
<h1>Grado</h1>
<hr>
  <label class="col-2 col-form-label">Grado: </label>  <?php echo $secciones->grado; ?> 
  													  (<?php echo $secciones->seccion; ?>) <br>

  <label class="col-2 col-form-label">Asignatura: </label> <?php echo $secciones->asignatura; ?> <br> 
  
<label><a href="form_update.php?id=<?php echo $secciones->id;?>">Actualizar Seccion</a></label> <br>

<hr>

<?php 
		{
		$user_id=null;
		$sql1= "select * from estudiantes where seccion_id=".$_GET["id"];
		$query = $con->query($sql1);
		}
?>

	<?php $id = $secciones->id ?>  <!-- Pasa el parametro de la seccion a un variable id -->
	<?php if($query->num_rows>0):?>

	<h3>Generar calificaciónes para la seccion <?php echo $secciones->seccion; ?></h3>

<!-- MODAL PARA EL PRIMER PERIODO -->
<div class="btn-group">
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#Iperiodo">I Periodo</button>
	
	<!-- Modal -->
	<div id="Iperiodo" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Calificaciónes para I Periodo escolar</h4>
	      </div>
	      <div class="modal-body">

		<form action="../calificaciones/new.php" method="POST">       	
		   	<label  class="col-2 col-form-label">Fecha de Evaliación</label><br>
		   	<input required class="form-control"  type="date" name="fechaEvaluacion">
		   	<br><br>

		   	<input class="form-control"  type="hidden" name="periodoEscolar" value="I Periodo">
		   	<input class="form-control"  type="hidden" name="seccion_id" value="<?php echo $id; ?>">

		   	<label  class="col-2 col-form-label">Objetivo de la Evaluación</label><br>
		   	<textarea required class="form-control"  name="objetivoEvaluacion"></textarea>
		   	<br><br>
		   	<label  class="col-2 col-form-label">Porcentaje de Evaluación</label><br>
		   	<input required class="form-control"  type="number" name="porcentajeEvaluacion">
		   	<br><br>
		   	<label  class="col-2 col-form-label">Puntos de Evaluación</label><br>
		   	<input required class="form-control"  type="number" name="puntosEvaluacion">
		   	<br><br>
		   	<label  class="col-2 col-form-label">Tipo de Evaluación</label>
		   	<select required class="form-control"  name="tipoCalificacion">
		   		<option></option>
		   		<option>Trabajo Cotidiano</option>
		   		<option>Trabajo Extra-Clase</option>
		   		<option>Prueba escrita</option>
		   		<option>Concepto</option>
		   		<option>Asistencia</option>
		   	</select>




	      </div>
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-danger">Guardar parametros de Calificación</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

		</form>	
	  </div>
	</div>

<!-- FIN DEL MODAL PARA EL PRIMER PERIODO -->


<!-- MODAL PADA EL SEGUNDO PERIODO -->

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#IIperiodo">II Periodo</button>
	
	<!-- Modal -->
	<div id="IIperiodo" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Calificaciónes para II Periodo escolar</h4>
	      </div>
	      <div class="modal-body">

		<form action="../calificaciones/new.php" method="POST">       	
		   	<label  class="col-2 col-form-label">Fecha de Evaliación</label><br>
		   	<input required class="form-control"  type="date" name="fechaEvaluacion">
		   	<br><br>

		   	<input class="form-control"  type="hidden" name="periodoEscolar" value="II Periodo">
		   	<input class="form-control"  type="hidden" name="seccion_id" value="<?php echo $id; ?>">

		   	<label  class="col-2 col-form-label">Objetivo de la Evaluación</label><br>
		   	<textarea required class="form-control"  name="objetivoEvaluacion"></textarea>
		   	<br><br>
		   	<label  class="col-2 col-form-label">Porcentaje de Evaluación</label><br>
		   	<input required class="form-control"  type="number" name="porcentajeEvaluacion">
		   	<br><br>
		   	<label  class="col-2 col-form-label">Puntos de Evaluación</label><br>
		   	<input required class="form-control"  type="number" name="puntosEvaluacion">
		   	<br><br>
		   	<label  class="col-2 col-form-label">Tipo de Evaluación</label>
		   	<select required class="form-control"  name="tipoCalificacion">
		   		<option></option>
		   		<option>Trabajo Cotidiano</option>
		   		<option>Trabajo Extra-Clase</option>
		   		<option>Prueba escrita</option>
		   		<option>Concepto</option>
		   		<option>Asistencia</option>
		   	</select>



	      </div>
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-danger">Guardar parametros de Calificación</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

		</form>	
	  </div>
	</div>

<!-- FIN DEL MODAL PARA SEGUNDO PERIODO -->

<!-- MODAL PARA EL TERCER PERIODO -->

	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#IIIperiodo">III Periodo</button>
	
	<!-- Modal -->
	<div id="IIIperiodo" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Calificaciónes para III Periodo escolar</h4>
	      </div>
	      <div class="modal-body">

		<form action="../calificaciones/new.php" method="POST">       	
		   	<label  class="col-2 col-form-label">Fecha de Evaliación</label><br>
		   	<input required class="form-control"  type="date" name="fechaEvaluacion">
		   	<br><br>

		   	<input class="form-control"  type="hidden" name="periodoEscolar" value="III Periodo">
		   	<input class="form-control"  type="hidden" name="seccion_id" value="<?php echo $id; ?>">

		   	<label  class="col-2 col-form-label">Objetivo de la Evaluación</label><br>
		   	<textarea required class="form-control"  name="objetivoEvaluacion"></textarea>
		   	<br><br>
		   	<label  class="col-2 col-form-label">Porcentaje de Evaluación</label><br>
		   	<input required class="form-control"  type="number" name="porcentajeEvaluacion">
		   	<br><br>
		   	<label  class="col-2 col-form-label">Puntos de Evaluación</label><br>
		   	<input required class="form-control"  type="number" name="puntosEvaluacion">
		   	<br><br>
		   	<label  class="col-2 col-form-label">Tipo de Evaluación</label>
		   	<select required class="form-control"  name="tipoCalificacion">
		   		<option></option>
		   		<option>Trabajo Cotidiano</option>
		   		<option>Trabajo Extra-Clase</option>
		   		<option>Prueba escrita</option>
		   		<option>Concepto</option>
		   		<option>Asistencia</option>
		   	</select>



	      </div>
	      <div class="modal-footer">
	      	<button type="submit" class="btn btn-danger">Guardar parametros de Calificación</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

		</form>	
	  </div>
	</div>
</div>
<!-- FIN DEL MODAL PARA EL TERCER PERIODO -->

	<?php endif;?>

<hr>

<h3>Listado de Estudiantes</h3>

	<a href="../estudiantes/form_new.php?id=<?php echo $id;?>">Nuevo Estudiante</a> //
	<a href="../informes/listasestudiantes.php?id=<?php echo $id; ?>">Listado de Estudiantes</a> <br>
	<?php if($query->num_rows>0):?>
	
	
	<hr>
		<table>
			<thead>
				<tr>
					<th>Apellido 1</th>
					<th>Apellido 2</th>
					<th>Nombre 1</th>
					<th>Nombre 2</th>
					<th>Identificación</th>
					<th>Fecha de Nacimiento</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Situación Actual</th>
					<th colspan="2">Opciones</th>
				</tr>
			</thead>
			<?php while ($r=$query->fetch_array()):?>
			<tr>
				<td><?php echo $r["apellido_1"]; ?></td>
				<td><?php echo $r["apellido_2"]; ?></td>
				<td><?php echo $r["nombre_1"]; ?></td>
				<td><?php echo $r["nombre_2"]; ?></td>
				<td><?php echo $r["identificacion"]; ?></td>
				<td><?php echo $r["dob"]; ?></td>
				<td><?php echo $r["sexo"]; ?></td>
				<td><?php echo $r["edad"]; ?></td>
				<td><?php echo $r["situacion_actual"]; ?></td>
				<td calspan="2">
					<a href="../estudiantes/form_update.php?id=<?php echo $r["id"];?>">Editar</a> &middot;
					<a href="../estudiantes/destroy.php?id=<?php echo $r["id"];?>" id="del-<?php echo $r["id"];?>" onclick="return confirm('¿Seguro de eliminar este estudiante del sistema?')">Eliminar</a>
					
				</td>
			</tr>
			<?php endwhile;?>
			</table>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>


	<hr>

<h3>Historial de Calificaciones</h3>



<a class="btn btn-warning" href="../calificaciones/showip.php?id=<?php echo  $id?>">I Periodo&nbsp;&nbsp;</a>
<a class="btn btn-warning" href="../informes/informeip.php?id=<?php echo  $id?>">Informe de Calificaciones</a> 
<br><br>
<a class="btn btn-info" href="../calificaciones/showiip.php?id=<?php echo  $id?>">II Periodo&nbsp;</a>
<a class="btn btn-info" href="../informes/informeiip.php?id=<?php echo  $id?>">Informe de Calificaciones</a> 
<br><br>
<a class="btn btn-success" href="../calificaciones/showiiip.php?id=<?php echo  $id?>">III Periodo</a> 
<a class="btn btn-success" href="../informes/informeiiip.php?id=<?php echo  $id?>">Informe de Calificaciones</a> 


<!-- <hr>
	<a class="btn btn-danger" href="destroy.php?id=<?php echo $id; ?>" onclick="return confirm('¿Seguro de eliminar esta seccion escolar?')">Eliminar Seccion</a> 

      <hr> -->
</div>



</body>
</html>