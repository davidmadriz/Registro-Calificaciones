<!DOCTYPE html>
<html>
	<?php {
		include("../../config/globals.php");
		include("../../includes/head.php");
		include("../../includes/header.php");
		} ?>
<body>

    <?php 
          {
          $user_id=null;
          $sql1= "select * from config_inst";
          $query = $con->query($sql1);


			 while ($r=$query->fetch_array()){
			$institucion =  $r["nombre_inst"]; 
			$profesor =   $r["profesor"];               
			$profesor_id =   $r["identificacion"];               
			$director =   $r["director"];               
        } 

         
         $user_id=null;
		$sql2= "select * from secciones where id = ".$_GET["id"];
		$query = $con->query($sql2);
		$secciones = null;
		if($query->num_rows>0){
		while ($s=$query->fetch_object()){
		  $secciones=$s;
		  break;
		}
		}

		{
		$user_id=null;
		$sql1= "select * from estudiantes where seccion_id=".$_GET["id"];
		$query = $con->query($sql1);
		}

		}?>

<div>
<img src="../../assets/images/mep.jpg" style="float: right; width: 100px">
<h1>Registro de Calificaciones</h1>
<span>
	Ministerio de Educación Pública <br>
	<?php echo $institucion ?>
</span>
<hr>

	
		<label>Sección: </label> <?php echo $secciones->seccion;?> <br>
		<label>Asignatura: </label> <?php echo $secciones->asignatura; ?> <br>
		<label>Periodo Escolar: </label> <?php echo $_GET["periodoEscolar"]; ?>
<hr>

<a href="#">Reporte de Trabajos Cotidianos</a> \\ 
<a href="#">Reporte de Extra-Clase</a>
<?php if($query->num_rows>0):?>
	


	<hr>

		<table>
			<thead>
				<tr>
					<th>Estudiante</th>
					<th>Identificación</th>
					<th>Trabajo Cotidiano (50%) <br>
					</th>
					<th>Trabajo extra-clase (10%)</th>
					<th>Pruebas (30%)</th>
					<th>Concepto (5%)</th>
					<th>Asistencia (5%)</th>
					<th>Nota Final</th>
				</tr>
			</thead>
			<?php while ($r=$query->fetch_array()):?>
			<tr>
				<td><?php echo $r["apellido_1"]." ".$r["apellido_2"]." ".$r["nombre_1"]." ".$r["nombre_2"]; ?></td>
				<td><?php echo $r["identificacion"]; ?></td>
				
			</tr>
			<?php endwhile;?>
			</table>
			<?php else:?>
				<br>
				<p class="alert alert-danger">No existen registros en la Base de Datos</p>
			<?php endif;?>


</div>
</body>
</html>